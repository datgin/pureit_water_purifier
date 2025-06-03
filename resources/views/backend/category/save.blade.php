@extends('backend.layouts.master')

@section('title', 'Thêm mới danh mục')

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin') }}" class="mb-0 d-inline-block lh-1 text-uppercase">
                        Tổng quan
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.categories.index') }}" class="mb-0 d-inline-block lh-1 text-uppercase">
                        danh mục
                    </a>
                </li>
                <li class="breadcrumb-item active text-uppercase" aria-current="page">
                    @isset($category)
                        Cập nhật danh mục - {{ $category->name }}
                    @else
                        Thêm mới danh mục
                    @endisset
                </li>
            </ol>
        </nav>
    </div>

    <form action="" method="post" id="myForm">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label fw-bold">Tên danh mục</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nhập tên danh mục" value="{{ $category->name ?? '' }}">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="slug" class="form-label fw-bold">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    placeholder="Nhập slug" value="{{ $category->slug ?? '' }}">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="description" class="form-label fw-bold">Mô tả</label>
                                <textarea class="form-control ckeditor" name="description" id="description" placeholder="Nhập description">{!! $category->description ?? '' !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Tối ưu hóa công cụ tìm kiếm</h4>
                    </div>

                    <div class="card-body">
                        <div class="seo-preview">
                            <p class="default-seo-description">
                                Thiết lập tiêu đề và mô tả meta để trang web của bạn dễ dàng được phát hiện trên
                                các công cụ tìm kiếm như Google
                            </p>
                            <div class="existed-seo-meta">

                                <h4 class="page-title-seo text-truncate">
                                    -
                                </h4>

                                <div class="page-url-seo">
                                    <p>
                                        {{ config('app.url') }}/<span></span>
                                    </p>
                                </div>

                                <div>
                                    <span style="color: #70757a;">
                                        {{ now()->format('d/m/Y') }} - </span>
                                    <span class="page-description-seo" style="color: #70757a;">

                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="seo-edit-section">
                            <hr class="my-4">
                            <div class="row">
                                <div class="mb-3 position-relative col-lg-12">
                                    <label for="seo_title" class="form-label">Tiêu đề seo</label>
                                    <input type="text" placeholder="Tiêu đề seo" class="form-control" name="seo_title"
                                        id="seo_title" maxlength="250" value="{{ $category->seo_title ?? '' }}">
                                </div>
                                <div class="mb-3 position-relative col-lg-12">
                                    <label for="seo_description" class="form-label">Mô tả seo</label>
                                    <textarea placeholder="Mô tả seo" class="form-control" name="seo_description" id="seo_description" rows="3"
                                        maxlength="400">{{ $category->seo_description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold">Xuất bản</h4>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-sm fs-6 me-2">
                            <svg class="icon icon-left svg-icon-ti-ti-device-floppy" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M14 4l0 4l-6 0l0 -4"></path>
                            </svg>
                            Lưu</button>

                        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-light fs-6 border">
                            <svg class="icon icon-left svg-icon-ti-ti-refresh" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                            </svg>
                            Quay lại</a>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">Trạng thái
                        </h4>
                    </div>
                    <div class="card-body">
                        <select name="status" class="form-select form-control" id="status">
                            <option value="1" @selected($category->status ?? '')>Xuất bản </option>
                            <option value="0" @selected(optional($category)->status === false)>Chưa xuất bản</option>
                        </select>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">Loại danh mục</h4>
                    </div>
                    <div class="card-body">
                        <select name="type" class="form-select form-control" id="type">
                            <option value="product" @selected(old('type', $category->type ?? '') === 'product')>Sản phẩm</option>
                            <option value="blog" @selected(old('type', $category->type ?? '') === 'blog')>Bài viết</option>
                        </select>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">Vị trí thứ tự
                        </h4>
                    </div>
                    <div class="card-body">
                        <input name="location" id="location" value="{{ $category->location ?? 0 }}" type="text"
                            class="form-control" placeholder="Nhập thứ tự hiện thị">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Banner</h4>
                    </div>
                    <div class="card-body">
                        <img class="img-thumbnail" id="show_logo"
                            style="cursor: pointer; width: 100%; height: auto; object-fit: cover;"
                            src="{{ showImage($category->logo ?? '') }}" alt=""
                            onclick="document.getElementById('logo').click();">

                        <input type="file" name="logo" id="logo" class="form-control d-none"
                            accept="image/*" onchange="previewImage(event, 'show_logo')">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">Từ khóa seo
                        </h4>
                    </div>
                    <div class="card-body">
                        <input name="seo_keywords" id="seo_keywords"
                            value="{{ !empty($category->seo_keywords) ? implode(',', $category->seo_keywords) : '' }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('library/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script>
        $(function() {

            autoGenerateSlug('#name', '#slug');

            $('#seo_title').on('input', function() {
                $('.page-title-seo').text($(this).val().trim() || '-')
            })

            $('#slug').on('input', function() {
                $('.page-url-seo span').text($(this).val().trim())
            })

            $('#seo_description').on('input', function() {
                $('.page-description-seo').text($(this).val().trim())
            })

            $('#seo_keywords').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                }
            });

            $('#myForm').on('submit', function(e) {
                e.preventDefault();

                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                let formData = new FormData(this);

                let id = {{ isset($category) ? $category->id : 'null' }};

                let url = id ? `/admin/categories/${id}` : '/admin/categories';

                if (id) {
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        window.location.href = "/admin/categories";
                    },
                    error: function(xhr) {
                        datgin.error(xhr.responseJSON?.message || 'Đã xảy ra lỗi.');
                    }
                });
            })
        })
    </script>
@endpush
