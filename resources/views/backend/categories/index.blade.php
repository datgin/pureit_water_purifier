@extends('backend.layouts.master')

@section('title', 'Danh sách danh mục')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Danh sách danh mục</h4>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Vị trí hiển thị
                </button>
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">Thêm mới (+)</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll" /></th>
                            <th>Tên danh mục</th>
                            <th>Số lượng sản phẩm</th>
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

    <style>
        #attributeFilter,
        #attributeValueFilter {
            display: none !important
        }

        .select2 {
            width: 265px !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var sortable = new Sortable(document.getElementById("sortable-table"), {
                animation: 150,
                onEnd: function() {
                    let order = [];
                    $("#sortable-table tr").each(function(index) {
                        order.push($(this).data("id"));

                        // Cập nhật số thứ tự hiển thị trên giao diện
                        $(this).find(".location").text(index + 1);
                    });


                }
            });
        });


        $(document).ready(function() {
            const api = '{{ route('admin.category.index') }}'

            const columns = [{
                    data: "checkbox",
                    name: "checkbox",
                    orderable: false,
                    searchable: false,
                    width: "5px",
                    className: "text-center"
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'product_count',
                    name: 'products_count',
                    searchable: false,
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

            dataTables(api, columns, 'categories', false, false)

            handleDestroy()
        });

        $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id');
            if (confirm('Bạn có chắc chắn muốn xóa danh mục này?')) {
                $.ajax({
                    url: `/admin/category/delete/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        $('#myTable').DataTable().ajax.reload();
                        alert('Đã xóa thành công!');
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
                });
            }
        });
    </script>
@endpush
