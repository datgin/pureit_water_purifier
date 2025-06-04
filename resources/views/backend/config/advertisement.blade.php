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

    <form action="{{ route('admin.advertisement.store') }}" method="post" enctype="multipart/form-data" id="myForm">
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
                                <label for="quantity" class="form-label fw-bold">Số khách hàng dùng</label>
                                <input value="{{ $advertisement->quantity ?? '' }}" id="quantity" name="quantity"class="form-control"
                                    type="text" placeholder="Nhập ">
                            </div>

                            <div class=" mb-3 col-lg-12">
                                <label for="title" class="form-label">Tiêu đề </label>
                                <input value="{{ $advertisement->title ?? '' }}" id="title" name="title"class="form-control"
                                    type="text" placeholder="Nhập tiêu đề">
                            </div>

                            <div class=" mb-3">
                                <label for="description" class="form-label">Mô tả</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control ckeditor"
                                    placeholder="Mô tả seo">{{ $advertisement->description ?? '' }}</textarea>
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
    </script>
@endpush

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        rel="stylesheet">
@endpush
