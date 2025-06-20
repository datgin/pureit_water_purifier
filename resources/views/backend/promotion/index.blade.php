@extends('backend.layouts.master')
@section('title', 'Khuyến mãi')

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
                    khuyến mãi
                </li>
            </ol>
        </nav>
    </div>

    <form action="{{ route('admin.promotions.store') }}" method="post" enctype="multipart/form-data" id="myForm">
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
                                <label for="title" class="form-label fw-bold">Tiêu đề <span
                                        class="text-danger">*</span></label>
                                <input value="{{ $promotion->title ?? '' }}" id="title"
                                    name="title"class="form-control" type="text"
                                    placeholder="VD: Khuyến mãi tháng 03/2025">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div id="offers-list">
                                <label class="form-label fw-bold">Quà đi kèm</label>
                                @foreach (old('offers', $promotion->offers ?? ['']) as $offer)
                                    <div class="input-group mb-2">
                                        <input type="text" name="offers[]" class="form-control"
                                            value="{{ $offer }}" placeholder="Nhập phần quà">
                                        <button type="button" class="btn btn-danger btn-sm remove-item">–</button>
                                    </div>
                                @endforeach
                                <button type="button" class="btn btn-primary btn-sm mt-2 mb-3 add-item"
                                    data-target="offers-list">+ Thêm phần quà</button>
                            </div>

                            <div id="commitment-list">
                                <label class="form-label fw-bold">Cam kết</label>
                                @foreach (old('commitments', $promotion->commitments ?? ['']) as $commitment)
                                    <div class="input-group mb-2">
                                        <input type="text" name="commitments[]" class="form-control"
                                            value="{{ $commitment }}" placeholder="Nhập cam kết">
                                        <button type="button" class="btn btn-danger btn-sm remove-item">–</button>
                                    </div>
                                @endforeach
                                <button type="button" class="btn btn-primary btn-sm mt-2 add-item"
                                    data-target="commitment-list">+ Thêm cam kết</button>
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
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="start_date" class="form-label fw-bold">Ngày bắt đầu</label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                value="{{ old('start_date', isset($promotion) && $promotion->start_date ? $promotion->start_date->format('Y-m-d') : '') }}">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="end_date" class="form-label fw-bold">Ngày kết thúc</label>
                            <input type="date" name="end_date" id="end_date" class="form-control"
                                value="{{ old('end_date', isset($promotion) && $promotion->end_date ? $promotion->end_date->format('Y-m-d') : '') }}"
">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Nút thêm
            document.querySelectorAll('.add-item').forEach(function(button) {
                button.addEventListener('click', function() {
                    const targetId = this.dataset.target;
                    const container = document.getElementById(targetId);

                    // Tìm tên name cần chèn (offers[] hoặc commitments[])
                    const name = container.querySelector('input')?.name || 'item[]';

                    const wrapper = document.createElement('div');
                    wrapper.className = 'input-group mb-2';
                    wrapper.innerHTML = `
                    <input type="text" name="${name}" class="form-control" placeholder="Nhập nội dung">
                    <button type="button" class="btn btn-danger btn-sm remove-item">–</button>
                `;
                    container.insertBefore(wrapper, this);
                });
            });

            // Nút xoá
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-item')) {
                    e.target.closest('.input-group').remove();
                }
            });
        });
    </script>
@endpush

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css" rel="stylesheet">
@endpush
