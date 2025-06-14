<?php

use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Filesystem\FilesystemAdapter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

function hasDiscount($discount)
{
    // Nếu không có giảm giá, trả về false
    if (is_null($discount))
        return false;

    // Nếu ngày hiện tại nằm trong khoảng thời gian giảm giá, trả về true
    if ($discount->start_date <= Carbon::now() && $discount->end_date >= Carbon::now()) {
        return true;
    }

    // Nếu giảm giá đã hết hạn, hoặc chưa bắt đầu, trả về false
    return false;
}

function hasCustomDiscount($startDate, $endDate, $value)
{
    if ($value <= 0)
        return false; // Nếu không có giá trị giảm giá, trả về false

    $now = Carbon::now(); // Lấy thời gian hiện tại với giờ, phút, giây

    // Nếu không có ngày bắt đầu và ngày kết thúc => luôn true
    if (!$startDate && !$endDate)
        return true;

    // Nếu có ngày bắt đầu nhưng không có ngày kết thúc => luôn true
    if ($startDate && !$endDate)
        return true;

    // Nếu có cả startDate và endDate => Kiểm tra khoảng thời gian chính xác
    if (Carbon::parse($startDate)->lessThanOrEqualTo($now) && Carbon::parse($endDate)->greaterThanOrEqualTo($now)) {
        return true;
    }

    return false;
}


function calculateAmount($amount, $discount, $isPercentage = true)
{
    if ($isPercentage) {
        // Tính toán giảm giá theo phần trăm
        $discountAmount = $amount * ($discount / 100);
        $finalAmount = $amount - $discountAmount;
    } else {
        // Tính toán giảm giá theo số tiền cố định
        $finalAmount = $discount;
    }

    return $finalAmount;
}

function calculateDiscountPercentage($originalPrice, $discountedPrice, $type)
{
    if ($type == 'percentage') {
        return $discountedPrice; // Nếu đã là % thì trả về luôn
    }

    if ($originalPrice == 0 || $discountedPrice > $originalPrice) {
        return 0; // Tránh lỗi chia cho 0 hoặc giá giảm cao hơn giá gốc
    }

    $discountPercentage = (1 - ($discountedPrice / $originalPrice)) * 100;
    return round($discountPercentage, 2); // Làm tròn 2 chữ số thập phân
}



function formatPrice($price)
{
    if ($price == 0)
        return "₫0";
    return '₫' . number_format($price, 0, ',', '.');
}

function uploadImages($flieName, string $directory = 'images', $resize = false, $isArray = false, $width = 150, $height = 150, $quality = 80)
{
    $paths = [];

    $images = request()->file($flieName);
    if (!is_array($images)) {
        $images = [$images];
    }

    $manager = new ImageManager(['driver' => 'gd']);
    $storagePath = storage_path('app/public/' . trim($directory, '/'));

    if (!file_exists($storagePath)) {
        mkdir($storagePath, 0777, true);
    }

    foreach ($images as $key => $image) {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $img = $manager->make($image->getRealPath());

            // Resize nếu $resize = true, giữ tỷ lệ
            if ($resize) {
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize(); // Không phóng to ảnh nhỏ
                });
            }

            $filename = time() . uniqid() . '.webp';

            // Encode với chất lượng 80 (bạn có thể chỉnh từ 60 đến 90)
            Storage::disk('public')->put($directory . '/' . $filename, $img->encode('webp', $quality));

            $paths[$key] = $directory . '/' . $filename;
        }
    }

    return $isArray ? $paths : $paths[0] ?? null;
}

function savePdfFile($filename, string $folder = 'manuals'): ?string
{
    $file = request()->file($filename);

    if (!$file || !($file instanceof \Illuminate\Http\UploadedFile)) {
        return null;
    }

    $newFilename = Str::uuid() . '.' . $file->getClientOriginalExtension();

    $path = "{$folder}/{$newFilename}";

    Storage::disk('public')->put($path, file_get_contents($file));

    return $path; // Trả về path tương đối
}

function getTextAfterFirstHeading($htmlContent = null)
{

    if (empty($htmlContent)) {
        return '';
    }
    // Tạo đối tượng DOMDocument
    $dom = new DOMDocument();
    // Đảm bảo HTML được tải với encoding UTF-8
    $dom->encoding = 'UTF-8';

    // Tắt cảnh báo khi tải HTML không hợp lệ (vì có thể chứa ký tự đặc biệt)
    @$dom->loadHTML(mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8'));

    // Tìm tất cả các thẻ heading (h1 đến h6)
    $headings = $dom->getElementsByTagName('*');

    // Lọc ra tất cả các thẻ h1, h2, ..., h6
    $headingsArray = [];
    foreach ($headings as $heading) {
        if (preg_match('/^h[1-6]$/', $heading->nodeName)) {
            $headingsArray[] = $heading;
        }
    }

    // Nếu tìm thấy thẻ heading, lấy thẻ đầu tiên sau thẻ heading đầu tiên
    if (count($headingsArray) > 0) {
        $firstHeading = $headingsArray[0];
        $nextSibling = $firstHeading->nextSibling;

        // Duyệt qua các sibling và tìm thẻ đầu tiên là phần tử HTML
        while ($nextSibling) {
            if ($nextSibling->nodeType === XML_ELEMENT_NODE) {
                // Lấy văn bản trong thẻ đầu tiên sau thẻ heading
                return strip_tags($dom->saveHTML($nextSibling));
            }
            $nextSibling = $nextSibling->nextSibling;
        }
    }

    return ''; // Nếu không có heading hoặc không có thẻ nào sau heading
}




function resizeImage($image, $width = null, $height = null)
{
    if (!$image) {
        return $image;
    }

    $params = [];

    if ($width) {
        $params[] = 'w=' . $width;
    }
    if ($height) {
        $params[] = 'h=' . $height;
    }

    if (count($params) > 0) {
        $separator = strpos($image, '?') !== false ? '&' : '?';
        $image .= $separator . implode('&', $params);
    }

    return $image;
}


function saveImage($request, string $inputName, string $directory = 'images')
{
    if ($request->hasFile($inputName)) {
        $image = $request->file($inputName);
        $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put($directory . '/' . $filename, file_get_contents($image->getPathName()));
        return $directory . '/' . $filename;
    }
}

if (!function_exists('isOnSale')) {
    function isOnSale($record)
    {
        // Kiểm tra xem có discount_value không
        if ($record->discount_value > 0) {
            // Nếu không có discount_start_date và discount_end_date, có nghĩa là giảm giá vô thời gian
            if (empty($record->discount_start_date) && empty($record->discount_end_date)) {
                return true; // Giảm giá vô thời gian
            }

            // Nếu có discount_start_date và discount_end_date, kiểm tra theo thời gian
            if ($record->discount_start_date && $record->discount_end_date) {
                // Chuyển đổi discount_start_date và discount_end_date thành định dạng Carbon (d-m-Y)
                $discountStart = $record->discount_start_date;
                $discountEnd = $record->discount_end_date;
                $now = Carbon::now(); // Thời gian hiện tại

                // Kiểm tra điều kiện giảm giá hợp lệ
                if ($discountStart->lte($now) && $discountEnd->gte($now)) {
                    return true;
                }
            }

            if ($record->discount_start_date && empty($record->discount_end_date)) {
                $discountStart = $record->discount_start_date;
                $now = Carbon::now(); // Thời gian hiện tại
                if ($discountStart->gt($now)) {
                    return true; // Giảm giá bắt đầu trong tương lai
                }
            }

            // Nếu chỉ có discount_end_date và không có discount_start_date, kiểm tra discount_end_date < thời gian hiện tại
            if (empty($record->discount_start_date) && $record->discount_end_date) {
                $discountEnd = $record->discount_end_date;
                $now = Carbon::now(); // Thời gian hiện tại
                if ($discountEnd->lt($now)) {
                    return true; // Giảm giá đã kết thúc
                }
            }
        }

        // Trả về false nếu không thỏa mãn điều kiện giảm giá
        return false;
    }
}

if (!function_exists('getDiscountPercent')) {

    function getDiscountPercent($originalPrice, $salePrice)
    {
        if ($originalPrice <= 0 || $salePrice >= $originalPrice) {
            return 0; // Không giảm hoặc giá trị không hợp lệ
        }

        $discount = (($originalPrice - $salePrice) / $originalPrice) * 100;

        return (int) $discount; // Lấy phần nguyên
    }
}

if (!function_exists('showImage')) {
    function showImage($image)
    {
        /** @var FilesystemAdapter $storage */
        $storage = Storage::disk('public');

        if ($image && $storage->exists($image)) {
            return $storage->url($image);
        }

        return asset('backend/assets/img/image-default.jpg');
    }
}

function logInfo($message)
{
    Log::info($message);
}

function capitalizeWords($string)
{
    return mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
}

function deleteImage($path)
{
    if ($path && Storage::disk('public')->exists($path)) {
        Storage::disk('public')->delete($path);
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString()
    {
        $prefix = "ODR";
        $fourthChar = rand(1, 9); // Ký tự thứ 4 là số lớn hơn 0
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Bảng ký tự cho phần còn lại
        $remainingLength = 7; // Tổng độ dài là 11, trừ 4 ký tự đầu

        $randomString = '';
        for ($i = 0; $i < $remainingLength; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $prefix . $fourthChar . $randomString;
    }
}

function generateProductCode()
{
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Chỉ chứa chữ cái viết hoa
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // Chữ cái + số

    $code = $letters[rand(0, strlen($letters) - 1)]; // Ký tự đầu tiên là chữ cái in hoa
    for ($i = 1; $i < 11; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}



function saveImageNew($image, string $inputName, string $directory = 'images')
{
    if ($image) {
        $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put($directory . '/' . $filename, file_get_contents($image->getPathName()));
        return $directory . '/' . $filename;
    }

    return null; // Trả về null nếu không có ảnh
}

if (!function_exists('statusColor')) {
    function statusColor($status)
    {
        switch ($status) {
            case 'pending':
                return '<span class="badge bg-warning">Chờ xử lý...</span>';
            case 'confirmed':
                return '<span class="badge bg-primary">Đã xác nhận</span>';
            case 'completed':
                return '<span class="badge bg-success">Đơn hàng đã hoàn thành</span>';
            case 'cancelled':
                return '<span class="badge bg-danger">Đã hủy</span>';
            default:
                return '<span class="badge bg-warning">Chờ xử lý...</span>';
        }
    }
}

if (!function_exists('paymentStatus')) {
    function paymentStatus($status)
    {
        switch ($status) {
            case '0':
                return '<span class="badge bg-danger">Chưa thanh toán...</span>';
            case '1':
                return '<span class="badge bg-success">Đã thanh toán</span>';
            case '2':
                return '<span class="badge bg-warning">Thanh toán đặt cọc</span>';
            default:
                return '<span class="badge bg-danger ">Chưa thanh toán...</span>';
        }
    }
}

if (!function_exists('paymentMethods')) {
    function paymentMethods($method)
    {
        switch ($method) {
            case 'cod':
                return '<span class="badge bg-danger">Thanh toán khi nhận hàng (COD)</span>';
            case 'bacs':
                return '<span class="badge bg-success">Thanh toán chuyển khoản</span>';
            case 'currency':
                return '<span class="badge bg-warning">Thanh toán đặt cọc</span>';
        }
    }
}

if (!function_exists('changeStatus')) {
    function changeStatus($status)
    {
        switch ($status) {
            case 'pending':
                return 'confirmed';
            case 'confirmed':
                return 'completed';
        }
    }
}
function saveImagesWithoutResize($request, string $inputName, string $directory = 'images', $isArray = false)
{
    $paths = [];

    // Kiểm tra xem có file không
    if ($request->hasFile($inputName)) {
        // Lấy tất cả các file hình ảnh
        $images = $request->file($inputName);

        if (!is_array($images)) {
            $images = [$images]; // Đưa vào mảng nếu chỉ có 1 ảnh
        }

        foreach ($images as $key => $image) {
            // Tạo tên file duy nhất
            $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();

            // Lưu ảnh vào storage
            Storage::disk('public')->putFileAs($directory, $image, $filename);

            // Lưu đường dẫn vào mảng
            $paths[$key] = $directory . '/' . $filename;
        }

        // Trả về danh sách các đường dẫn
        return $isArray ? $paths : $paths[0];
    }

    return null;
}

function formatString($json = null)
{
    if (empty($json))
        return null;

    $keywordsArray = json_decode($json, true);

    $keywordsString = implode(', ', array_column($keywordsArray, 'value'));

    return $keywordsString;
}




if (!function_exists('generateRandomNumber')) {
    /**
     * Generate a random number with a specified length
     *
     * @param int $length
     * @return string
     */
    function generateRandomNumber($length = 10)
    {
        // Ensure the length is at least 1
        $length = max(1, (int) $length);

        // Generate the first digit (1-9) to avoid leading zero
        $firstDigit = mt_rand(1, 9);

        // Generate the remaining digits (0-9)
        $remainingDigits = '';
        if ($length > 1) {
            $remainingDigits = substr(str_shuffle(str_repeat('0123456789', $length - 1)), 0, $length - 1);
        }

        return $firstDigit . $remainingDigits;
    }
}

if (!function_exists('formatName')) {
    /**
     * Format a string to uppercase without diacritics
     *
     * @param string $name
     * @return string
     */
    function formatName($name)
    {
        // Loại bỏ dấu bằng hàm Laravel support
        $nameWithoutDiacritics = \Illuminate\Support\Str::ascii($name);

        // Chuyển thành chữ in hoa
        return strtoupper($nameWithoutDiacritics);
    }
}

if (!function_exists('convertToSentenceCase')) {
    function convertToSentenceCase($string)
    {
        $string = trim(preg_replace('/\s+/', ' ', $string)); // Loại bỏ khoảng trắng thừa
        $string = mb_strtolower($string, 'UTF-8'); // Chuyển toàn bộ chuỗi về chữ thường
        return mb_strtoupper(mb_substr($string, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($string, 1, null, 'UTF-8'); // Viết hoa chữ cái đầu tiên
    }
}


if (!function_exists('activeMenu')) {
    function activeMenu($url)
    {
        return request()->routeIs($url) ? 'active' : '';
    }
}
