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

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.js') }}"></script>

    <script type="text/javascript">
        // $(document).ready(function() {
        //     var sortable = new Sortable(document.getElementById("sortable-table"), {
        //         animation: 150,
        //         onEnd: function() {
        //             let order = [];
        //             $("#sortable-table tr").each(function(index) {
        //                 order.push($(this).data("id"));

        //                 // Cập nhật số thứ tự hiển thị trên giao diện
        //                 $(this).find(".location").text(index + 1);
        //             });


        //         }
        //     });
        // });


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

            dataTables(api, columns, 'Category', false, false)

            handleDestroy()
        });

        $(document).on('change', '.switch input[type="checkbox"]', function(e) {
            const checkbox = $(this);
            const newChecked = checkbox.prop('checked');
            const id = checkbox.closest('.switch').data('id');

            Swal.fire({
                title: "Bạn có chắc chắn?",
                text: "Hành động này không thể hoàn tác!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Vâng, thay đổi!",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/categories/change-status/${id}`,
                        type: 'POST',
                        data: {
                            '_method': 'PUT',
                        },
                        success: function(res) {
                            datgin.success(res.message);
                        },
                        error: function(xhr) {
                            checkbox.prop('checked', !newChecked); // Quay về nếu lỗi
                            datgin.error(
                                xhr.responseJSON?.message ||
                                'Đã có lỗi xảy ra, vui lòng thử lại sau!'
                            );
                        }
                    });
                } else {
                    checkbox.prop('checked', !newChecked); // Quay lại trạng thái trước
                }
            });
        });




        $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: "Bạn có chắc chắn?",
                text: "Hành động này không thể hoàn tác!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Vâng, xóa ngay!",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/categories/${id}`,
                        type: 'DELETE',
                        success: function(res) {
                            $('#myTable').DataTable().ajax.reload();
                            datgin.success(res.message)
                        },
                        error: function(xhr) {
                            datgin.error(xhr.responseJson.message ||
                                'Đã có lỗi xảy ra, vui lòng thử lại sau!')
                        }
                    });
                }
            });
        });
    </script>
@endpush
