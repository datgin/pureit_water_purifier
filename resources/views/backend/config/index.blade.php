@extends('backend.layouts.master')
@section('title', 'Thêm mới sản phẩm')

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
                    cấu hình chung
                </li>
            </ol>
        </nav>
    </div>

    <form action="{{ route('admin.config.update') }}" method="post" enctype="multipart/form-data" id="myForm">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label for="title" class="form-label fw-bold">Tiêu đề</label>
                                <input value="{{ $config->title }}" id="title" name="title"class="form-control"
                                    type="text" placeholder="Nhập tiêu đề">
                            </div>

                            <div class="mb-3 col-lg-12">
                                <label for="company" class="form-label fw-bold">Tên công ty</label>
                                <input value="{{ $config->company }}" id="company" name="company"class="form-control"
                                    type="text" placeholder="Nhập tên công ty">
                            </div>

                            <div class=" mb-3 col-lg-12">
                                <label for="email" class="form-label">Email </label>
                                <input value="{{ $config->email }}" id="email" name="email"class="form-control"
                                    type="text" placeholder="Nhập email">
                            </div>

                            <div id="addresses-wrapper" class="mb-3 col-lg-12">
                                <label for="address" class="form-label">Địa chỉ</label>

                                @php
                                    $addresses = is_array(json_decode($config->address, true))
                                        ? json_decode($config->address, true)
                                        : [$config->address];
                                @endphp

                                @foreach ($addresses as $address)
                                    <input type="text" name="address[]" class="form-control mb-2"
                                        placeholder="Nhập địa chỉ" value="{{ $address }}">
                                @endforeach

                                <button type="button" class="btn btn-danger btn-sm mt-2" onclick="addAddressInput()">
                                    + Thêm địa chỉ
                                </button>
                            </div>

                            <div class=" mb-3 col-lg-4">
                                <label for="hotline" class="form-label">Hotline</label>
                                <input value="{{ $config->hotline }}" id="hotline" name="hotline"class="form-control"
                                    type="text" placeholder="Di động">
                            </div>
                            <div class=" mb-3 col-lg-4">
                                <label for="hotline_kinhdoanh" class="form-label">Di động kinh doanh</label>
                                <input value="{{ $config->hotline_kinhdoanh }}" id="hotline_kinhdoanh"
                                    name="hotline_kinhdoanh"class="form-control" type="text"
                                    placeholder="Di động kinh doanh">
                            </div>
                            <div class=" mb-3 col-lg-4">
                                <label for="hotline_baotri" class="form-label">Di động bảo trì</label>
                                <input value="{{ $config->hotline_baotri }}" id="hotline_baotri"
                                    name="hotline_baotri"class="form-control" type="text" placeholder="Di động bảo trì">
                            </div>

                            <div class=" mb-3 col-lg-12">
                                <label for="footer" class="form-label">Chân trang </label>
                                <input value="{{ $config->footer }}" id="footer" name="footer"class="form-control"
                                    type="text" placeholder="Footer">
                            </div>

                            <div class=" mb-3">
                                <label for="seo_title" class="form-label">Tiêu đề seo</label>
                                <input type="text" value="{{ $config->seo_title }}" placeholder="Tiêu đề seo"
                                    id="seo_title" name="seo_title" class="form-control">
                            </div>

                            <div class=" mb-3">
                                <label for="seo_description" class="form-label">Mô tả seo</label>
                                <textarea name="seo_description" id="seo_description" cols="30" rows="4" class="form-control ckeditor"
                                    placeholder="Mô tả seo">{{ $config->seo_description }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ngân hàng</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class=" mb-3 col-lg-6">
                                <label for="stk" class="form-label">Tên tài khoản</label>
                                <input value="{{ $config->ttk }}" id="ttk" name="ttk"class="form-control"
                                    type="text" placeholder="Tên tài khoản">
                            </div>


                            <div class=" mb-3 col-lg-6">
                                <label for="stk" class="form-label">STK</label>
                                <input value="{{ $config->stk }}" id="stk" name="stk"class="form-control"
                                    type="text" placeholder="STK">
                            </div>

                            <div class=" mb-3 col-lg-6">
                                <label for="bank" class="form-label">Ngân hàng</label>
                                <input value="{{ $config->bank }}" id="bank" name="bank"class="form-control"
                                    type="text" placeholder="Ngân hàng">
                            </div>

                            <div class=" mb-3 col-lg-6">
                                <label for="branch" class="form-label">Chi nhánh</label>
                                <input value="{{ $config->branch }}" id="branch" name="branch"class="form-control"
                                    type="text" placeholder="Chi nhánh">
                            </div>

                            {{-- <div class=" mb-3 col-lg-12">
                                <label for="content" class="form-label">Nội dung</label>
                                <input value="{{ $setting->content }}" id="content" name="content" class="form-control" type="text" placeholder="Nội dung">
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liên kết mạng xã hội</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-lg-4">
                                <label for="facebook_link" class="form-label">Link Facebook</label>
                                <input value="{{ $config->facebook_link }}" id="facebook_link" name="facebook_link"
                                    class="form-control" type="text" placeholder="Link Facebook">
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="youtube_link" class="form-label">Link YouTube</label>
                                <input value="{{ $config->youtube_link }}" id="youtube_link" name="youtube_link"
                                    class="form-control" type="text" placeholder="Link YouTube">
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="ig_link" class="form-label">Link Instagram</label>
                                <input value="{{ $config->ig_link }}" id="ig_link" name="ig_link"
                                    class="form-control" type="text" placeholder="Link Instagram">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label for="script_head" class="form-label">Script Head</label>
                                <textarea id="script_head" name="script_head" class="form-control" rows="4"
                                    placeholder="Nội dung thẻ <head>">{{ $config->script_head }}</textarea>
                            </div>

                            <div class="mb-3 col-lg-12">
                                <label for="script_body" class="form-label">Script Body</label>
                                <textarea id="script_body" name="script_body" class="form-control" rows="4"
                                    placeholder="Nội dung trong thẻ <body>">{{ $config->script_body }}</textarea>
                            </div>

                            <div class="mb-3 col-lg-12">
                                <label for="script_footer" class="form-label">Script Footer</label>
                                <textarea id="script_footer" name="script_footer" class="form-control" rows="4"
                                    placeholder="Nội dung footer (trước </body>)">{{ $config->script_footer }}</textarea>
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

                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-light fs-6 border">
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
                        <h4 class="card-title">Logo</h4>
                    </div>

                    <div class="card-body">
                        <img class="img-fluid img-thumbnail w-100" id="show_logo" style="cursor: pointer;"
                            src="{{ showImage($setting->logo) }}" alt=""
                            onclick="document.getElementById('logo').click();">
                        <input type="file" name="logo" id="logo" class="form-control d-none"
                            accept="image/*" onchange="previewImage(event, 'show_logo')">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Icon</h4>
                    </div>

                    <div class="card-body">
                        <img class="img-fluid img-thumbnail w-100" id="show_icon" style="cursor: pointer;"
                            src="{{ showImage($setting->icon) }}" alt=""
                            onclick="document.getElementById('icon').click();">
                        <input type="file" name="icon" id="icon" class="form-control d-none"
                            accept="image/*" onchange="previewImage(event, 'show_icon')">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chứng chỉ</h4>
                    </div>

                    <div class="card-body">
                        <img class="img-fluid img-thumbnail w-100" id="show_certificate" style="cursor: pointer;"
                            src="{{ showImage($setting->certificate) }}" alt=""
                            onclick="document.getElementById('certificate').click();">
                        <input type="file" name="certificate" id="certificate" class="form-control d-none"
                            accept="image/*" onchange="previewImage(event, 'show_certificate')">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Từ khóa seo</h4>
                    </div>

                    <div class="card-body">
                        <input name="seo_keywords" id="seo_keywords"
                            value="{{ !empty($setting->seo_keywords) ? implode(',', $setting->seo_keywords) : '' }}">
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

    <script>
        $(function() {
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
        })

        function addAddressInput() {
            const wrapper = document.getElementById('addresses-wrapper');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'address[]';
            input.placeholder = 'Nhập địa chỉ';
            input.className = 'form-control mb-2';
            wrapper.insertBefore(input, wrapper.querySelector('button')); // chèn ngay trước nút
        }
    </script>
@endpush

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        rel="stylesheet">
@endpush
