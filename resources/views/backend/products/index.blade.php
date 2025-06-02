@extends('backend.layouts.master')
@section('title', 'Danh sách sản phẩm')

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
                    sản phẩm
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Danh sách sản phẩm</h4>
            <div class="card-tools">
                <a href="{{ route('admin.products.save') }}" class="btn btn-primary btn-sm">Thêm mới sản phẩm (+)</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll" /></th>
                            <th>STT</th>
                            <th>Ảnh đại diện</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá gốc</th>
                            <th>Giá khuyến mãi</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            const api = '{{ route('admin.products.index') }}'

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
                    data: 'image',
                    name: 'image',
                    searchable: false,
                    orderable: false,
                    className: "text-center",
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: false,
                    render(data, type, row) {
                        return `<a href="/admin/products/save/${row.id}"><strong>${data}</strong></a>`
                    },
                },
                {
                    data: 'category',
                    name: 'category',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'price',
                    name: 'price',
                    searchable: false,
                    render(data) {
                        return formatCurrency(data)
                    },
                },
                {
                    data: 'discount_value',
                    name: 'discount_value',
                    searchable: false,
                    render(data) {
                        return formatCurrency(data)
                    },
                },
                {
                    data: 'status',
                    name: 'status',
                    searchable: false,
                    orderable: false,
                    className: "text-center"
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false,
                    className: "text-center",
                },

                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    className: "text-center"
                },
            ];

            dataTables(api, columns, 'Product', 8)

            handleDestroy('Product')

            initStatusToggle({
                model: 'Product'
            });
        });
    </script>
@endpush
