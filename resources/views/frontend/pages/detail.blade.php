@extends('frontend.master')

@section('og:image', content: showImage($images[0] ?? ''))
@section('seo_keywords', !empty($product->seo_keywords) && is_array($product->seo_keywords) ? implode(',',
    $product->seo_keywords) : $product->seo_keywords)
@section('title', $product->name)
@section('seo_title', $product->seo_title)
@section('seo_description', $product->seo_description)

@section('content')
    <!-- Product Detail Top Section -->
    <section class="product-detail-top-section container px-0">
        <!-- Discount Badge (positioned absolutely) -->

        <div class="row g-0 container mx-auto">
            <!-- Left Column: Image & Text -->
            <div class="col-md-6 product-image-col px-0">
                <div class="image-container position-relative">
                    <!-- Main Swiper -->
                    <div class="swiper productMainSwiper mb-3">
                        <div class="swiper-wrapper">
                            @foreach ($images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image }}" class="img-fluid main" alt="{{ $product->name }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Thumbnail Swiper -->
                    <div class="swiper productThumbSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image }}" class="img-fluid thumbnail" alt="{{ $product->name }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Discount badge -->
                    @if (isOnSale($product))
                        <span
                            class="discount-badge-large position-absolute bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center">
                            {{ getDiscountPercent($product->price, $product->discount_value) }}%
                        </span>
                    @endif

                </div>
            </div>

            <!-- Right Column: Product Info -->
            <div class="col-md-6 product-info-col">
                <div class="product-info  p-md-3">
                    <h1 class="product-title mb-3">
                        {{ $product->name }}
                    </h1>
                    <div class="product-description mb-4 text-muted">
                        {!! $product->description !!}
                    </div>

                    <div class="product-price mb-4">
                        @if (isOnSale($product))
                            <span
                                class="original-price text-muted text-decoration-line-through me-2">{{ formatPrice($product->price) }}</span>
                            <span
                                class="discounted-price text-primary fs-4 fw-bold">{{ formatPrice($product->discount_value) }}</span>
                        @else
                            <span
                                class="discounted-price text-primary fs-4 fw-bold">{{ formatPrice($product->price) }}</span>
                        @endif

                    </div>

                    <a href="#" class="btn btn-primary rounded-pill d-inline-flex align-items-center">
                        Mua ngay
                        <span
                            class="ms-2 d-inline-flex align-items-center justify-content-center text-white bg-primary rounded-circle"
                            style="width: 24px; height: 24px">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if (count($product->features ?? []) > 0)
        <!-- Features Section -->
        <section class="features-section container bg-light p-4 rounded">
            <h2 class="text-primary mb-4">Tính năng, đặc điểm</h2>

            <div class="row">
                @foreach ($product->features as $feature)
                    <div class="col-md-4">
                        <h5 class="text-primary">{{ $feature['title'] }}</h5>
                        <p class="text-muted">
                            {{ $feature['content'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </section>
    @endif


    @if ($attributeValues->isNotEmpty())
        <!-- Technical Specs Section -->
        <section class="specs-section container mt-5 mb-5 px-0 mobile-indent">
            <h2 class="text-primary mb-4">Thông số kỹ thuật</h2>
            <table class="table table-bordered">
                <tbody>
                    @foreach ($attributeValues as $attrValue)
                        <tr>
                            <th scope="row">{{ $attrValue->attribute->name }}:</th>
                            <td>{{ $attrValue->value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endif



    <!-- Recommended Products Section -->
    <section class="recommended-products container mt-5 mb-5">
        <h2 class="text-primary mb-4 text-center">Có thể bạn quan tâm</h2>
        <div class="swiper recommendedProductsSwiper">
            <div class="swiper-wrapper">
                <!-- Recommended Product Card 1 -->
                @foreach ($relatedProducts as $item)
                    <div class="swiper-slide">
                        <x-product-item :product="$item" />
                    </div>
                @endforeach
            </div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Product Usage Instructions Section -->


    @if ($product->manual_vi || $product->manual_en)
        <section class="product-instructions-section py-5">
            <div class="container text-center">
                <h2 class="text-primary mb-4">Hướng dẫn sử dụng sản phẩm</h2>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    @if ($product->manual_vi)
                        <a href="{{ showImage($product->manual_vi) }}" download
                            class="btn btn-primary rounded-pill px-4 py-2 d-inline-flex align-items-center">
                            Tải PDF VN <i class="bi bi-download ms-2"></i>
                        </a>
                    @endif

                    @if ($product->manual_en)
                        <a href="{{ showImage($product->manual_en) }}" download
                            class="btn btn-primary rounded-pill px-4 py-2 d-inline-flex align-items-center">
                            Tải PDF EN <i class="bi bi-download ms-2"></i>
                        </a>
                    @endif

                </div>
            </div>
        </section>
    @endif
@endsection
