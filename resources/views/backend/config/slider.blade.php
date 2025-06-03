@extends('backend.layouts.master')
@section('title', 'Thêm mới sản phẩm')

@section('content')
    <div class="card">
        <div class="card-header  d-flex justify-content-between align-items-center">
            <h4 class="card-title">Cấu hình Slider</h4>
            <button type="button" class="btn btn-success btn-sm me-2" onclick="addRow()">
                Thêm slider
            </button>
        </div>
    </div>

    <form action="{{ route('admin.config.slider.update') }}" method="post" enctype="multipart/form-data" id="myForm">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="row-container">
                            @if (count($sliders) > 0)
                                @foreach ($sliders as $slider)
                                    <div class="col-md-12 row align-items-center slider-row">
                                        <div class="form-group col-lg-3 text-center">
                                            <img class="img-fluid img-thumbnail w-70 preview-image" style="cursor: pointer;"
                                                src="{{ asset('storage/' . $slider->image ?? 'backend/assets/img/image-default.jpg') }}"
                                                alt="" onclick="this.nextElementSibling.click();">
                                            <input type="file" name="image[]" class="form-control d-none image-input"
                                                accept="image/*" onchange="previewImageNew(event)">
                                            <input type="hidden" name="old_image[]" value="{{ $slider->image }}">
                                            <input type="hidden" name="slider_id[]" value="{{ $slider->id ?? '' }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <input value="{{ $slider->alt }}" name="alt[]" class="form-control"
                                                type="text" placeholder="Alt">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <input value="{{ $slider->link }}" name="link[]" class="form-control"
                                                type="text" placeholder="Link">
                                        </div>
                                        <div class="form-group col-lg-1 d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- Nếu chưa có slider nào, tạo 1 row trống --}}
                                <div class="col-md-12 row align-items-center slider-row">
                                    <div class="form-group col-lg-3 text-center">
                                        <img class="img-fluid img-thumbnail w-70 preview-image" style="cursor: pointer;"
                                            src="{{ asset('backend/assets/img/image-default.jpg') }}" alt=""
                                            onclick="this.nextElementSibling.click();">
                                        <input type="file" name="image[]" class="form-control d-none image-input"
                                            accept="image/*" onchange="previewImageNew(event)">
                                        <input type="hidden" name="old_image[]" value="">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <input value="" name="alt[]" class="form-control" type="text"
                                            placeholder="Alt">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <input value="" name="link[]" class="form-control" type="text"
                                            placeholder="Link">
                                    </div>
                                    <div class="form-group col-lg-1 d-flex justify-content-center align-items-center">
                                        {{-- <button type="button" class="btn btn-light btn-sm drag-handle me-2">
                                            <i class="fas fa-bars"></i>
                                        </button> --}}
                                        <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
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

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

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

        //     $(document).ready(function() {
        //         $("#row-container").sortable({
        //             handle: ".drag-handle",
        //             axis: "y", // chỉ kéo theo chiều dọc
        //             update: function(event, ui) {
        //                 console.log("Sortable updated — gọi updateOrder()");
        //                 updateOrder();
        //             }
        //         });
        //     });

        //     // Cập nhật thứ tự vào hidden input order[]
        //     function updateOrder() {
        //         console.log("updateOrder() đang chạy...");
        //         $('#row-container .slider-row').each(function(index) {
        //             // index = 0,1,2... nên +1 để bắt đầu từ 1
        //             $(this).find('input[name="order[]"]').val(index + 1);
        //             console.log("Row", index, "set order =", index + 1);
        //         });
        //     }
        //
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/image-uploader.min.css') }}">

    <style>
        .image-uploader .uploaded .uploaded-image {
            width: calc(30.666667%);
            padding-bottom: calc(18.666667%);
        }

        .preview-image {
            width: 200px;
            height: 100px;
            object-fit: contain;
            cursor: pointer;
        }
    </style>
@endpush
