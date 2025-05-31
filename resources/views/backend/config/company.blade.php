@extends('backend.layouts.master')
@section('title', 'Thêm mới sản phẩm')

@section('content')
    <div class="card">
        <div class="card-header  d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Cấu hình công ty</h3>
            <a href="{{ route('admin.config.seo') }}">Cấu hình SEO</a>
        </div>
    </div>

    <form action="{{ route('admin.config.update') }}" method="post" enctype="multipart/form-data" id="myForm">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" aria-labelledby="info-tab">
                                <div class="row">
                                    <div class="col-md-8 row">
                                        <div class="form-group mb-2 col-lg-12">
                                            <label for="company" class="form-label">Tên công ty </label>
                                            <input value="{{ $config->company ?? '' }}" id="company"
                                                name="company"class="form-control" type="text" placeholder="Tên công ty">

                                        </div>

                                        <div class="form-group mb-2 col-lg-12">
                                            <label for="email" class="form-label">Email </label>
                                            <input value="{{ $config->email ?? '' }}" id="email"
                                                name="email"class="form-control" type="text" placeholder="Email">
                                        </div>

                                        <div class="form-group mb-2 col-lg-12">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <textarea name="address" class="form-control " rows="3" placeholder="Địa chỉ">{{ $config->address ?? '' }}</textarea>
                                        </div>

                                        <div class="form-group mb-2 col-lg-4">
                                            <label for="hotline" class="form-label">Hotline</label>
                                            <input value="{{ $config->hotline ?? '' }}" id="hotline"
                                                name="hotline"class="form-control" type="text" placeholder="Di động">
                                        </div>
                                        <div class="form-group mb-2 col-lg-4">
                                            <label for="hotline_kinhdoanh" class="form-label">Di động kinh doanh</label>
                                            <input value="{{ $config->hotline_kinhdoanh ?? '' }}" id="hotline_kinhdoanh"
                                                name="hotline_kinhdoanh"class="form-control" type="text" placeholder="Di động kinh doanh">
                                        </div>
                                        <div class="form-group mb-2 col-lg-4">
                                            <label for="hotline_baotri" class="form-label">Di động bảo trì</label>
                                            <input value="{{ $config->hotline_baotri ?? '' }}" id="hotline_baotri"
                                                name="hotline_baotri"class="form-control" type="text" placeholder="Di động bảo trì">
                                        </div>

                                        {{-- <div class="form-group mb-2 col-lg-6">
                                            <label for="mst" class="form-label">MST</label>
                                            <input value="{{ $config->mst ?? '' }}" id="mst"
                                                name="mst"class="form-control" type="text" placeholder="MST">
                                        </div> --}}
                                        <div class="form-group mb-2 col-lg-6">
                                            <label for="stk" class="form-label">Tên tài khoản</label>
                                            <input value="{{ $config->ttk ?? '' }}" id="ttk"
                                                name="ttk"class="form-control" type="text" placeholder="Tên tài khoản">
                                        </div>


                                        <div class="form-group mb-2 col-lg-6">
                                            <label for="stk" class="form-label">STK</label>
                                            <input value="{{ $config->stk ?? '' }}" id="stk"
                                                name="stk"class="form-control" type="text" placeholder="STK">
                                        </div>

                                        <div class="form-group mb-2 col-lg-6">
                                            <label for="bank" class="form-label">Ngân hàng</label>
                                            <input value="{{ $config->bank ?? '' }}" id="bank"
                                                name="bank"class="form-control" type="text" placeholder="Ngân hàng">
                                        </div>


                                        <div class="form-group mb-2 col-lg-6">
                                            <label for="branch" class="form-label">Chi nhánh</label>
                                            <input value="{{ $config->branch ?? '' }}" id="branch"
                                                name="branch"class="form-control" type="text" placeholder="Chi nhánh">
                                        </div>

                                        <div class="form-group mb-2 col-lg-4">
                                            <label for="facebook_link" class="form-label">Link FaceBook</label>
                                            <input value="{{ $config->facebook_link ?? '' }}" id="facebook_link"
                                                name="facebook_link"class="form-control" type="text"
                                                placeholder="Link FaceBook ">
                                        </div>

                                        <div class="form-group mb-2 col-lg-4">
                                            <label for="youtube_link" class="form-label"> Link Youtobe </label>
                                            <input value="{{ $config->youtube_link ?? '' }}" id="youtube_link"
                                                name="youtube_link"class="form-control" type="text"
                                                placeholder=" Link Youtobe">
                                        </div>

                                        <div class="form-group mb-2 col-lg-4">
                                            <label for="ig_link" class="form-label"> Link instagram </label>
                                            <input value="{{ $config->ig_link ?? '' }}" id="ig_link"
                                                name="ig_link"class="form-control" type="text"
                                                placeholder=" Link instagram">
                                        </div>



                                        {{-- <div class="form-group mb-2 col-lg-12">
                                            <label for="carePhone" class="form-label">Hotline </label>
                                            <input value="{{ $config->carePhone ?? '' }}" id="carePhone"
                                                name="carePhone"class="form-control" type="text"
                                                placeholder="Hotline">
                                        </div> --}}

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group col-lg-12 mb-2">
                                            <label for="image" class="form-label">Logo <span
                                                    class="text-danger">*</span></label>
                                            <img class="img-fluid img-thumbnail w-100" id="show_logo"
                                                style="cursor: pointer;" src="{{ asset('storage/'.$config->logo ?? '') }}"
                                                alt="" onclick="document.getElementById('logo').click();">
                                            <input type="file" name="logo" id="logo"
                                                class="form-control d-none" accept="image/*"
                                                onchange="previewImage(event, 'show_logo')">
                                        </div>

                                        <div class="form-group col-lg-12 mb-2">
                                            <label for="icon" class="form-label">Icon <span
                                                    class="text-danger">*</span></label>
                                            <img class="img-fluid img-thumbnail w-100" id="show_icon"
                                                style="cursor: pointer;" src="{{ asset('storage/'.$config->icon ?? '') }}"
                                                alt="" onclick="document.getElementById('icon').click();">
                                            <input type="file" name="icon" id="icon"
                                                class="form-control d-none" accept="image/*"
                                                onchange="previewImage(event, 'show_icon')">
                                        </div>

                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="image" class="form-label">Slider</label>
                                        <div class="input-images pb-3"></div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

    <?php

    $slider = json_decode($config->slider, true);
    ?>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/js/fileinput.min.js"></script>

    <script src="{{ asset('backend/assets/js/image-uploader.min.js') }}"></script>

    <script>
        const BASE_URL = "{{ url('/') }}";
    </script>

    <script>
        var preloadedImages = [
            @foreach ($slider as $img)
                {
                    id: '{{ $loop->index + 1 }}', // ID tùy chọn, có thể lấy ID ảnh nếu có
                    src: '{{ asset('storage/' . $img) }}'
                },
            @endforeach
        ];
    </script>
    <script>
        $('.input-images').imageUploader({
            preloaded: preloadedImages,
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
        .image-uploader .uploaded .uploaded-image {
            width: calc(30.666667%);
            padding-bottom: calc(18.666667%);
        }
    </style>
@endpush
