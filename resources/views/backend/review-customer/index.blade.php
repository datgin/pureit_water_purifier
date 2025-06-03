@extends('backend.layouts.master')
@section('title', 'Đánh giá của khách hàng')
@section('content')
    <div class="card">
        <div class="card-header  d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Đánh giá</h3>

        </div>
    </div>
    <div class="row">
        <!-- Form Thêm/Sửa Bài Viết -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Thêm/Sửa Bài Viết</h5>
                </div>

                <div class="card-body">
                    <form id="postForm" enctype="multipart/form-data" action="{{ route('admin.reviews.store') }}">

                        <input type="hidden" name="id" id="postId">

                        <div class="mb-3">
                            <label for="name" class="form-label">Tên khách hàng <span
                                    class="text-danger">*</span></label>
                            <input id="name" name="name" class="form-control" type="text"
                                placeholder="Nhập tên khách hàng">
                            <div class="error-message text-danger"></div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh <span class="text-danger">*</span></label>
                            <img class="img-fluid img-thumbnail w-100" id="show_image"
                                style="cursor: pointer; height: 170px !important;" src="{{ showImage($post->image ?? '') }}"
                                alt="" onclick="document.getElementById('image').click();">
                            <input type="file" name="image" id="image" class="form-control d-none" accept="image/*"
                                onchange="previewImage(event, 'show_image')">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input id="address" name="address" class="form-control" type="text"
                                placeholder="Nhập địa chỉ">
                            <div class="error-message text-danger"></div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Nhập mô tả"></textarea>
                            <div class="error-message text-danger"></div>
                        </div>


                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="button" id="save">Lưu</button>
                            <button type="button" id="cancelEdit" style="display: none"
                                class="btn btn-secondary ms-2">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Danh sách bài viết -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-content-center">
                    <h3 class="card-title">DANH SÁCH </h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll" /></th>

                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>nội dung</th>

                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.scrollbar/jquery.scrollbar.min.js"></script>


    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            const api = '{{ route('admin.reviews.index') }}';

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
                    name: 'name',
                    orderable: false
                },
                {
                    data: 'address',
                    name: 'address',
                    searchable: false,
                    className: "text-center"
                },
                {
                    data: 'description',
                    name: 'description',
                    searchable: false,
                    className: "text-center"
                },

            ];


            dataTables(api, columns, 'CustomerReview', 8)

            handleDestroy('CustomerReview')

            initStatusToggle({
                model: 'CustomerReview'
            });


            $('#save').click(function(event) {

                if (!validateForm()) {
                    event.preventDefault();
                    return; // Dừng nếu có lỗi
                }
                submitForm('#postForm', function(event) {
                    $('#myTable').DataTable().ajax.reload(); // Reload bảng sau khi lưu
                    reset();
                })
            })

            $(document).on('click', '.edit', function() {
                let name = $(this).data('name');
                let image = $(this).data('image');
                let address = $(this).data('address');
                let description = $(this).data('description');
                let id = $(this).closest('tr').data('id');

                // Xóa input _method cũ (nếu có)
                $('#postForm input[name="_method"]').remove();
                // Thêm input _method mới
                $('#postForm').append('<input type="hidden" name="_method" value="PUT">');

                // Gán dữ liệu vào form
                $('#name').val(name);
                $('#description').val(description);
                $('#address').val(address);
                $('#postId').val(id);

                let imageUrl = "{{ asset('storage') }}/" + image;
                $('#show_image').attr('src', imageUrl);

                $('#cancelEdit').show();
                $('#postForm').attr('action', "{{ route('admin.reviews.update', ':id') }}".replace(':id',
                    id));

                $('#cancelEdit').off('click').on('click', function() {
                    reset();
                });
            });


            function validateForm() {
                let isValid = true;
                $('.error-message').text('').hide();

                let name = $('#name').val().trim();
                let address = $('#address').val().trim();
                let description = $('#description').val().trim();

                if (!name) {
                    $('#name').next('.error-message').text('Vui lòng nhập tiêu đề').show();
                    isValid = false;
                }
                if (!address) {
                    $('#address').next('.error-message').text('Vui lòng nhập địa chỉ').show();
                    isValid = false;
                }

                if (!description) {
                    $('#description').next('.error-message').text('Vui lòng nhập mô tả').show();
                    isValid = false;
                }

                return isValid;
            }

            function reset() {
                $('#postForm').attr('action', "{{ route('admin.reviews.store') }}");
                $('#postForm')[0].reset();
                $('#postId').val('');
                $('#show_image').attr('src', '{{ showImage('') }}');
                $('#postForm input[name="_method"]').remove();
                $('#cancelEdit').show();

            }


            function submitForm(formSelector, onSuccess) {
                const form = $(formSelector);
                const url = form.attr('action');
                const formData = new FormData(form[0]);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: url,
                    method: 'POST', // DÙNG POST để tránh lỗi upload file
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (typeof onSuccess === 'function') {
                            onSuccess(response);
                        }
                    },
                    error: function(xhr) {
                        alert('Đã xảy ra lỗi khi lưu dữ liệu!');
                    }
                });
            }



        })
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <link rel="stylesheet" href="{{ asset('backend/assets/css/image-uploader.min.css') }}">
@endpush
