@extends('backend.layouts.master')

@section('title', 'Danh sách danh mục')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin') }}" class="mb-0 d-inline-block lh-1 text-uppercase">
                        Tổng quan
                    </a>
                </li>
                <li class="breadcrumb-item active text-uppercase" aria-current="page">
                    danh mục
                </li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Danh sách danh mục</h4>
            <div class="card-tools">
                <a href="{{ route('admin.categories.save') }}" class="btn btn-primary btn-sm">Thêm mới (+)</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll" /></th>
                            <th>STT</th>
                            <th>Ảnh đại diện</th>
                            <th>Tên danh mục</th>
                            <th>Đường dẫn</th>
                            <th>Số lượng sản phẩm</th>
                            <th>Thời gian</th>
                            <th>Vị trí hiện thị</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            const api = '{{ route('admin.categories.index') }}'

            const columns = [{
                    data: "checkbox",
                    name: "checkbox",
                    orderable: false,
                    searchable: false,
                    width: "5px",
                    className: "text-center"
                },
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                    width: "5px",
                },
                {
                    data: 'logo',
                    name: 'logo',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'product_count',
                    name: 'products_count',
                    searchable: false,
                    className: "text-center",
                    width: "15%",
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: 'location',
                    name: 'location',
                    searchable: false,
                    orderable: false,
                    className: "text-center",
                },
                {
                    data: 'status',
                    name: 'status',
                    searchable: false,
                    orderable: false,
                    className: "text-center"
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    className: "text-center"
                },
            ];

            dataTables(api, columns, 'Category', 6)

            handleDestroy('Category')

            initStatusToggle({
                model: 'Category'
            });
        });
    </script>
@endpush
