@extends('backend.layouts.master')
@section('title', 'Danh sách bài viết')

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
                    bài viết
                </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Danh sách bài viết</h4>
            <div class="card-tools">
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">Thêm mới bài viết (+)</a>
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
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Ngày đăng</th>
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

            const api = '{{ route('admin.news.index') }}'

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
                    data: 'title',
                    name: 'title',
                    orderable: false,
                    render(data, type, row) {
                        return `<a href="/admin/news/${row.id}"><strong>${data}</strong></a>`
                    },
                },
                {
                    data: 'category',
                    name: 'category',
                    orderable: false,
                    searchable: false,
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
                    data: 'posted_at',
                    name: 'posted_at',
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

            dataTables(api, columns, 'News', 6)

            handleDestroy('News')

            initStatusToggle({
                model: 'News'
            });
        });
    </script>
@endpush
