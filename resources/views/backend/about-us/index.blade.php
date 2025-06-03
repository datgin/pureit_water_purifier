@extends('backend.layouts.master')

@section('title', 'Đánh giá của khách hàng')

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
                    Về chúng tôi
                </li>
            </ol>
        </nav>
    </div>

    <form action="" method="post" id="myForm">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin về chúng tôi</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="about-us-rows">
                                <!-- Rows will be added here dynamically -->
                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-success btn-sm" id="add-row">
                                    <i class="fas fa-plus"></i> Thêm hàng mới
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save"></i> Lưu thay đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Template for new row -->
    <template id="row-template">
        <div class="row mb-4 about-us-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                <div class="form-group">
                                    <img class="img-fluid img-thumbnail w-100  show-image"
                                        style="cursor: pointer; height: 140px;" src="{{ showImage('') }}" alt=""
                                        onclick="document.getElementById('image-input-{index}').click();">
                                    <input type="file" name="data[][image]" class="form-control d-none image-input"
                                        accept="image/*" onchange="previewImage(event, 'show-image-{index}')">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <input type="text" name="data[][title]" class="form-control"
                                        placeholder="Nhập tiêu đề">
                                </div>
                                <div class="">
                                    <textarea name="data[][description]" class="form-control" rows="3" placeholder="Nhập nội dung"></textarea>
                                </div>
                            </div>
                            <div class="col-md-1 d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-danger btn-sm delete-row">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const container = document.getElementById('about-us-rows');
                const template = document.getElementById('row-template');
                const addButton = document.getElementById('add-row');
                let rowCount = 0;

                // Add first row by default
                addNewRow();

                // Add new row
                addButton.addEventListener('click', addNewRow);

                // Delete row
                container.addEventListener('click', function(e) {
                    if (e.target.closest('.delete-row')) {
                        const row = e.target.closest('.about-us-row');
                        row.remove();
                        // if (container.children.length > 1) {

                        // } else {
                        //     alert('Phải có ít nhất một hàng!');
                        // }
                    }
                });

                function addNewRow() {
                    const clone = template.content.cloneNode(true);
                    const row = clone.querySelector('.about-us-row');

                    // Update IDs with unique index
                    const imageInput = row.querySelector('.image-input');
                    const showImage = row.querySelector('.show-image');

                    imageInput.id = `image-input-${rowCount}`;
                    showImage.id = `show-image-${rowCount}`;
                    showImage.setAttribute('onclick', `document.getElementById('image-input-${rowCount}').click();`);
                    imageInput.setAttribute('onchange', `previewImage(event, 'show-image-${rowCount}')`);

                    container.appendChild(clone);
                    rowCount++;
                }

                $('#myForm').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this)
                    console.log(formData);

                    $.ajax({
                        url: '/admin/aboutus',
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            datgin.success(res.message)
                        },
                        error: function(xhr) {
                            datgin.error(xhr.responseJSON?.message || 'Đã xảy ra lỗi.');
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
