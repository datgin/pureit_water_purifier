@extends('frontend.master')

@section('content')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    @if (!empty($slider->link))
                        <a href="{{ $slider->link }}">
                            <img src="{{ $slider->image }}" class="w-100" alt="{{ $slider->alt }}" />
                        </a>
                    @else
                        <img src="{{ $slider->image }}" class="w-100" alt="{{ $slider->alt }}" />
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
            <h2 class="fw-bold mb-5" data-aos="fade-up">Pureit tự hào vì</h2>
            <div class="row about-wrapper">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="about-item px-3 rounded">
                        <div class="icon-wrapper mx-auto mb-3">
                            <img src="assets/image/gioi-thieu-01.png" alt="Toàn cầu" />
                        </div>
                        <h5 class="fw-bold">Nhãn hiệu máy lọc nước toàn cầu</h5>
                        <div class="underline mb-2"></div>
                        <p class="">
                            Nhãn hiệu máy lọc nước toàn cầu tự hào với hành trình hơn 20
                            năm kinh nghiệm
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-item px-3 rounded">
                        <div class="icon-wrapper mx-auto mb-3">
                            <img src="assets/image/gioi-thieu-03.png" alt="Hiệp hội WQA" />
                        </div>
                        <h5 class="fw-bold">Thành viên của Hiệp hội WQA</h5>
                        <div class="underline mb-2"></div>
                        <p class="">
                            Pureit là thành viên Hiệp hội chất lượng nước Hoa Kỳ, cam kết
                            mang lại nguồn nước an toàn, tinh khiết
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="about-item px-3 rounded">
                        <div class="icon-wrapper mx-auto mb-3">
                            <img src="assets/image/gioi-thieu-03.png" alt="Giải thưởng" />
                        </div>
                        <h5 class="fw-bold">Giải thưởng uy tín tại Việt Nam</h5>
                        <div class="underline mb-2"></div>
                        <p class="">
                            "Máy lọc nước âm tủ bếp của năm 2022"* và "Máy lọc nước âm tủ
                            yêu thích nhất hè 2023" do người tiêu dùng bình chọn**
                        </p>
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
                        <i class="bi bi-arrow-right"></i>
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

            <div class="swiper productSwiper mb-4">
                <div class="swiper-wrapper">
                    <!-- Product Slide 1 -->
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <x-product-item :product="$product" />
                        </div>
                    @endforeach
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-prev product-swiper-prev"></div>
                <div class="swiper-button-next product-swiper-next"></div>
            </div>

            <div class="mt-5" data-aos="fade-up">
                <a href="#"
                    class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center btn-get-advice">
                    Tư vấn ngay
                    <span
                        class="ms-2 d-inline-flex align-items-center justify-content-center text-white bg-primary rounded-circle"
                        style="width: 24px; height: 24px">
                        <i class="bi bi-arrow-right"></i>
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
                Khách hàng nói gì về Pureit
            </h2>

            <div class="row align-items-center mb-4">
                <div class="col-md-5 text-md-start" data-aos="fade-right">
                    <h1 class="display-1 fw-bold text-primary">2,000+</h1>
                    <h4 class="fw-bold">
                        Khách hàng đã tin dùng sản phẩm của Pureit
                    </h4>
                    <p class="text-muted mt-3">
                        Các sản phẩm của Pureit đã đạt được hơn 2000+ khách hàng trên
                        toàn quốc sử dụng và nhận được nhiều đánh giá tích cực. Đội ngũ
                        nhân viên của Pureit chân thành cảm ơn tất cả các khách hàng đã
                        và đang tin dùng sản phẩm của chúng tôi!
                    </p>
                </div>
                <div class="col-md-7" data-aos="fade-left">
                    <div class="swiper testimonialSwiper">
                        <div class="swiper-wrapper">
                            <!-- Testimonial Slide 1 -->
                            <div class="swiper-slide">
                                <div class="testimonial-card position-relative d-md-flex p-4 rounded shadow-sm bg-white">
                                    <div class="testimonial-image-wrapper me-md-4 mb-3 mb-md-0">
                                        <img src="./assets/image/a.jpg" alt="Customer" class="img-fluid rounded"
                                            style="max-width: 150px" />
                                        <h6 class="fw-bold mb-0 mt-2">Chị Trinh</h6>
                                        <p class="text-muted mb-0">Hồ Chí Minh</p>
                                    </div>
                                    <div class="testimonial-content text-start">
                                        <p class="mb-3">
                                            Là một trong những chủ nhân đầu tiên của chiếc máy lọc
                                            nước Âm tủ bếp Delica UR5840. Chị nhận xét "siêu phẩm"
                                            này có thiết kế nhỏ gọn, hiện đại, đặc biệt hệ thống
                                            đèn UV thông minh, có thể hiện chất lượng nước đầu ra,
                                            kích thước tiện lợi nhỏ gọn cho các hộ gia đình sử
                                            dụng.
                                        </p>

                                        <i class="bi bi-quote text-primary" style="font-size: 3rem"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-card position-relative d-md-flex p-4 rounded shadow-sm bg-white">
                                    <div class="testimonial-image-wrapper me-md-4 mb-3 mb-md-0">
                                        <img src="./assets/image/a.jpg" alt="Customer" class="img-fluid rounded"
                                            style="max-width: 150px" />
                                    </div>
                                    <div class="testimonial-content text-start">
                                        <p class="mb-3">
                                            Là một trong những chủ nhân đầu tiên của chiếc máy lọc
                                            nước Âm tủ bếp Delica UR5840. Chị nhận xé
                                        </p>
                                        <h6 class="fw-bold mb-0">Chị Trinh</h6>
                                        <p class="text-muted">Hồ Chí Minh</p>
                                        <i class="bi bi-quote text-primary" style="font-size: 3rem"></i>
                                    </div>
                                </div>
                            </div>
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
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- ✅ Distributor and Certificate Section -->
    <section class="distributor-certificate-section bg-light">
        <div class="container distributor-certificate">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold mb-4 text-primary">Nhà phân phối</h2>
                    <p>Công ty TNHH Thương Mại Đầu Tư Mai Thanh</p>

                    <h4 class="fw-bold mt-4 mb-3 text-primary">
                        THÔNG TIN CHUYỂN KHOẢN
                    </h4>
                    <p class="mb-1">
                        <strong>Tên tài khoản:</strong> {{$setting->ttk}}
                    </p>
                    <p class="mb-1"><strong>Số tài khoản:</strong> {{$setting->stk}}</p>
                    <p class="mb-1">
                        <strong>Ngân hàng:</strong> {{$setting->bank}}
                    </p>
                    <p class="mb-1"><strong>Chi nhánh:</strong> {{$setting->branch}}</p>
                    <p class="mb-1">
                        <strong>Nội dung:</strong> Tên Khách Hàng + Số điện thoại đăng
                        ký mua máy
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="./assets/image/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-2048x1078.png"
                        alt="Pureit Certificate" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>
@endsection
