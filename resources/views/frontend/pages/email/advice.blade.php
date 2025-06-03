<!DOCTYPE html>
<html>

<head>
    <title>Tư vấn của bạn</title>
</head>

<body>
    <h2>Yêu cầu tư vấn mới</h2>

    <p><strong>Tên khách hàng:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Số điện thoại:</strong> {{ $data['phone'] }}</p>

    @if (!empty($data['product_name']))
        <p><strong>Sản phẩm:</strong> {{ $data['product_name'] }}</p>
    @endif

    <p>Vui lòng kiểm tra và phản hồi yêu cầu này sớm nhất có thể.</p>

</body>

</html>
