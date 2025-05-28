@extends('backend.layouts.master')
@section('title', 'Thêm mới sản phẩm')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card">
        <div class="card-header  d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Thêm sản phẩm</h3>
            <div class="card-tools">
                <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Danh sách sản phẩm</a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button"
                    role="tab" aria-controls="info" aria-selected="true">
                    Thông tin sản phẩm
                </button>
            </li>

            </li>
        </ul>

        <div class="row">
            <div class="col-lg-9">
                <div class="tab-content" id="productTabsContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Cột bên trái -->
                                    <div class="add_product">
                                        <!-- Tên sản phẩm -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">

                                            <b id="slug-link" class="text-primary"><small>{{ env('APP_URL') }}/</small></b>
                                        </div>

                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <input type="text" id="slug" name="slug"
                                                class="form-control @error('slug') is-invalid @enderror"
                                                placeholder="Nhập slug">
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Mô tả ngắn --}}
                                        <div class="mb-3">
                                            <label for="description_short">Mô tả ngắn</label>
                                            <textarea id="description_short" name="description_short"
                                                class="form-control @error('description_short') is-invalid @enderror" placeholder="Nhập mô tả ngắn"
                                                rows="3"></textarea>
                                            @error('description_short')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="content">Nội dung</label>
                                            <textarea id="content" name="description" class="form-control ckeditor @error('description') is-invalid @enderror"
                                                rows="8" placeholder="Nội dung"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Giá --}}
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Giá bán</label>
                                            <input type="text" class="form-control" id="fake_price"
                                                placeholder="Giá bán sản phẩm" value="{{ old('price') }}">
                                            <input type="hidden" name="price" value="{{ old('price') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <label for="discount-type" class="form-label">Chọn loại giảm giá:</label>
                                        <select id="discount-type" class="form-select" name="discount_type">
                                            <option value="amount" @selected(old('discount_type') == 'amount')>Giảm tiền</option>
                                            <option value="percentage" @selected(old('discount_type') == 'percentage')>Giảm theo %
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <label for="discount_value" class="form-label">Nhập giá trị giảm:</label>
                                        <input value="0" type="text" id="fake_discount_value" class="form-control"
                                            placeholder="Nhập số tiền hoặc %">
                                        <input value="0" type="hidden" name="discount_value">
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <label for="start-date" class="form-label">Ngày bắt đầu:</label>
                                        <input type="date" id="start-date" value="{{ old('discount_start_date') }}"
                                            class="form-control" name="discount_start_date">
                                    </div>


                                    <div class="col-lg-3 mb-3">
                                        <label for="end-date" class="form-label">Ngày kết thúc:</label>
                                        <input type="date" value="{{ old('discount_end_date') }}" id="end-date"
                                            class="form-control" name="discount_end_date">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="image" class="form-label">Album ảnh</label>
                                        <div class="input-images pb-3"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Google Snippet Preview -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Preview trên Google</label>
                                    <div id="google-snippet-preview"
                                        style="background:#fff;border:1px solid #e0e0e0;padding:16px 20px;border-radius:8px;max-width:700px;">
                                        <div id="gsp-title"
                                            style="color:#1a0dab;font-size:20px;line-height:1.2;font-weight:400;margin-bottom:2px;">
                                           </div>
                                        <div id="gsp-url"
                                            style="color:#006621;font-size:14px;line-height:1.3;margin-bottom:2px;">
                                            {{ url('/blog') }}/<span
                                                id="gsp-slug"></span>
                                        </div>
                                        <div id="gsp-desc" style="color:#545454;font-size:13px;line-height:1.4;">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- List SEO --}}
                        <div class="" id="result">
                            @include('backend.products.seo')

                        </div>

                        <!-- Thêm vào phần đầu form, sau phần nội dung chính -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="seoTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="basic-tab" data-bs-toggle="tab"
                                            data-bs-target="#basic" type="button" role="tab">
                                            <i class="fas fa-info-circle"></i> SEO Cơ bản
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="seoTabsContent">
                                    <!-- Tab SEO Cơ bản -->
                                    <div class="tab-pane fade show active" id="basic" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- SEO Title -->
                                                <div class="form-group mb-3 position-relative">
                                                    <label for="title_seo" class="form-label">
                                                        SEO tiêu đề sản phẩm </label>
                                                    <input type="text" class="form-control" id="title_seo"
                                                        name="title_seo" placeholder="Nhập tiêu đề sản phẩm SEO">
                                                </div>

                                                <!-- SEO Description -->
                                                <div class="form-group mb-3 position-relative">
                                                    <label for="description_seo" class="form-label">
                                                        SEO mô tả ngắn sản phẩm
                                                    </label>
                                                    <textarea class="form-control" id="description_seo" name="description_seo" rows="3"
                                                        placeholder="Nhập mô tả sản phẩm SEO"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="parameters" role="tabpanel" aria-labelledby="parameters-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea id="description_short" class="form-control" name="description_short" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-3">

                <!-- Catalogue -->
                <div class="card mb-3">
                    <div class="card-body">
                        <label class="mb-2 fw-semibold">Danh mục <span class="text-danger">*</span></label>
                        <select class="form-select select2" name="category_id" id="category_id" required>
                            <option value="">-- Chọn danh mục --</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('category_id', $product->category_id ?? '') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ảnh đại diện</h3>
                    </div>

                    <div class="form-group">
                        <img src="" alt="" id="image_main" class="img-fluid w-100 mb-3">
                        <a href="#" id="select_main_image" style="text-decoration: underline">Chọn ảnh
                            tiêu biểu</a>

                        <input type="file" name="image" id="image" class="form-control" style="display: none">
                    </div>
                </div>

                {{-- Keyword --}}
                <div class="card mb-3">
                    <div class="card-body">
                        <label for="keywords" class="mb-3">Keywords <i
                                class="fa-solid fa-key tag-label-icon"></i></label>
                        <input type="text" id="keywords" name="keywords"
                            class="form-control @error('keywords') is-invalid @enderror" placeholder="Enter keywords"
                            value="{{ old('keywords', isset($product->keywords) ? $product->keywords->pluck('name')->implode(',') : '') }}">
                        @error('keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
        </div>

    </form>



@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/js/fileinput.min.js"></script>

    <script src="{{ asset('backend/assets/js/image-uploader.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('ckfinder_php_3.7.0/ckfinder/ckfinder.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

    <script>
        const BASE_URL = "{{ url('/') }}";
    </script>

    {{-- Cập nhật vào preview --}}
    <script>
        updateCharCount('#title_seo', 60);
        updateCharCount('#description_seo', 160);

        // autoGenerateSlug('#title', '#slug')
    </script>


    <script>
        $(document).ready(function() {
            $('#category_id').select2({

                placeholder: "Chọn danh mục",
                allowClear: true,
                width: '100%'
            });

            const input = document.querySelector("#keywords");

            // Mảng từ khoá có sẵn từ controller
            const keywordSuggestions = @json($keywords);
            new Tagify(input, {
                delimiters: ",",
                whitelist: keywordSuggestions,
                dropdown: {
                    enabled: 1,
                    fuzzySearch: true,
                    position: 'text',
                    highlightFirst: true
                }
            });
        });


        // Google Snippet Preview
        function updateSnippetPreview() {
            let seoTitle = $('#title_seo').val() || 'Tiêu đề bài viết';
            let slug = $('#slug').val() || 'slug-bai-viet';
            let seoDescription = $('#description_seo').val() || 'Mô tả ngắn của bài viết sẽ hiển thị ở đây.';

            $('#gsp-title').text(seoTitle);
            $('#gsp-slug').text(slug);
            $('#gsp-desc').text(seoDescription);

        }
        $('#title_seo, #slug, #description_seo').on('input', updateSnippetPreview);
        updateSnippetPreview();



        // Thư viện ảnh
        $('.input-images').imageUploader({
            preloaded: [],
            imagesInputName: 'images',
            preloadedInputName: 'old',
            maxSize: 5 * 1024 * 1024,
            maxFiles: 15,
        });

        $('#select_main_image').click(function(e) {
            e.preventDefault();
            $('#image').click();
        });

        $('#image').change(function() {
            const file = $(this)[0].files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#image_main').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });

        function slugify(str) {
            return str
                .toLowerCase()
                .normalize('NFD') // chuyển tiếng Việt thành không dấu
                .replace(/[\u0300-\u036f]/g, '') // xóa các dấu
                .replace(/[^a-z0-9\s-]/g, '') // xóa ký tự đặc biệt
                .trim()
                .replace(/\s+/g, '-') // chuyển khoảng trắng thành dấu gạch ngang
                .replace(/-+/g, '-'); // xóa nhiều dấu gạch liền nhau
        }

        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const slugLink = document.getElementById('slug-link');

        nameInput.addEventListener('input', function() {
            const slug = slugify(this.value);
            slugInput.value = slug;
            slugLink.innerHTML = `<small>{{ env('APP_URL') }}/</small>` + slug;
        });
    </script>
@endpush

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('backend/assets/css/image-uploader.min.css') }}">

    <style>
        code:hover {
            cursor: pointer;
        }

        .image-uploader .uploaded .uploaded-image {
            width: calc(49.666667% - 1rem);
            padding-bottom: calc(49.666667% - 1rem);
        }

        .tagify {
            height: auto !important;
        }

        .upload-text:hover {
            cursor: pointer;
        }

        .card-title {
            margin-bottom: 0;
        }

        #toggle-seo-fields {
            font-size: 1rem !important;
            cursor: pointer;
            font-weight: 500;
        }

        .existed-seo-meta {
            display: none;
        }

        .seo-preview * {
            word-break: break-all;
        }

        .seo-preview .page-title-seo {
            color: #1a0dab;
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 2px;
        }

        .seo-preview .page-url-seo p {
            word-wrap: break-word;
            color: #006621;
            display: block;
            font-size: 13px;
            line-height: 16px;
            margin-bottom: 2px;
        }
    </style>
@endpush
