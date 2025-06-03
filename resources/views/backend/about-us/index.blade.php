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
                    Về chúng tôi
                </li>
            </ol>
        </nav>
    </div>

    <form action="{{ route('admin.aboutus.store') }}" method="post" enctype="multipart/form-data" id="myForm">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="row-container">
                            @if (count($aboutus) > 0)
                                @foreach ($aboutus as $aboutUs)
                                    <div class="col-md-12 row align-items-center slider-row">
                                        <div class="form-group col-lg-3 text-center">
                                            <img class="img-fluid img-thumbnail w-100 preview-image" style="height:150px;"
                                                style="cursor: pointer;"
                                                src="{{ !empty($aboutUs->image) ? asset('storage/' . $aboutUs->image) : asset('backend/assets/img/image-default.jpg') }}
                                                "
                                                alt="" onclick="this.nextElementSibling.click();">
                                            <input type="file" name="image[]" class="form-control d-none image-input"
                                                accept="image/*" onchange="previewImageNew(event)">
                                            <input type="hidden" name="old_image[]" value="{{ $aboutUs->image }}">
                                            <input type="hidden" name="aboutUs_id[]" value="{{ $aboutUs->id ?? '' }}">
                                        </div>
                                        <div class="col-md-8 row">
                                            <div class="form-group col-lg-12">
                                                <input value="{{ $aboutUs->title }}" name="title[]" class="form-control"
                                                    type="text" placeholder="Tiêu đề">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <textarea name="description[]" class="form-control" placeholder="Nội dung">{{ $aboutUs->description }}</textarea>

                                            </div>
                                        </div>
                                        <div class="form-group col-lg-1 d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- <div class="col-md-12 row align-items-center slider-row">
                                    <div class="form-group col-lg-3 text-center">
                                        <img class="img-fluid img-thumbnail w-100 preview-image" style="cursor: pointer;"
                                            src="{{ showImage('') }}" alt=""
                                            onclick="this.nextElementSibling.click();">
                                        <input type="file" name="image[]" class="form-control d-none image-input"
                                            accept="image/*" onchange="previewImageNew(event)">
                                        <input type="hidden" name="old_image[]" value="">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <input value="" name="title[]" class="form-control" type="text"
                                            placeholder="Tiêu đề">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <textarea name="description[]" class="form-control" placeholder="Nội dung"></textarea>
                                    </div>
                                    <div class="form-group col-lg-1 d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div> --}}
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center mt-3">
                            <div class="text-center mt-4">
                                <a class="btn btn-success btn-sm" onclick="addRow()">
                                    <i class="fas fa-plus"></i> Thêm mới
                                </a>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save"></i> Lưu thay đổi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection

@push('scripts')
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            const rows = document.querySelectorAll('#row-container > .slider-row');
            let isValid = true;

            rows.forEach(row => {
                const fileInput = row.querySelector('.image-input');
                const oldImageInput = row.querySelector('input[name="old_image[]"]');
                // Nếu cả file mới không có và ảnh cũ cũng rỗng => lỗi
                if ((!fileInput.files || fileInput.files.length === 0) && (!oldImageInput || oldImageInput
                        .value.trim() === '')) {
                    isValid = false;
                }
            });

            if (!isValid) {
                event.preventDefault();
                alert("Vui lòng chọn ảnh cho tất cả các hàng hoặc giữ lại ảnh cũ!");
            }
        });

        function previewImageNew(event) {
            const input = event.target;
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = input.closest('.form-group').querySelector('.preview-image');
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        function addRow() {
            const container = document.getElementById('row-container');

            const firstRow = container.querySelector('.slider-row');
            if (!firstRow) return;

            const newRow = firstRow.cloneNode(true);

            newRow.querySelectorAll('input').forEach(input => {
                if (input.type === 'file') {
                    input.value = null;
                } else if (input.type === 'hidden') {
                    input.value = '';
                } else {
                    input.value = '';
                }
            });
            newRow.querySelectorAll('textarea').forEach(textarea => {
                textarea.value = '';
            });
            const preview = newRow.querySelector('.preview-image');
            preview.src = "{{ asset('backend/assets/img/image-default.jpg') }}";
            container.appendChild(newRow);
        }


        function removeRow(button) {
            const row = button.closest('.slider-row');
            const container = document.getElementById('row-container');
            if (container.querySelectorAll('.slider-row').length > 1) {
                row.remove();
            } else {
                alert("Phải có ít nhất 1 form!");
            }
        }
    </script>
@endpush
