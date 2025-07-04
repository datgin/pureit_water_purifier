@extends('frontend.master')

@section('og:image', content: showImage($images[0] ?? ''))
@section('seo_keywords', !empty($setting->seo_keywords) && is_array($setting->seo_keywords) ? implode(',',
    $setting->seo_keywords) : $setting->seo_keywords)
@section('title', $setting->title)
@section('seo_title', $setting->seo_title)
@section('seo_description', $setting->seo_description)



@section('content')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    @if (!empty($slider->link))
                        <a href="{{ $slider->link }}">
                            <img src="{{ asset('storage/' . $slider->image ?? 'backend/assets/img/image-default.jpg') }}"
                                class="w-100" alt="{{ $slider->alt }}" />
                        </a>
                    @else
                        <img src="{{ asset('storage/' . $slider->image ?? 'backend/assets/img/image-default.jpg') }}"
                            class="w-100" alt="{{ $slider->alt }}" />
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <section class="about-section py-5 text-center" id="gioi-thieu">
        <div class="container">
            <h5 class="text-uppercase fw-bold text-muted mb-2">Về chúng tôi</h5>
            <h2 class="fw-bold mb-5" data-aos="fade-up">Chúng tôi tự hào vì</h2>
            <div class="row about-wrapper">
                @foreach ($aboutUs as $about)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                        <div class="about-item px-3 rounded">
                            <div class="icon-wrapper mx-auto mb-3">
                                <img src="{{ showImage($about->image) }}" alt="Toàn cầu" />
                            </div>
                            <h5 class="fw-bold">{{ $about->title }}</h5>
                            <div class="underline mb-2"></div>
                            <p class="">
                                {{ $about->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5" data-aos="fade-up">
                <a href="#"
                    class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center btn-get-advice">
                    Tư vấn ngay
                    <span
                        class="ms-2 d-inline-flex align-items-center justify-content-center text-white bg-primary rounded-circle"
                        style="width: 24px; height: 24px">
                        <i class="bi bi-headset"></i>

                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- ✅ Product Section -->
    <section class="product-section py-5 text-center bg-light">
        <div class="container">
            <h5 class="text-uppercase fw-bold text-muted mb-2">Sản phẩm</h5>
            <h2 class="fw-bold mb-5">Các sản phẩm nổi bật</h2>

            <div class="row">
                {{-- @dd($products->count()) --}}
                @foreach ($products as $product)
                    <div class="col-lg-3 col-sm-6">
                        <x-product-item :product="$product" />
                    </div>
                @endforeach
            </div>

            <div class="mt-5 d-flex justify-content-center gap-4" data-aos="fade-up">
                <a href="#"
                    class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center btn-get-advice">
                    Tư vấn ngay
                    <span
                        class="ms-2 d-inline-flex align-items-center justify-content-center text-white bg-primary rounded-circle"
                        style="width: 24px; height: 24px">
                        <i class="bi bi-headset"></i>
                    </span>
                </a>

                <a href="{{ route('product', 'may-loc-nuoc') }}" class="btn btn-primary rounded-pill d-inline-flex align-items-center">
                    Xem thêm
                    <span
                        class="ms-2 d-inline-flex align-items-center justify-content-center text-white bg-white rounded-circle"
                        style="width: 24px; height: 24px">
                        <i class="bi bi-arrow-right text-dark"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <section class="product-section py-5 text-center bg-light">
        <div class="container">
            <h2 class="fw-bold mb-5">Các sản phẩm lõi lọc thay thế</h2>

            <div class="row">
                @foreach ($replacementFilters as $product)
                    <div class="col-lg-3 col-sm-6">
                        <x-product-item :product="$product" />
                    </div>
                @endforeach
            </div>

            <div class="mt-5 d-flex justify-content-center gap-4" data-aos="fade-up">
                <a href="#"
                    class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center btn-get-advice">
                    Tư vấn ngay
                    <span
                        class="ms-2 d-inline-flex align-items-center justify-content-center text-white bg-primary rounded-circle"
                        style="width: 24px; height: 24px">
                        <i class="bi bi-headset"></i>
                    </span>
                </a>

                <a href="{{ route('product', 'loi-loc-thay-the') }}" class="btn btn-primary rounded-pill d-inline-flex align-items-center">
                    Xem thêm
                    <span
                        class="ms-2 d-inline-flex align-items-center justify-content-center text-white bg-white rounded-circle"
                        style="width: 24px; height: 24px">
                        <i class="bi bi-arrow-right text-dark"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>


    <!-- ✅ Testimonial Section -->
    <section class="testimonial-section py-5 text-center">
        <div class="container">
            <h5 class="text-uppercase fw-bold text-muted mb-2">
                Nhận xét từ khách hàng
            </h5>
            <h2 class="fw-bold mb-5" data-aos="fade-up">
                Khách hàng nói gì về chúng tôi
            </h2>

            <div class="row align-items-center mb-4">
                <div class="col-md-5 text-md-start" data-aos="fade-right">
                    <h1 class="display-1 fw-bold text-primary">{{ $advertisement_front->quantity }}</h1>
                    <h4 class="fw-bold">
                        {{ $advertisement_front->title }}
                    </h4>
                    <p class="text-muted mt-3">
                        {{ $advertisement_front->description }}
                    </p>
                </div>
                <div class="col-md-7" data-aos="fade-left">
                    <div class="swiper testimonialSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($customerReview as $customer)
                                <!-- Testimonial Slide 1 -->
                                <div class="swiper-slide">
                                    <div
                                        class="testimonial-card position-relative d-md-flex p-4 rounded shadow-sm bg-white">
                                        <div class="testimonial-image-wrapper me-md-4 mb-3 mb-md-0">
                                            <img src="{{ showImage($customer->image) }}" alt="Customer"
                                                class="img-fluid rounded" style="max-width: 150px" />
                                            <h6 class="fw-bold mb-0 mt-2">{{ $customer->name }}</h6>
                                            <p class="text-muted mb-0">{{ $customer->address }}</p>
                                        </div>
                                        <div class="testimonial-content text-start">
                                            <p class="mb-3">
                                                {{ $customer->description }}
                                            </p>

                                            <i class="bi bi-quote text-primary" style="font-size: 3rem"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- Pagination -->
                        <div class="swiper-pagination testimonial-pagination"></div>
                    </div>
                </div>
            </div>

            <div class="mt-5" data-aos="fade-up">
                <a href="#"
                    class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center btn-get-advice">
                    Tư vấn ngay
                    <span
                        class="ms-2 d-inline-flex align-items-center justify-content-center text-white bg-primary rounded-circle"
                        style="width: 24px; height: 24px">
                        <i class="bi bi-headset"></i>

                    </span>
                </a>

            </div>
        </div>
    </section>

    <!-- ✅ Distributor and Certificate Section -->
    <section class="distributor-certificate-section bg-light">
        <div class="container distributor-certificate">
            {{-- <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold mb-4 text-primary">Nhà phân phối</h2>
                    <p>Công ty TNHH Thương Mại Đầu Tư Mai Thanh</p>

                    <h4 class="fw-bold mt-4 mb-3 text-primary">
                        THÔNG TIN CHUYỂN KHOẢN
                    </h4>
                    <p class="mb-1">
                        <strong>Tên tài khoản:</strong> {{ $setting->ttk }}
                    </p>
                    <p class="mb-1"><strong>Số tài khoản:</strong> {{ $setting->stk }}</p>
                    <p class="mb-1">
                        <strong>Ngân hàng:</strong> {{ $setting->bank }}
                    </p>
                    <p class="mb-1"><strong>Chi nhánh:</strong> {{ $setting->branch }}</p>
                    <p class="mb-1">
                        <strong>Nội dung:</strong> Tên Khách Hàng + Số điện thoại đăng
                        ký mua máy
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ showImage($setting->certificate) }}"
                        alt="Pureit Certificate" class="img-fluid" />
                </div>
            </div> --}}
        </div>
    </section>
@endsection
