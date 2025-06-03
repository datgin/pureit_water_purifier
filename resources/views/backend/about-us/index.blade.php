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
                    <form id="postForm" enctype="multipart/form-data" action="{{ route('admin.aboutus.store') }}">

                        <input type="hidden" name="id" id="postId">

                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề <span
                                    class="text-danger">*</span></label>
                            <input id="title" name="title" class="form-control" type="text"
                                placeholder="Nhập tiêu đề">
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

                                    <th>Tiêu đề</th>

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
            const api = '{{ route('admin.aboutus.index') }}';

            const columns = [{
                    data: "checkbox",
                    name: "checkbox",
                    orderable: false,
                    searchable: false,
                    width: "5px",
                    className: "text-center"
                },
                {
                    data: 'title',
                    name: 'title',
                    orderable: false
                },

                {
                    data: 'description',
                    name: 'description',
                    searchable: false,
                    className: "text-center"
                },

            ];


            dataTables(api, columns, 'AboutUs', 8)
            handleDestroy('AboutUs')

            initStatusToggle({
                model: 'AboutUs'
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
                let title = $(this).data('title');
                let image = $(this).data('image');

                let description = $(this).data('description');
                let id = $(this).closest('tr').data('id');

                // Xóa input _method cũ (nếu có)
                $('#postForm input[name="_method"]').remove();
                // Thêm input _method mới
                $('#postForm').append('<input type="hidden" name="_method" value="PUT">');

                // Gán dữ liệu vào form
                $('#title').val(title);
                $('#description').val(description);

                $('#postId').val(id);

                let imageUrl = "{{ asset('storage') }}/" + image;
                $('#show_image').attr('src', imageUrl);

                $('#cancelEdit').show();
                $('#postForm').attr('action', "{{ route('admin.aboutus.update', ':id') }}".replace(':id',
                    id));

                $('#cancelEdit').off('click').on('click', function() {
                    reset();
                });
            });


            function validateForm() {
                let isValid = true;
                $('.error-message').text('').hide();

                let title = $('#title').val().trim();

                let description = $('#description').val().trim();

                if (!title) {
                    $('#title').next('.error-message').text('Vui lòng nhập tiêu đề').show();
                    isValid = false;
                }

                if (!description) {
                    $('#description').next('.error-message').text('Vui lòng nhập mô tả').show();
                    isValid = false;
                }

                return isValid;
            }

            function reset() {
                $('#postForm').attr('action', "{{ route('admin.aboutus.store') }}");
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
