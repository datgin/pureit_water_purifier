<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class BulkActionController extends Controller
{
    public function handleBulkAction(Request $request)
    {
        $type = request()->input('type');

        $credentials = Validator::make($request->all(), [
            'model' => 'required|string',
            'ids' => 'required',
        ], [], [
            'model' => 'Tên model',
            'ids' => 'Danh sách ID',
        ]);

        if ($credentials->fails()) {
            return response()->json([
                'success' => false,
                'message' => $credentials->errors()->first()
            ], 422);
        }

        $credentials = $credentials->validated();

        $modelClass = "App\\Models\\" . $credentials['model'];

        // Kiểm tra xem class có tồn tại hay không
        if (!class_exists($modelClass)) {
            return response()->json(['message' => 'Model không hợp lệ.'], 400);
        }

        if (!is_array($credentials['ids']))
            $credentials['ids'] = [$credentials['ids']];

        try {
            switch ($type) {
                case 'delete':
                    $this->deleteImages($modelClass, $credentials['ids']);
                    $modelClass::whereIn('id', $credentials['ids'])->delete();
                    return response()->json(['message' => 'Xóa thành công!'], 200);

                case 'change-status':
                    $modelClass::whereIn('id', $credentials['ids'])->get()->map(function ($q) {
                        return $q->update(['status' => $q->status = !$q->status]);
                    });
                    return response()->json(['success' => true, 'message' => 'Thay đổi trạng thái thành công!'], 200);

                case 'restore':
                    // Phục hồi các bản ghi đã xóa mềm
                    $modelClass::onlyTrashed()->whereIn('id', $credentials['ids'])->restore();
                    return response()->json(['success' => true, 'message' => 'Phục hồi thành công!'], 200);

                case 'forceDelete':
                    // Xóa vĩnh viễn các bản ghi đã xóa mềm
                    $modelClass::whereIn('id', $credentials['ids'])->forceDelete();
                    return response()->json(['success' => true, 'message' => 'Xóa vĩnh viễn thành công!'], 200);
                default:
                    return response()->json(['success' => false, 'message' => 'Loại hành động không hợp lệ.'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
    }

    protected function deleteImages($modelClass, $ids)
    {
        $records = $modelClass::whereIn('id', $ids)->get();

        foreach ($records as $record) {
            foreach ($record->getFillable() as $column) {
                if ($this->isImageColumn($column) && !empty($record->$column)) {
                    deleteImage($record->$column);
                }
            }
        }
    }

    protected function isImageColumn($column)
    {
        return preg_match('/(image|photo|avatar|thumbnail|logo)/i', $column);
    }
}
