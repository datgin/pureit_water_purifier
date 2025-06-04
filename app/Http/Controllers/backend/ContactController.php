<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::latest()->get();

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="select-item" value="' . $row->id . '">';
                })
                ->editColumn('name', function ($row) {
                    return '<a href="' . route('admin.categories.save', $row->id) . '"><strong>' . e($row->name) . '</strong></a>';
                })
                 ->addColumn('product', function ($row) {
                    return !empty($row->product) ? $row->product->name : 'N/A';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d/m/Y H:i');
                })
                ->addColumn('actions', function ($row) {
                    return '
                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '" title="Xóa">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->rawColumns(['checkbox', 'name', 'actions', 'status', 'logo', 'banner'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.contact.index');
    }
}