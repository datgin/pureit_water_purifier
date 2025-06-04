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
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.products.index') }}" class="mb-0 d-inline-block lh-1 text-uppercase">
                        Sản phẩm
                    </a>
                </li>
                <li class="breadcrumb-item active text-uppercase" aria-current="page">
                    @if (!empty($product))
                        cập nhật sản phẩm - {{ $product->name }}
                    @else
                        thêm mới sản phẩm
                    @endif
                </li>
            </ol>
        </nav>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" id="myForm">

        <ul class="nav nav-tabs" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button"
                    role="tab" aria-controls="info" aria-selected="true">
                    Thông tin sản phẩm
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cross-sell-tab" data-bs-toggle="tab" data-bs-target="#cross-sell"
                    type="button" role="tab" aria-controls="cross-sell" aria-selected="false">
                    Sản phẩm bán chéo
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="features-tab" data-bs-toggle="tab" data-bs-target="#features" type="button"
                    role="tab" aria-controls="features" aria-selected="false">
                    Tính năng, đặc điểm
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button"
                    role="tab" aria-controls="specs" aria-selected="false">
                    Thông số kỹ thuật
                </button>
            </li>
        </ul>

        <div class="row">
            <div class="col-lg-9">
                <div class="tab-content" id="productTabsContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="mb-3 col-lg-12">
                                        <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Nhập tên sản phẩm" value="{{ optional($product)->name }}">
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <label for="slug" class="form-label fw-bold">Slug</label>
                                        <input type="text" id="slug" name="slug" class="form-control"
                                            placeholder="Nhập slug" value="{{ optional($product)->slug }}">
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <label for="description" class="form-label fw-bold">Mô tả sản phẩm</label>
                                        <textarea id="description" name="description" class="form-control ckeditor" placeholder="Mô tả sản phẩm">{!! optional($product)->description !!}</textarea>
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <label for="price" class="form-label fw-bold">Giá gốc</label>
                                        <input type="text" name="price" class="form-control format-currency"
                                            id="price" placeholder="Giá bán sản phẩm"
                                            value="{{ formatPrice($product->price ?? 0) }}">
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <label for="discount_value" class="form-label ">Giá khuyến
                                            mãi</label>
                                        <input value="{{ formatPrice($product->discount_value ?? 0) }}" type="text"
                                            id="discount_value" class="form-control format-currency"
                                            placeholder="Nhập giá khuyến mãi" name="discount_value">
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <label for="start-date" class="form-label">Ngày bắt đầu:</label>
                                        <input type="text" class="form-control datepicker" name="discount_start_date"
                                            id="discount_start_date"
                                            value="{{ !empty($product) && $product->discount_start_date ? $product->discount_start_date->format('d/m/Y') : '' }}">
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <label for="end-date" class="form-label">Ngày kết thúc:</label>
                                        <input type="text" class="form-control datepicker" name="discount_end_date"
                                            id="discount_end_date"
                                            value="{{ !empty($product) && $product->discount_end_date ? $product->discount_end_date->format('d/m/Y') : '' }}">
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="image" class="form-label">Album ảnh</label>
                                        <div class="input-images pb-3"></div>
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
                                            {{ $product->seo_title ?? '-' }}
                                        </h4>

                                        <div class="page-url-seo">
                                            <p>
                                                {{ config('app.url') }}/<span>{{ $product->slug ?? '' }}</span>
                                            </p>
                                        </div>

                                        <div>
                                            <span style="color: #70757a;">
                                                {{ now()->format('d/m/Y') }} - </span>
                                            <span class="page-description-seo" style="color: #70757a;">
                                                {{ $product->seo_title ?? '' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="seo-edit-section">
                                    <hr class="my-4">
                                    <div class="row">
                                        <div class="mb-3 position-relative col-lg-12">
                                            <label for="seo_title" class="form-label">Tiêu đề seo</label>
                                            <input type="text" placeholder="Tiêu đề seo" class="form-control"
                                                name="seo_title" id="seo_title" maxlength="250"
                                                value="{{ optional($product)->seo_title }}">
                                        </div>
                                        <div class="mb-3 position-relative col-lg-12">
                                            <label for="seo_description" class="form-label">Mô tả seo</label>
                                            <textarea placeholder="Mô tả seo" class="form-control" name="seo_description" id="seo_description" rows="3"
                                                maxlength="400">{{ optional($product)->seo_description }}</textarea>
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

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title">Điểm SEO tổng thể</h4>
                                    <span class="badge {{ $badgeClass }} fs-6" id="seo-score-badge">
                                        {{ $seoScoreValue }}/100
                                    </span>
                                </div>
                                <div class="progress mb-3" style="height: 10px;">
                                    <div class="progress-bar {{ $seoColor }}" id="seo-score-progress"
                                        role="progressbar" style="width: {{ $seoScoreValue }}%;"
                                        aria-valuenow="{{ $seoScoreValue }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- List SEO --}}
                        <div class="" id="result">
                            @include('backend.products.seo')
                        </div>
                    </div>

                    <div class="tab-pane fade" id="cross-sell" role="tabpanel" aria-labelledby="cross-sell-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 position-relative">
                                    <input type="text" class="form-control" id="crossSellInput"
                                        placeholder="Tìm kiếm sản phẩm..." autocomplete="off">
                                    <div id="crossSellListPopup"
                                        class="border rounded p-3 position-absolute bg-white shadow w-100"
                                        style="display:none; max-height: 300px; z-index: 1000; top: 100%;">
                                        <div id="crossSellList" class="row g-2">
                                            <!-- Products will be loaded here -->
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <button class="btn btn-sm btn-outline-primary" id="prevPage" disabled>Trang
                                                trước</button>
                                            <span class="align-self-center" id="pageInfo">Trang 1/1</span>
                                            <button class="btn btn-sm btn-outline-primary" id="nextPage" disabled>Trang
                                                sau</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">Sản phẩm đã chọn</div>
                            <div class="card-body">
                                <div id="selectedCrossSell" class="d-flex flex-wrap gap-2">
                                    @foreach ($crossSellProducts as $item)
                                        <div class="selected-product" data-id="{{ $item->id }}">
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                            <span>{{ $item->name }}</span>
                                            <span class="remove-btn">&times;</span>
                                            <input name="cross_sell[]" type="hidden" value="{{ $item->id }}" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Tính năng sản phẩm</h5>
                                    <button type="button" class="btn btn-primary btn-sm" id="addFeature">
                                        <i class="fas fa-plus"></i> Thêm tính năng
                                    </button>
                                </div>

                                <div id="featuresContainer">
                                    @if (!empty($product) && !empty($product->features))
                                        @foreach ($product->features as $index => $feature)
                                            <div class="feature-item border rounded mt-3">
                                                <div class="d-flex justify-content-between align-items-center mb-2 p-3">
                                                    <h6 class="mb-0">Tính năng #{{ $index + 1 }}</h6>
                                                    <button type="button" class="btn btn-danger btn-sm remove-feature">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Tiêu đề</label>
                                                            <input type="text"
                                                                name="features[{{ $index }}][title]"
                                                                class="form-control" value="{{ $feature['title'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nội dung</label>
                                                            <textarea name="features[{{ $index }}][content]" class="form-control">{{ $feature['content'] }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                        <div class="card">
                            <div class="card-body">
                                <label for="" class="form-label">Chọn thông số</label>
                                <select id="attribute_id" class="form-select select2" multiple>
                                    @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute['id'] }}"
                                            data-values='@json($attribute['values'])'>
                                            {{ $attribute['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row" id="attribute-values-container">
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

                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-light fs-6 border">
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
                            <option value="1" @selected($product->status ?? '')>Xuất bản </option>
                            <option value="0" @selected(optional($product)->status === false)>Chưa xuất bản</option>
                        </select>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <label class="mb-2 fw-semibold">Danh mục <span class="text-danger">*</span></label>
                        <select class="form-select select2" name="category_id" id="category_id">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach ($category as $id => $name)
                                <option value="{{ $id }}" @selected($id === (!empty($product) && $product->category ? $product->category->id : ''))>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">Trạng thái
                        </h4>
                    </div>
                    <div class="card-body">
                        <select name="status" class="form-select form-control" id="status">
                            <option value="1" @selected($product->status ?? '')>Xuất bản </option>
                            <option value="0" @selected(optional($product)->status === false)>Chưa xuất bản</option>
                        </select>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold">Là sản phẩm nổi bật?</h4>
                    </div>
                    <div class="card-body">
                        <label class="switch">
                            <input name="is_featured" type="checkbox" value="1" @checked(!empty($product) && $product->is_featured)>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">Từ khóa seo
                        </h4>
                    </div>
                    <div class="card-body">
                        <input name="seo_keywords" id="seo_keywords"
                            value="{{ !empty($product) && $product->seo_keywords ? implode(',', $product->seo_keywords) : '' }}">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">Từ khóa seo
                        </h4>
                    </div>
                    <div class="card-body">
                        <img class="img-thumbnail" id="show_image"
                            style="cursor: pointer; width: 100%; height: auto; object-fit: cover;"
                            src="{{ $product->image ?? '' }}" alt=""
                            onclick="document.getElementById('image').click();">

                        <input type="file" name="image" id="image" class="form-control d-none"
                            accept="image/*" onchange="previewImage(event, 'show_image')">
                    </div>
                </div>




                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">hướng dẫn sử dụng (vi)
                        </h4>
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="manual_vi" id="manual_vi"
                            accept="application/pdf">

                        @if (!empty($product->manual_vi) && Storage::disk('public')->exists($product->manual_vi))
                            <a href="{{ showImage($product->manual_vi) }}" target="_blank"
                                class="btn btn-sm btn-primary mt-2 w-100">
                                Xem PDF (VI)
                            </a>
                        @endif

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">hướng dẫn sử dụng (en)
                        </h4>
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="manual_en" id="manual_en"
                            accept="application/pdf">

                        @if (!empty($product->manual_en) && Storage::disk('public')->exists($product->manual_en))
                            <a href="{{ showImage($product->manual_en) }}" target="_blank"
                                class="btn btn-sm btn-primary mt-2 w-100">
                                Xem PDF (EN)
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

    <script src="{{ asset('backend/assets/js/image-uploader.min.js') }}"></script>

    <script src="{{ asset('library/ckeditor/ckeditor.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

    <script>
        const selectedAttributeValues = @json($selectedAttributeValues);

        function renderAttributeValues() {
            const $select = $('#attribute_id');
            const selectedOptions = $select.find(':selected');
            const $container = $('#attribute-values-container');

            $container.html('');

            selectedOptions.each(function() {
                const attrId = $(this).val();
                const attrName = $(this).text();
                const valuesData = $(this).data('values');

                if (!valuesData) return;

                let values;
                try {
                    values = typeof valuesData === 'string' ? JSON.parse(valuesData) : valuesData;
                } catch (e) {
                    console.error('Invalid JSON in data-values:', e, valuesData);
                    return;
                }

                // Tạo HTML với các option được chọn sẵn nếu có trong selectedAttributeValues
                let html = `
                    <div class="mb-3 col-lg-4">
                        <label for="attribute_value_${attrId}" class="form-label">Chọn giá trị cho <strong>${attrName}</strong></label>
                        <select name="attribute_values[${attrId}][]" id="attribute_value_${attrId}" class="form-select select2">
                            ${values.map(v => `
                                                                        <option value="${v.id}" ${selectedAttributeValues[attrId] && selectedAttributeValues[attrId].includes(v.id) ? 'selected' : ''}>
                                                                            ${v.value}
                                                                        </option>
                                                                    `).join('')}
                        </select>
                    </div>`;

                $container.append(html);
            });

            // Re-init Select2
            $('#attribute-values-container .select2').select2({
                placeholder: 'Chọn giá trị',
                width: '100%',
                allowClear: true
            });
        }


        $(document).ready(function() {
            autoGenerateSlug('#name', '#slug');

            $('#category_id').select2({
                placeholder: "Chọn danh mục",
                allowClear: true,
                width: '100%'
            });

            $('#attribute_id').select2({
                placeholder: 'Chọn thuộc tính',
                width: '100%',
                allowClear: true
            }).on('change', renderAttributeValues);

            const selectedAttrIds = Object.keys(selectedAttributeValues);
            $('#attribute_id').val(selectedAttrIds).trigger('change');

            renderAttributeValues();

            flatpickr(".datepicker", {
                dateFormat: "d/m/Y",
                locale: "vn",
                onReady: function(selectedDates, dateStr, instance) {
                    // Thêm nút clear
                    const clearButton = document.createElement("button");
                    clearButton.textContent = "Xóa";
                    clearButton.type = "button";
                    clearButton.className = "flatpickr-clear-button";
                    clearButton.addEventListener("click", function() {
                        instance.clear();
                    });
                    instance.calendarContainer.appendChild(clearButton);
                }
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

            // Thư viện ảnh
            $('.input-images').imageUploader({
                preloaded: @json($preloaded),
                imagesInputName: 'images',
                preloadedInputName: 'old',
                maxSize: 5 * 1024 * 1024,
                maxFiles: 15,
            });

            let featureCount =
                {{ !empty($product) && !empty($product->features) ? count($product->features) : 0 }};

            // Thêm tính năng mới
            $('#addFeature').click(function() {
                const template = `
                <div class="feature-item border rounded mt-3">
                    <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                        <h6 class="mb-0">Tính năng #${featureCount + 1}</h6>
                        <button type="button" class="btn btn-danger btn-sm remove-feature">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="text" name="features[${featureCount}][title]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="features[${featureCount}][content]" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            `;

                $('#featuresContainer').append(template);
                featureCount++;
            });

            // Xóa tính năng
            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.feature-item').remove();

                // Cập nhật lại chỉ số và name
                $('.feature-item').each(function(index) {
                    $(this).find('h6').text(`Tính năng #${index + 1}`);

                    $(this).find('input, textarea').each(function() {
                        const oldName = $(this).attr('name');
                        const newName = oldName.replace(/features\[\d+\]/,
                            `features[${index}]`);
                        $(this).attr('name', newName);
                    });
                });

                // Cập nhật lại tổng count
                featureCount = $('.feature-item').length;
            });

            CKEDITOR.instances['description'].on('change', function() {
                clearTimeout(seoTimeout);
                seoTimeout = setTimeout(runSeoAnalysis, 500);
            });

            $('#myForm').on('submit', function(e) {
                e.preventDefault();

                // ✅ 2. Cập nhật dữ liệu từ CKEditor nếu có
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                // ✅ 3. Tạo FormData sau khi đã xử lý dữ liệu
                let formData = new FormData(this);

                // ✅ 1. Loại bỏ dấu chấm trong các input có class "format-currency"
                $('.format-currency').each(function() {
                    let name = $(this).attr('name');
                    let val = $(this).val();
                    if (val) {
                        let cleanVal = val.replace(/\./g, '');
                        formData.set(name, cleanVal);
                    }
                });

                let id = {{ isset($product) ? $product->id : 'null' }};
                let url = id ? `/admin/products/${id}` : `/admin/products`;

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
                        window.location.href = "/admin/products";
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        datgin.error(xhr.responseJSON?.message || 'Đã xảy ra lỗi.');
                    }
                });
            });

        });

        function runSeoAnalysis() {
            // const content = CKEDITOR.instances['content'].getData();

            // const rawKeywords = $('#keywords').val();
            // let keywords = [];
            // try {
            //     const parsed = JSON.parse(rawKeywords);
            //     if (Array.isArray(parsed)) {
            //         keywords = parsed.map(k => k.value?.trim()).filter(Boolean);
            //     }
            // } catch (e) {
            //     keywords = rawKeywords.split(',').map(k => k.trim());
            // }

            // const title_seo = $('#title_seo').val();
            // const hasKeyword = keywords.some(keyword => title_seo.toLowerCase().includes(keyword
            //     .toLowerCase()));
            // const description_seo = $('#description_seo').val();
            // const slug = $('#slug').val();
            // const description_short = $('#description_short').val();

            // const data = {
            //     content,
            //     keywords,
            //     title_seo,
            //     hasKeyword,
            //     description_seo,
            //     slug,
            //     description_short,
            //     _token: '{{ csrf_token() }}'
            // };

            // console.log('Gửi dữ liệu SEO:', data);

            // $.ajax({
            //     url: '',
            //     method: "POST",
            //     data: JSON.stringify(data),
            //     contentType: "application/json",
            //     headers: {
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     },
            //     success: function(response) {
            //         if (response.success) {

            //             $('#seo-score-badge').removeClass().addClass(
            //                 `badge ${response.badgeClass} fs-6`).text(response.seoScoreVal +
            //                 '/100');
            //             $('#seo-score-progress').removeClass().addClass(
            //                 `progress-bar ${response.seoColor}`).css('width', response
            //                 .seoScoreVal + '%')

            //             $('#result').html(response.html);
            //         }
            //         console.log('Phản hồi SEO:', response);
            //     },
            //     error: function(xhr) {
            //         console.error('Lỗi SEO:', xhr);
            //     }
            // });
        }

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

        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const slugLink = document.getElementById('slug-link');
    </script>

    {{-- Xử lí khi thêm mới bài viết --}}
    <script>
        let seoTimeout;

        $('#title_seo, #keywords, #description_seo, #slug, #description_short, #name').on('input', function() {
            clearTimeout(seoTimeout);
            seoTimeout = setTimeout(runSeoAnalysis, 500);
        });


        // @if (isset($blog))
        //     setTimeout(runSeoAnalysis, 500);
        // @endif
    </script>

    <script>
        $(document).ready(function() {
            let currentPage = 1;
            let totalPages = 1;
            let searchTimeout;
            let selectedProducts = new Set(@json($product->cross_sell ?? []));
            let apiCalled = false;

            console.log(selectedProducts);


            // Function to render product item
            function renderProductItem(product) {
                return `
                    <div class="col-12">
                        <div class="product-item" data-id="${product.id}">
                            <div class="d-flex align-items-center gap-2">
                                <img src="${product.image}" alt="${product.name}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-0">${product.name}</h6>
                                    <small class="text-muted">${product.price}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Function to render selected product
            function renderSelectedProduct(product) {
                return `
                    <div class="selected-product" data-id="${product.id}">
                        <img src="${product.image}" alt="${product.name}" style="width: 40px; height: 40px; object-fit: cover;">
                        <span>${product.name}</span>
                        <span class="remove-btn">&times;</span>
                        <input name="cross_sell[]" type="hidden" value="${product.id}"/>
                    </div>
                `;
            }

            // Function to fetch products
            function fetchProducts(page = 1, search = '') {
                if (!apiCalled) {
                    $.ajax({
                        url: '{{ route('admin.products.search') }}',
                        method: 'GET',
                        data: {
                            page: page,
                            search: search,
                            productId: '{{ optional($product)->id }}'
                        },
                        success: function(response) {
                            apiCalled = true;
                            totalPages = response.last_page;
                            currentPage = response.current_page;

                            // Update pagination buttons
                            $('#prevPage').prop('disabled', currentPage === 1);
                            $('#nextPage').prop('disabled', currentPage === totalPages);
                            $('#pageInfo').text(`Trang ${currentPage}/${totalPages}`);

                            // Render products
                            const productsHtml = response.data.map(product => renderProductItem(
                                product)).join('');
                            $('#crossSellList').html(productsHtml);
                        },
                        error: function(xhr) {
                            console.error('Error fetching products:', xhr);
                        }
                    });
                }
            }

            // Handle input focus
            $('#crossSellInput').on('focus', function() {
                if (!apiCalled) {
                    fetchProducts();
                }
                $('#crossSellListPopup').show();
            });

            // Handle input search
            $('#crossSellInput').on('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    apiCalled = false;
                    fetchProducts(1, $(this).val());
                }, 300);
            });

            // Handle pagination
            $('#prevPage').on('click', function() {
                if (currentPage > 1) {
                    fetchProducts(currentPage - 1, $('#crossSellInput').val());
                }
            });

            $('#nextPage').on('click', function() {
                if (currentPage < totalPages) {
                    fetchProducts(currentPage + 1, $('#crossSellInput').val());
                }
            });

            // Handle product selection
            $(document).on('click', '.product-item', function() {
                const productId = String($(this).data('id'));

                const product = {
                    id: productId,
                    name: $(this).find('h6').text(),
                    image: $(this).find('img').attr('src')
                };

                if (!selectedProducts.has(productId)) {
                    selectedProducts.add(productId);
                    $('#selectedCrossSell').append(renderSelectedProduct(product));
                }
            });

            // Handle product removal
            $(document).on('click', '.remove-btn', function() {
                const productId = $(this).closest('.selected-product').data('id');
                selectedProducts.delete(String(productId));
                $(this).closest('.selected-product').remove();
            });

            // Close popup when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#crossSellInput, #crossSellListPopup').length) {
                    $('#crossSellListPopup').hide();
                }
            });
        });
    </script>
@endpush

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/image-uploader.min.css') }}">

    <style>
        code:hover {
            cursor: pointer;
        }

        .product-item {
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 8px;
        }

        .product-item:hover {
            background-color: #f8f9fa;
            border-color: #0d6efd;
        }

        .selected-product {
            background-color: #e9ecef;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .selected-product .remove-btn {
            color: #dc3545;
            cursor: pointer;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .selected-product .remove-btn:hover {
            background-color: #dc3545;
            color: white;
        }

        #crossSellListPopup {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
{{-- admin.products.seo.analysis.live --}}
