@extends('backend.layouts.master')

@section('title', 'Thêm mới bài viết')
@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ $isEdit ? route('admin.news.update', ['id' => $new->id]) : route('admin.news.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif
                <h5 class="section-title">Thông tin bài viết{{ isset($new) ? ' : ' . $new->titles : '' }}</h5>
                <div class="row ">
                    <!-- Form Inputs -->
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề</label>
                            <input type="text" id="title" name="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title"
                                value="{{ old('title', $new->title ?? '') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Mô tả ngắn</label>
                            <input type="text" id="short_description" name="short_description"
                                class="form-control @error('short_description') is-invalid @enderror"
                                value="{{ old('short_description', $new->short_description ?? '') }}">
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="content" class="form-label">Nội dung</label>
                            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5"
                                placeholder="Enter content">{{ old('content', $new->content ?? '') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3"
                            style="text-align: center;display: flex;
                            flex-direction: column;
                            align-items: center;">
                            <label for="image" class="form-label">Ảnh</label>

                            <img class="img-fluid img-thumbnail w-100" id="show_image" style="cursor: pointer"
                                src="{{ showImage($new->image ?? '') }}" alt=""
                                onclick="document.getElementById('image').click();">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="file" name="image" id="image" class="form-control d-none" accept="image/*"
                                onchange="previewImage(event, 'show_image')">

                        </div>

                        <label for="status" class="form-label">Trạng thái</label>
                        <select id="status" name="status" class="form-select">
                            <option value="1" {{ old('status', $new->status ?? '') == 1 ? 'selected' : '' }}>Hiển thị
                            </option>
                            <option value="0" {{ old('status', $new->status ?? '') == 0 ? 'selected' : '' }}>Ẩn
                            </option>
                        </select>

                        <div class="mb-3 mt-3">
                            <label for="posted_at" class="form-label">Ngày đăng</label>
                            <input type="datetime-local" id="posted_at" name="posted_at"
                                class="form-control @error('posted_at') is-invalid @enderror"
                                value="{{ old('posted_at', isset($new->posted_at) ? \Carbon\Carbon::parse($new->posted_at)->format('Y-m-d\TH:i') : '') }}">
                            @error('posted_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="remove_at" class="form-label">Ngày gỡ</label>
                            <input type="datetime-local" id="remove_at" name="remove_at"
                                class="form-control @error('remove_at') is-invalid @enderror"
                                value="{{ old('remove_at', isset($new->remove_at) ? \Carbon\Carbon::parse($new->remove_at)->format('Y-m-d\TH:i') : '') }}">
                            @error('remove_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-12 mt-4">
                        <h5 class="section-title" style="background: #695aec">Thông tin SEO</h5>
                        <div class="mb-3">
                            <label for="seo_keyword" class="form-label">Từ khóa SEO</label>
                            <input type="text" id="seo_keyword" name="seo_keyword"
                                class="form-control @error('seo_keyword') is-invalid @enderror"
                                placeholder="Enter SEO keywords"
                                value="{{ old('seo_keyword', $new->seo_keyword ?? '') }}">
                            @error('seo_keyword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="seo_title" class="form-label">Tiêu đề SEO</label>
                            <input type="text" id="seo_title" name="seo_title"
                                class="form-control @error('seo_title') is-invalid @enderror"
                                placeholder="Enter SEO title" value="{{ old('seo_title', $new->seo_title ?? '') }}">
                            @error('seo_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="seo_description" class="form-label"> Nội dung SEO </label>
                            <textarea id="seo_description" name="seo_description"
                                class="form-control @error('seo_description') is-invalid @enderror" rows="3"
                                placeholder="Enter SEO description">{{ old('seo_description', $new->seo_description ?? '') }}</textarea>
                            @error('seo_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end">

                        <button type="submit" class="btn btn-success">{{ isset($new) ? 'Cập nhật' : 'Lưu' }}</button>
                    </div>
            </form>

        </div>

    </div>
    </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        rel="stylesheet">
    <style>
        .cke_notifications_area {
            display: none;
        }

        .error {
            color: red;
        }

        .selectize-control {
            border: 0px !important;
            padding: 0px !important;
        }

        .selectize-input {
            padding: 10px 12px !important;
            border: 2px solid #ebedf2 !important;
            border-radius: 5px !important;
            border-top: 1px solid #ebedf2 !important;
        }

        /* Phần danh mục */
        .section-title {
            font-size: 1.2rem;
            font-weight: bold;
            padding-top: 20px;
            margin-bottom: 15px;
            padding: 10px;
            color: #fff;
            text-align: center;
        }

        .section-title+.section-title {
            color: #FF9800
        }

        .section-title:nth-of-type(1) {
            background-color: #4CAF50;
        }

        /* Nền cam cho SEO */
        .section-title:nth-of-type(2) {
            margin-top: 20px;
            background-color: #695aec;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .btn {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 5px;
        }

        #preview-frame {
            width: 100%;
            height: 240px;
            border: 2px dashed #ddd;
            display: flex;
            border-radius: 10px;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-top: 10px;
        }

        #preview-frame img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        label {
            font-weight: 600;
        }
    </style>
@endpush
@push('scripts')
    <script>
        const BASE_URL = "{{ url('/') }}";
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('ckfinder_php_3.7.0/ckfinder/ckfinder.js') }}"></script>

    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function() {
            $jq('#seo_keyword').selectize({
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                },
                plugins: ['remove_button'],
                onKeyDown: function(e) {
                    if (e.key === ' ') {
                        e.preventDefault();
                        var value = this.$control_input.val().trim();
                        if (value) {
                            this.addItem(value);
                            this.$control_input.val('');
                        }
                    }
                }
            });

            CKEDITOR.replace('content', {
                filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
            });
        });

    </script>
@endpush
