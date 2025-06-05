@extends('backend.layouts.master')


@section('title', 'Form thêm và chỉnh sửa bài viết')
@section('content')
    <div class="container-fluid">

        <form action="{{ isset($new) && $new->id ? route('admin.news.update', $new->id) : route('admin.news.store') }}"
            method="POST" enctype="multipart/form-data" id="myForm">
            @csrf

            @if (isset($new) && $new->id)
                @method('PUT')
            @endif

            <div class="row">
                <!-- Cột trái: Nội dung chính -->
                <div class="col-lg-9">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="title">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="Nhập tiêu đề"
                                    value="{{ old('title', $new->title ?? '') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" id="slug" name="slug"
                                    class="form-control @error('slug') is-invalid @enderror" placeholder=""
                                    value="{{ old('slug', $new->slug ?? '') }}">
                                <small class="text-muted">Nếu không nhập sẽ tự động lấy theo tiêu đề <span
                                        class="text-danger">*</span><span
                                        id="slug-preview">{{ old('slug', $new->slug ?? '') }}</span></small>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3 position-relative">
                                <label for="short_description">Mô tả ngắn</label>
                                <textarea id="short_description" name="short_description"
                                    class="form-control @error('short_description') is-invalid @enderror" placeholder="Nhập mô tả ngắn" rows="3">{{ old('short_description', $new->short_description ?? '') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="content">Nội dung <span class="text-danger">*</span></label>
                                <textarea id="content" name="content" class="form-control ckeditor @error('content') is-invalid @enderror"
                                    rows="8" placeholder="Nhập nội dung">{!! old('content', $new->content ?? '') !!}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                        {{ old('seo_title', $new->seo_title ?? 'Tiêu đề bài viết') }}</div>
                                    <div id="gsp-url"
                                        style="color:#006621;font-size:14px;line-height:1.3;margin-bottom:2px;">
                                        {{ url('/news') }}/<span
                                            id="gsp-slug">{{ old('slug', $new->slug ?? 'slug-bai-viet') }}</span></div>
                                    <div id="gsp-desc" style="color:#545454;font-size:13px;line-height:1.4;">
                                        {{ old('seo_description', $new->seo_description ?? 'Mô tả ngắn của bài viết sẽ hiển thị ở đây.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <label for="seo_title" class="form-label">
                                                    SEO tiêu đề </label>
                                                <input type="text" class="form-control" id="seo_title" name="seo_title"
                                                    value="{{ old('seo_title', $new->seo_title ?? '') }}"
                                                    placeholder="Nhập tiêu đề SEO">
                                            </div>

                                            <!-- SEO Description -->
                                            <div class="form-group mb-3 position-relative">
                                                <label for="seo_description" class="form-label">
                                                    SEO nội dung
                                                </label>
                                                <textarea class="form-control" id="seo_description" name="seo_description" rows="3" placeholder="Nhập mô tả SEO">{{ old('seo_description', $new->seo_description ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Điểm SEO --}}
                    @php

                        $seoScoreValue = $seoData['seoScoreValue'] ?? 0;
                        $analysis = $seoData['analysis'] ?? [];
                        $hasWarning = $seoData['hasWarning'] ?? false;

                        $seoColor = 'bg-danger'; // đỏ mặc định (dưới 50)
                        $badgeClass = 'bg-danger';

                        if ($seoScoreValue >= 80) {
                            $seoColor = 'bg-success'; // xanh lá (tốt)
                            $badgeClass = 'bg-success';
                        } elseif ($seoScoreValue >= 50) {
                            $seoColor = 'bg-warning'; // vàng (trung bình)
                            $badgeClass = 'bg-warning text-dark';
                        }
                    @endphp

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0">Điểm SEO tổng thể</h5>
                                <span class="badge {{ $badgeClass }} fs-6" id="seo-score-badge">
                                    {{ $seoScoreValue }}/100
                                </span>
                            </div>
                            <div class="progress mb-3" style="height: 10px;">
                                <div class="progress-bar {{ $seoColor }}" id="seo-score-progress" role="progressbar"
                                    style="width: {{ $seoScoreValue }}%;" aria-valuenow="{{ $seoScoreValue }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- List SEO --}}
                    <div class="" id="result">
                        @include('backend.news.seo', ['seoData' => $seoData])

                    </div>

                </div>

                <!-- Cột phải: Các khối chức năng -->
                <div class="col-lg-3">
                    <!-- Publish -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                <h5 class="mb-0" style="font-weight:600;">Đăng bài</h5>
                            </div>
                            <div class="d-flex flex-column gap-2 align-items-center">
                                <button type="submit" class="btn btn-primary btn-lg w-100 mb-2"
                                    style="font-weight:600;">
                                    <i class="fa fa-save me-1"></i> Lưu
                                </button>
                                <button type="submit" class="btn btn-outline-secondary w-100" style="font-weight:600;">
                                    <i class="fa fa-sign-out-alt me-1"></i> Lưu & Thoát
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <label for="status" class="mb-3">Trạng thái <span class="text-danger">*</span></label>
                            <select id="status" name="status" class="form-select">
                                <option value="1" {{ old('status', $new->status ?? '') == 1 ? 'selected' : '' }}>
                                    Xuất bản</option>
                                <option value="0" {{ old('status', $new->status ?? '') == 0 ? 'selected' : '' }}>
                                    Chưa xuất bản
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Catalogue -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="mb-2 fw-semibold">Danh mục <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="category_id" required>
                                <option value="">-- Chọn danh mục --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(isset($new->category) && $category->id == $new->category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Image -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <label for="image" class="form-label">Ảnh nổi bật <span
                                    class="text-danger">*</span></label>
                            <img class="img-fluid img-thumbnail w-100 mb-2" id="show_image" style="cursor: pointer"
                                src="{{ $new->image ?? showImage('') }}" alt=""
                                onclick="document.getElementById('image').click();">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="file" name="image" id="image" class="form-control d-none"
                                accept="image/*" onchange="previewImage(event, 'show_image')">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fs-6 fw-bold required">Từ khóa seo
                            </h4>
                        </div>
                        <div class="card-body">
                            <input name="seo_keywords" id="seo_keywords"
                                value="{{ !empty($new->seo_keywords) ? implode(',', $new->seo_keywords) : '' }}">
                        </div>
                    </div>

                    <!-- Thời gian đăng/xóa -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <label for="posted_at" class="form-label">Thời gian đăng bài</label>
                            <input type="datetime-local" id="posted_at" name="posted_at"
                                class="form-control @error('posted_at') is-invalid @enderror"
                                value="{{ old('posted_at', isset($new->posted_at) ? date('Y-m-d\TH:i', strtotime($new->posted_at)) : '') }}">
                            @error('posted_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label for="remove_at" class="form-label mt-3">Thời gian xóa bài</label>
                            <input type="datetime-local" id="remove_at" name="remove_at"
                                class="form-control @error('remove_at') is-invalid @enderror"
                                value="{{ old('remove_at', isset($new->remove_at) ? date('Y-m-d\TH:i', strtotime($new->remove_at)) : '') }}">
                            @error('remove_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Để trống nếu không muốn tự động xóa bài</small>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        rel="stylesheet">
    <style>
        .btn-lg {
            font-size: 1.1rem;
            padding: 12px 0;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .border-bottom {
            border-bottom: 1px solid #f0f0f0 !important;
        }

        .invalid-feedback {
            display: block;
        }

        #seo-card .form-group label {
            font-weight: 500;
        }

        #seo-card .alert-info {
            padding: 8px 12px;
        }

        #seo-card input[type="file"] {
            padding: 4px;
        }

        #edit-seo-btn {
            font-size: 1rem;
            color: #1976d2;
            text-decoration: none;
        }

        #edit-seo-btn:hover {
            text-decoration: underline;
        }

        .tag-label-icon {
            font-size: 1em;
            color: #8a99b3;
            margin-left: 6px;
            vertical-align: middle;
        }

        .catalogue-item {
            transition: all 0.3s ease;
        }

        .catalogue-item:hover {
            background-color: #f8f9fa;
        }

        #catalogue-search {
            border-right: none;
        }

        #catalogue-search:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .input-group-text {
            border-left: none;
        }

        #catalogue-list {
            max-height: 300px;
            overflow-y: auto;
        }

        #catalogue-list::-webkit-scrollbar {
            width: 6px;
        }

        #catalogue-list::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #catalogue-list::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        #catalogue-list::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('library/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('.select2').select2({
                placeholder: "Chọn Catalogue",
                allowClear: true,
                width: '100%'
            });

            $(document).on('click', '#edit-seo-btn', function(e) {
                e.preventDefault();
                // $('#seo-form').slideToggle(200);
                // $('#seo-desc').slideToggle(200);
            });

            // Google Snippet Preview
            function updateSnippetPreview() {
                let seoTitle = $('#seo_title').val() || 'Tiêu đề bài viết';
                let slug = $('#slug').val() || 'slug-bai-viet';
                let seoDescription = $('#seo_description').val() || 'Mô tả ngắn của bài viết sẽ hiển thị ở đây.';

                $('#gsp-title').text(seoTitle);
                $('#gsp-slug').text(slug);
                $('#gsp-desc').text(seoDescription);

            }
            $('#seo_title, #slug, #seo_description').on('input', updateSnippetPreview);
            updateSnippetPreview();

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Xử lý radio button
            const radioButtons = document.querySelectorAll('input[name="category_id"]');
            const checkedRadio = document.querySelector('input[name="category_id"]:checked');

            if (!checkedRadio && radioButtons.length > 0) {
                radioButtons[0].checked = true;
            }

            // Xử lý form submit
            document.querySelector('form').addEventListener('submit', function(e) {
                const checkedRadio = document.querySelector('input[name="category_id"]:checked');
                if (!checkedRadio) {
                    e.preventDefault();
                    alert('Vui lòng chọn một danh mục');
                }
            });

            CKEDITOR.instances['content'].on('change', function() {
                clearTimeout(seoTimeout);
                seoTimeout = setTimeout(runSeoAnalysis, 500);
            });
        });
    </script>

    <script>
        $('#edit-seo-btn-error').on('click', function(e) {
            e.preventDefault();
            $('#seo-form-error').slideToggle(200);
            $('#seo-desc-error').slideToggle(200);
        });

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

            let id = "{{ isset($new) ? $new->id : '' }}";

            let url = id ? `/admin/news/${id}` : '/admin/news';

            if (id !== "") {
                formData.append('_method', 'PUT');
            }


            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    window.location.href = "/admin/news";
                },
                error: function(xhr) {
                    datgin.error(xhr.responseJSON?.message || 'Đã xảy ra lỗi.');
                }
            });
        })
    </script>

    <!-- Script đếm ký tự và cập nhật preview -->
    <script>
        updateCharCount('#seo_title', 60);
        updateCharCount('#seo_description', 160);

        autoGenerateSlug('#title', '#slug')
    </script>

    {{-- Xử lí khi thêm mới bài viết --}}
    <script>
        let seoTimeout;

        // Định nghĩa hàm trước
        function runSeoAnalysis() {
            const content = CKEDITOR.instances['content']?.getData() || '';

            const rawKeywords = $('#seo_keywords').val();
            let seo_keywords = [];

            try {
                const parsed = JSON.parse(rawKeywords);
                if (Array.isArray(parsed)) {
                    seo_keywords = parsed.map(k => k.value?.trim()).filter(Boolean);
                }
            } catch (e) {
                seo_keywords = (rawKeywords || '').split(',').map(k => k.trim()).filter(Boolean);
            }

            const seo_title = $('#seo_title').val();
            const hasKeyword = seo_keywords.some(keyword => seo_title.toLowerCase().includes(keyword.toLowerCase()));
            const seo_description = $('#seo_description').val();
            const slug = $('#slug').val();
            const short_description = $('#short_description').val();

            const data = {
                content,
                seo_keywords,
                seo_title,
                hasKeyword,
                seo_description,
                slug,
                short_description,
                _token: '{{ csrf_token() }}'
            };

            console.log('⏳ Gửi dữ liệu SEO:', data);

            $.ajax({
                url: "{{ route('admin.news.seo.analysis.live') }}",
                method: "POST",
                data: JSON.stringify(data),
                contentType: "application/json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#seo-score-badge').removeClass().addClass(`badge ${response.badgeClass} fs-6`).text(
                            response.seoScoreVal + '/100');
                        $('#seo-score-progress').removeClass().addClass(`progress-bar ${response.seoColor}`)
                            .css('width', response.seoScoreVal + '%');
                        $('#result').html(response.html);
                    }
                    console.log('✅ Phản hồi SEO:', response);
                },
                error: function(xhr) {
                    console.error('❌ Lỗi SEO:', xhr);
                }
            });
        }

        // Chờ document sẵn sàng
        $(document).ready(function() {
            // Các input thông thường
            $('#seo_title, #seo_keywords, #seo_description, #slug, #short_description').on('input', function() {
                clearTimeout(seoTimeout);
                seoTimeout = setTimeout(runSeoAnalysis, 500);
            });

            // CKEditor ready
            CKEDITOR.on('instanceReady', function(evt) {
                evt.editor.on('change', function() {
                    clearTimeout(seoTimeout);
                    seoTimeout = setTimeout(runSeoAnalysis, 500);
                });

                // Nếu là trang chỉnh sửa thì gọi luôn
                @if (isset($new))
                    setTimeout(runSeoAnalysis, 500);
                @endif
            });
        });
    </script>
@endpush
