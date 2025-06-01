@extends('frontend.master')
@section('content')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <img src="./assets/image/banner-1.jpg" class="w-100" alt="Banner 1" />
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
                <img src="./assets/image/banner-2.jpg" class="w-100" alt="Banner 2" />
            </div>
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
                <a href="#" class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center">
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
            <h2 class="fw-bold mb-5">Các sản phẩm nổi bật của Pureit</h2>

<<<<<<< HEAD
            <div class="swiper productSwiper mb-4">
                <div class="swiper-wrapper">
                    <!-- Product Slide 1 -->
                    <div class="swiper-slide">
                        <div class="product-card text-start rounded bg-white shadow-sm p-3">
                            <span
                                class="discount-badge position-absolute top-0 start-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">36%</span>
                            <img src="./assets/image/Ultima-WHT_goc-nghieng-300x300.png" class="product-image mb-3"
                                alt="Product Image" />
                            <h6 class="fw-bold product-title">
                                Máy lọc nước treo tường/để bàn Ultima Trắng
                            </h6>
                            <div class="price mt-3">
                                <span class="original-price text-muted text-decoration-line-through me-2">12.400.000
                                    đ</span>
                                <span class="discounted-price text-primary fw-bold">7.990.000 đ</span>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="#" class="btn btn-outline-primary rounded-pill flex-grow-1 me-2">Chi tiết</a>
                                <a href="#" class="btn btn-primary rounded-pill flex-grow-1">Mua ngay</a>
                            </div>
=======
    <section class="elementor-element elementor-element-cc8dcec sec-product e-con-full e-flex e-con e-parent"
        data-id="cc8dcec" data-element_type="container" id="sp-khuyen-mai"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;}"
        data-core-v316-plus="true">
        <div class="section-products">
            <div class="container">
                <div class="section-subtitle">
                    <p>Sản phẩm</p>
                </div>
                <div class="section-title">
                    <h2>Các sản phẩm nổi bật của Pureit</h2>
                </div>
            </div>
        </div>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f8f9fa;
                line-height: 1.6;
            }

            /* Products Section */
            .section-products {
                padding: 80px 20px;
                background-color: #f8f9fa;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                text-align: center;
            }

            /* Subtitle Styles */
            .section-subtitle {
                margin-bottom: 15px;
            }

            .section-subtitle p {
                color: #999;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 2px;
                text-transform: uppercase;
                margin: 0;
            }

            /* Main Title Styles */
            .section-title {
                margin: 0;
            }

            .section-title h2 {
                color: #334155;
                font-size: 3.5rem;
                font-weight: 700;
                margin: 0;
                line-height: 1.2;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .section-title h2 {
                    font-size: 2.5rem;
                }

                .section-products {
                    padding: 40px 20px;
                }
            }

            @media (max-width: 480px) {
                .section-title h2 {
                    font-size: 2rem;
                }

                .section-subtitle p {
                    font-size: 12px;
                    letter-spacing: 1.5px;
                }
            }
        </style>


        <div class="elementor-element elementor-element-e342739 e-con-full e-flex e-con e-child" data-id="e342739"
            data-element_type="container"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;}">
            <div class="elementor-element elementor-element-2ae83e9 elementor-widget elementor-widget-text-editor"
                data-id="2ae83e9" data-element_type="widget" data-widget_type="text-editor.default">
                <div class="elementor-widget-container">
                    <div class="wpb_slider_area wpb_fix_cart">
                        <div class="wpb-woo-products-slider owl-carousel owl-theme grid_no_animation woocommerce wpb-wps-product-type-category"
                            data-autoplay="false" data-loop="true" data-navigation="true" data-slideby="1"
                            data-pagination="true" data-items="4" data-desktopsmall="2" data-tablet="2" data-mobile="1"
                            data-direction="false">

                            @foreach ($highlightProducts as $item)
                                <div
                                    class="wpb-wps-slider-item post-293 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry first instock sale shipping-taxable purchasable product-type-simple">
                                    <figure>

                                        <span class="onsale">{{ $item->discount_value }}%</span>
                                        <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-den/index.html"
                                            class="wpb_pro_img_url">
                                            <img loading="lazy" decoding="async" width="300" height="300"
                                                src="{{ asset('storage/' . $item->image) }}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                alt="" style="width:100%;height:100%;max-width:1500px" /> </a>
                                        <figcaption>


                                            <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-den/index.html"
                                                class="wpb-wps-product-title">
                                                <h3 class="pro_title">{{ $item->name }}</h3>
                                            </a>


                                            <div class="pro_price_area">
                                                @if ($item->final_price < $item->price)
                                                    <del aria-hidden="true">
                                                        <span class="woocommerce-Price-amount amount">
                                                            {{ number_format($item->price, 0, ',', '.') }}&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">&#8363;</span>
                                                        </span>
                                                    </del>
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                            {{ number_format($item->final_price, 0, ',', '.') }}&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">&#8363;</span>
                                                        </span>
                                                    </ins>
                                                @else
                                                    <span class="woocommerce-Price-amount amount">
                                                        {{ number_format($item->price, 0, ',', '.') }}&nbsp;<span
                                                            class="woocommerce-Price-currencySymbol">&#8363;</span>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="wpb_cart_button">
                                                <div class="woo_btn_add_to_cart_wrapper">
                                                    <div class="chi_tiet"><a
                                                            href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-den/index.html"
                                                            class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                    <div class="mua_ngay"> <a
                                                            class="popmake-33 mona-btn-hover  hover-2">Mua
                                                            ngay</a>
                                                    </div>
                                                </div>
                                                <a href="indexb25b.html?add-to-cart=293" data-quantity="1"
                                                    class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                    data-product_id="293" data-product_sku=""
                                                    aria-label="Thêm &ldquo;Máy lọc nước treo tường/để bàn Ultima Đen&rdquo; vào giỏ hàng"
                                                    aria-describedby="" rel="nofollow"></a>
                                            </div>

                                        </figcaption>
                                    </figure>
                                </div>
                            @endforeach
>>>>>>> cfe3fd761e453b74b3b1c9b57e3d12fa2e151dc6
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card text-start rounded bg-white shadow-sm p-3">
                            <span
                                class="discount-badge position-absolute top-0 start-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">36%</span>
                            <img src="./assets/image/Ultima-WHT_goc-nghieng-300x300.png" class="product-image mb-3"
                                alt="Product Image" />
                            <h6 class="fw-bold product-title">
                                Máy lọc nước treo tường/để bàn Ultima Trắng
                            </h6>
                            <div class="price mt-3">
                                <span class="original-price text-muted text-decoration-line-through me-2">12.400.000
                                    đ</span>
                                <span class="discounted-price text-primary fw-bold">7.990.000 đ</span>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="#" class="btn btn-outline-primary rounded-pill flex-grow-1 me-2">Chi tiết</a>
                                <a href="#" class="btn btn-primary rounded-pill flex-grow-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card text-start rounded bg-white shadow-sm p-3">
                            <span
                                class="discount-badge position-absolute top-0 start-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">36%</span>
                            <img src="./assets/image/Ultima-WHT_goc-nghieng-300x300.png" class="product-image mb-3"
                                alt="Product Image" />
                            <h6 class="fw-bold product-title">
                                Máy lọc nước treo tường/để bàn Ultima Trắng
                            </h6>
                            <div class="price mt-3">
                                <span class="original-price text-muted text-decoration-line-through me-2">12.400.000
                                    đ</span>
                                <span class="discounted-price text-primary fw-bold">7.990.000 đ</span>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="#" class="btn btn-outline-primary rounded-pill flex-grow-1 me-2">Chi
                                    tiết</a>
                                <a href="#" class="btn btn-primary rounded-pill flex-grow-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card text-start rounded bg-white shadow-sm p-3">
                            <span
                                class="discount-badge position-absolute top-0 start-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">36%</span>
                            <img src="./assets/image/Ultima-WHT_goc-nghieng-300x300.png" class="product-image mb-3"
                                alt="Product Image" />
                            <h6 class="fw-bold product-title">
                                Máy lọc nước treo tường/để bàn Ultima Trắng
                            </h6>
                            <div class="price mt-3">
                                <span class="original-price text-muted text-decoration-line-through me-2">12.400.000
                                    đ</span>
                                <span class="discounted-price text-primary fw-bold">7.990.000 đ</span>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="#" class="btn btn-outline-primary rounded-pill flex-grow-1 me-2">Chi
                                    tiết</a>
                                <a href="#" class="btn btn-primary rounded-pill flex-grow-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-card text-start rounded bg-white shadow-sm p-3">
                            <span
                                class="discount-badge position-absolute top-0 start-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">36%</span>
                            <img src="./assets/image/Ultima-WHT_goc-nghieng-300x300.png" class="product-image mb-3"
                                alt="Product Image" />
                            <h6 class="fw-bold product-title">
                                Máy lọc nước treo tường/để bàn Ultima Trắng
                            </h6>
                            <div class="price mt-3">
                                <span class="original-price text-muted text-decoration-line-through me-2">12.400.000
                                    đ</span>
                                <span class="discounted-price text-primary fw-bold">7.990.000 đ</span>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="#" class="btn btn-outline-primary rounded-pill flex-grow-1 me-2">Chi
                                    tiết</a>
                                <a href="#" class="btn btn-primary rounded-pill flex-grow-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-prev product-swiper-prev"></div>
                <div class="swiper-button-next product-swiper-next"></div>
            </div>

            <div class="mt-5" data-aos="fade-up">
                <a href="#" class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center">
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
                <a href="#" class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center">
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
                        <strong>Tên tài khoản:</strong> Công ty TNHH Thương Mại Đầu Tư
                        Mai Thanh
                    </p>
                    <p class="mb-1"><strong>Số tài khoản:</strong> 2022208</p>
                    <p class="mb-1">
                        <strong>Ngân hàng:</strong> Thương mại cổ phần Á Châu – ACB
                    </p>
                    <p class="mb-1"><strong>Chi nhánh:</strong> Phú Thọ, TP. HCM</p>
                    <p class="mb-1">
                        <strong>Nội dung:</strong> Tên Khách Hàng + Số điện thoại đăng
                        ký mua máy
                    </p>
                </div>
<<<<<<< HEAD
                <div class="col-md-6 text-center">
                    <img src="./assets/image/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-2048x1078.png"
                        alt="Pureit Certificate" class="img-fluid" />
=======

                <div class="elementor-element elementor-element-2a9fbf3 e-flex e-con-boxed e-con e-child"
                    data-id="2a9fbf3" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-c5ab538 elementor-widget elementor-widget-text-editor"
                            data-id="c5ab538" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <div class="wpb_slider_area wpb_fix_cart">

                                    <div class="wpb-woo-products-slider owl-carousel owl-theme grid_no_animation woocommerce wpb-wps-product-type-category"
                                        data-autoplay="false" data-loop="true" data-navigation="true" data-slideby="1"
                                        data-pagination="true" data-items="3" data-desktopsmall="2" data-tablet="2"
                                        data-mobile="1" data-direction="false">

                                        @foreach ($newProduct as $item)
                                            <div
                                                class="wpb-wps-slider-item post-1392 product type-product status-publish has-post-thumbnail product_cat-loi-loc-thay-the entry  instock shipping-taxable purchasable product-type-simple">
                                                <figure>
                                                    <a href="san-pham/loi-loc-nuoc-ultima-gkk1/index.html"
                                                        class="wpb_pro_img_url">
                                                        <img loading="lazy" decoding="async" width="300"
                                                            height="300"
                                                            src="{{ asset('storage/' .$item->image) }}"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            style="width:100%;height:100%;max-width:1000px" />
                                                    </a>
                                                    <figcaption>

                                                        <a href="san-pham/loi-loc-nuoc-ultima-gkk1/index.html"
                                                            class="wpb-wps-product-title">
                                                            <h3 class="pro_title">{{$item->name}}</h3>
                                                        </a>


                                                        <div class="pro_price_area"><span
                                                                class="woocommerce-Price-amount amount">1.250.000&nbsp;<span
                                                                    class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                        </div>

                                                        <div class="wpb_cart_button">
                                                            <div class="woo_btn_add_to_cart_wrapper">
                                                                <div class="chi_tiet"><a
                                                                        href="san-pham/loi-loc-nuoc-ultima-gkk1/index.html"
                                                                        class="mona-btn-hover hover-1">Chi tiết</a>
                                                                </div>
                                                                <div class="mua_ngay"> <a
                                                                        class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                        ngay</a></div>
                                                            </div>
                                                            <a href="index5009.html?add-to-cart=1392" data-quantity="1"
                                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                data-product_id="1392" data-product_sku=""
                                                                aria-label="Thêm &ldquo;Bộ lọc thay thế Ultima Đen GKK1&rdquo; vào giỏ hàng"
                                                                aria-describedby="" rel="nofollow"></a>
                                                        </div>

                                                    </figcaption>
                                                </figure>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-c46977b e-con-full e-flex e-con e-child" data-id="c46977b"
                    data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-6ef4933 popmake-33 mona-btn mona-btn-2 elementor-invisible elementor-widget elementor-widget-button"
                        data-id="6ef4933" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                                <a class="elementor-button elementor-size-sm" role="button">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text">Tư vấn ngay</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
>>>>>>> cfe3fd761e453b74b3b1c9b57e3d12fa2e151dc6
                </div>
            </div>
        </div>
    </section>
<<<<<<< HEAD
=======

    <section class="elementor-element elementor-element-17d6a84 sec-fb e-flex e-con-boxed e-con e-parent"
        data-id="17d6a84" data-element_type="container" id="y-kien-kh"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-4ba216b e-con-full e-flex e-con e-child" data-id="4ba216b"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-element elementor-element-e19e6f7 e-con-full e-flex e-con e-child" data-id="e19e6f7"
                    data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-3a796f2 line-p-1 elementor-invisible elementor-widget elementor-widget-text-editor"
                        data-id="3a796f2" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:100}"
                        data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <p>nhận xét từ khách hàng</p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-006955b elementor-invisible elementor-widget elementor-widget-heading"
                        data-id="006955b" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}"
                        data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">Khách hàng nói gì về Pureit
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-b5ddd11 e-flex e-con-boxed e-con e-child"
                    data-id="b5ddd11" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-4571ecc e-con-full e-flex e-con e-child"
                            data-id="4571ecc" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-10667e5 sec-fb-count elementor-widget elementor-widget-counter"
                                data-id="10667e5" data-element_type="widget" data-widget_type="counter.default">
                                <div class="elementor-widget-container">
                                    <style>
                                        /*! elementor - v3.17.0 - 08-11-2023 */
                                        .elementor-counter .elementor-counter-number-wrapper {
                                            display: flex;
                                            font-size: 69px;
                                            font-weight: 600;
                                            line-height: 1
                                        }

                                        .elementor-counter .elementor-counter-number-prefix,
                                        .elementor-counter .elementor-counter-number-suffix {
                                            flex-grow: 1;
                                            white-space: pre-wrap
                                        }

                                        .elementor-counter .elementor-counter-number-prefix {
                                            text-align: right
                                        }

                                        .elementor-counter .elementor-counter-number-suffix {
                                            text-align: left
                                        }

                                        .elementor-counter .elementor-counter-title {
                                            text-align: center;
                                            font-size: 19px;
                                            font-weight: 400;
                                            line-height: 2.5
                                        }
                                    </style>
                                    <div class="elementor-counter">
                                        <div class="elementor-counter-number-wrapper">
                                            <span class="elementor-counter-number-prefix"></span>
                                            <span class="elementor-counter-number" data-duration="2000"
                                                data-to-value="2000" data-from-value="0" data-delimiter=",">0</span>
                                            <span class="elementor-counter-number-suffix">+</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-ea01f5a gallery-spacing-custom sec-fb-gallery elementor-invisible elementor-widget elementor-widget-image-gallery"
                                data-id="ea01f5a" data-element_type="widget"
                                data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
                                data-widget_type="image-gallery.default">
                                <div class="elementor-widget-container">
                                    <style>
                                        /*! elementor - v3.17.0 - 08-11-2023 */
                                        .elementor-image-gallery .gallery-item {
                                            display: inline-block;
                                            text-align: center;
                                            vertical-align: top;
                                            width: 100%;
                                            max-width: 100%;
                                            margin: 0 auto
                                        }

                                        .elementor-image-gallery .gallery-item img {
                                            margin: 0 auto
                                        }

                                        .elementor-image-gallery .gallery-item .gallery-caption {
                                            margin: 0
                                        }

                                        .elementor-image-gallery figure img {
                                            display: block
                                        }

                                        .elementor-image-gallery figure figcaption {
                                            width: 100%
                                        }

                                        .gallery-spacing-custom .elementor-image-gallery .gallery-icon {
                                            padding: 0
                                        }

                                        @media (min-width:768px) {
                                            .elementor-image-gallery .gallery-columns-2 .gallery-item {
                                                max-width: 50%
                                            }

                                            .elementor-image-gallery .gallery-columns-3 .gallery-item {
                                                max-width: 33.33%
                                            }

                                            .elementor-image-gallery .gallery-columns-4 .gallery-item {
                                                max-width: 25%
                                            }

                                            .elementor-image-gallery .gallery-columns-5 .gallery-item {
                                                max-width: 20%
                                            }

                                            .elementor-image-gallery .gallery-columns-6 .gallery-item {
                                                max-width: 16.666%
                                            }

                                            .elementor-image-gallery .gallery-columns-7 .gallery-item {
                                                max-width: 14.28%
                                            }

                                            .elementor-image-gallery .gallery-columns-8 .gallery-item {
                                                max-width: 12.5%
                                            }

                                            .elementor-image-gallery .gallery-columns-9 .gallery-item {
                                                max-width: 11.11%
                                            }

                                            .elementor-image-gallery .gallery-columns-10 .gallery-item {
                                                max-width: 10%
                                            }
                                        }

                                        @media (min-width:480px) and (max-width:767px) {

                                            .elementor-image-gallery .gallery.gallery-columns-2 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-3 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-4 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-5 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-6 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-7 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-8 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-9 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-10 .gallery-item {
                                                max-width: 50%
                                            }
                                        }

                                        @media (max-width:479px) {

                                            .elementor-image-gallery .gallery.gallery-columns-2 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-3 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-4 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-5 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-6 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-7 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-8 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-9 .gallery-item,
                                            .elementor-image-gallery .gallery.gallery-columns-10 .gallery-item {
                                                max-width: 100%
                                            }
                                        }
                                    </style>
                                    <div class="elementor-image-gallery">
                                        <div id='gallery-1'
                                            class='gallery galleryid-37 gallery-columns-1 gallery-size-full'>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-09.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-10.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-11.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-08.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-02.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-03.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-04.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-05.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-06.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-07.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon portrait'>
                                                    <img loading="lazy" width="224" height="296"
                                                        src="{{ asset('frontends/assets/images/Cao-Văn-Tuấn.jpg') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:132.14%;max-width:224px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="100" height="100"
                                                        src="{{ asset('frontends/assets/images/icons8-plus-100.png') }}"
                                                        class="attachment-full size-full" alt="" decoding="async"
                                                        style="width:100%;height:100%;max-width:100px;" />
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-1b2ddf2 e-con-full e-flex e-con e-child"
                            data-id="1b2ddf2" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-2baf7ab elementor-invisible elementor-widget elementor-widget-text-editor"
                                data-id="2baf7ab" data-element_type="widget"
                                data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:100}"
                                data-widget_type="text-editor.default">
                                <div class="elementor-widget-container">
                                    <h3><strong>Khách hàng đã tin dùng</strong><br />sản phẩm của Pureit</h3>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-6eb957f elementor-invisible elementor-widget elementor-widget-text-editor"
                                data-id="6eb957f" data-element_type="widget"
                                data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:200}"
                                data-widget_type="text-editor.default">
                                <div class="elementor-widget-container">
                                    <p>Các sản phẩm của Pureit đã đạt được hơn 2000+ khách hàng trên toàn quốc sử
                                        dụng và nhận được nhiều đánh giá tích cực. Đội ngũ nhân viên của Pureit chân
                                        thành cảm ơn tất cả các khách hàng đã và đang tin dùng sản phẩm của chúng
                                        tôi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-51bbc2b sec-fb-testi e-flex e-con-boxed e-con e-child"
                    data-id="51bbc2b" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-ead1f0d elementor-testimonial--layout-image_left elementor-testimonial--align-left elementor-testimonial--skin-default elementor-pagination-type-bullets elementor-widget elementor-widget-testimonial-carousel"
                            data-id="ead1f0d" data-element_type="widget"
                            data-settings="{&quot;slides_per_view&quot;:&quot;1&quot;,&quot;space_between&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;pagination&quot;:&quot;bullets&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;loop&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;space_between_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}"
                            data-widget_type="testimonial-carousel.default">
                            <div class="elementor-widget-container">
                                <link rel="stylesheet"
                                    href="{{ asset('frontends/assets/css/widget-carousel.min.css') }}">
                                <div class="elementor-swiper">
                                    <div class="elementor-main-swiper swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="elementor-testimonial">
                                                    <div class="elementor-testimonial__content">
                                                        <div class="elementor-testimonial__text">
                                                            Là một trong những chủ nhân đầu tiên của chiếc máy lọc
                                                            nước Âm tủ bếp Delica UR5840. Chị nhận xét “siêu phẩm”
                                                            nhà Pureit: Cực kỳ ấn tượng với vòi nước khử khuẩn và
                                                            màn hình UV thông minh, có thể hiện chất lượng nước đầu
                                                            ra, kích thước tiện lợi nhỏ gọn cho các hộ gia đình sử
                                                            dụng. </div>
                                                        <cite class="elementor-testimonial__cite"><span
                                                                class="elementor-testimonial__name">Chị Phương
                                                                Lan</span><span class="elementor-testimonial__title">Hồ
                                                                Chí
                                                                Minh</span></cite>
                                                    </div>
                                                    <div class="elementor-testimonial__footer">
                                                        <div class="elementor-testimonial__image">
                                                            <img decoding="async"
                                                                src="{{ asset('frontends/assets/images/z3629617294126_5541913996745a03380fa31bf5baacb3-1.png') }}"
                                                                alt="Chị Phương Lan">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="elementor-testimonial">
                                                    <div class="elementor-testimonial__content">
                                                        <div class="elementor-testimonial__text">
                                                            Máy lọc nước được trang bị công nghệ lọc RO hiện đại,
                                                            rất an tâm về chất lượng nước đầu ra. Thiết kế sang
                                                            trọng, hiện đại, kích thước nhỏ gọn tiết kiệm không gian
                                                            bếp. Được tin dùng bởi người nổi tiếng và chuyên gia
                                                            công nghệ khiến chị rất an tâm về chất lượng sản phẩm
                                                        </div>
                                                        <cite class="elementor-testimonial__cite"><span
                                                                class="elementor-testimonial__name">Chị
                                                                Trinh</span><span class="elementor-testimonial__title">Hồ
                                                                Chí
                                                                Minh</span></cite>
                                                    </div>
                                                    <div class="elementor-testimonial__footer">
                                                        <div class="elementor-testimonial__image">
                                                            <img decoding="async"
                                                                src="{{ asset('frontends/assets/images/a.jpg') }}"
                                                                alt="Chị Trinh">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="elementor-testimonial">
                                                    <div class="elementor-testimonial__content">
                                                        <div class="elementor-testimonial__text">
                                                            Máy lọc nước được trang bị công nghệ lọc RO hiện đại,
                                                            rất an tâm về chất lượng nước đầu ra. Thiết kế sang
                                                            trọng, hiện đại, kích thước nhỏ gọn tiết kiệm không gian
                                                            bếp. Được tin dùng bởi người nổi tiếng và chuyên gia
                                                            công nghệ khiến chị rất an tâm về chất lượng sản phẩm
                                                        </div>
                                                        <cite class="elementor-testimonial__cite"><span
                                                                class="elementor-testimonial__name">Chị
                                                                Trinh</span><span class="elementor-testimonial__title">Hồ
                                                                Chí
                                                                Minh</span></cite>
                                                    </div>
                                                    <div class="elementor-testimonial__footer">
                                                        <div class="elementor-testimonial__image">
                                                            <img decoding="async"
                                                                src="{{ asset('frontends/assets/images/a.jpg') }}"
                                                                alt="Chị Trinh">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-da0ea0b e-con-full e-flex e-con e-child" data-id="da0ea0b"
                    data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-56d2697 popmake-33 mona-btn mona-btn-2 elementor-invisible elementor-widget elementor-widget-button"
                        data-id="56d2697" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                                <a class="elementor-button elementor-size-sm" role="button">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text">Tư vấn ngay</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="elementor-element elementor-element-55aa948 sec-nha-phan-phoi e-flex e-con-boxed e-con e-parent"
        data-id="55aa948" data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-483b6e2 e-con-full e-flex e-con e-child" data-id="483b6e2"
                data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                <div class="elementor-element elementor-element-43aeeae elementor-widget elementor-widget-heading"
                    data-id="43aeeae" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">Nhà phân phối </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-dc16206 elementor-widget elementor-widget-text-editor"
                    data-id="dc16206" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p>Công ty TNHH Thương Mại Đầu Tư Mai Thanh</p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-4032520 elementor-widget__width-initial elementor-widget elementor-widget-heading"
                    data-id="4032520" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h3 class="elementor-heading-title elementor-size-default">THÔNG TIN CHUYỂN KHOẢN</h3>
                    </div>
                </div>
                <div class="elementor-element elementor-element-e5d7b49 elementor-widget elementor-widget-text-editor"
                    data-id="e5d7b49" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p><strong>Tên tài khoản:</strong> Công ty TNHH Thương Mại Đầu Tư Mai Thanh<br /><strong>Số
                                tài khoản:</strong> 2022208<br /><strong>Ngân hàng:</strong> Thương mại cổ phần Á
                            Châu – ACB<br /><strong>Chi nhánh:</strong> Phú Thọ, TP. HCM<br /><strong>Nội
                                dung:</strong> Tên Khách Hàng + Số điện thoại đăng ký mua máy</p>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-2eca5e6 e-con-full e-flex e-con e-child" data-id="2eca5e6"
                data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                <div class="elementor-element elementor-element-a044830 image e-flex e-con-boxed e-con e-child"
                    data-id="a044830" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-a8755db sec-img elementor-widget elementor-widget-image"
                            data-id="a8755db" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <img loading="lazy" decoding="async" width="3167" height="1667"
                                    src="wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1.png"
                                    class="attachment-full size-full wp-image-2264" alt=""
                                    srcset="https://pureitvn-official.com/wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1.png 3167w, https://pureitvn-official.com/wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-300x158.png 300w, https://pureitvn-official.com/wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-1024x539.png 1024w, https://pureitvn-official.com/wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-768x404.png 768w, https://pureitvn-official.com/wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-1536x808.png 1536w, https://pureitvn-official.com/wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-2048x1078.png 2048w, https://pureitvn-official.com/wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-1568x825.png 1568w, https://pureitvn-official.com/wp-content/uploads/2024/11/241114_UVN_PUREIT_P2411169-1_Pureit-landing-page-revert_R1-600x316.png 600w"
                                    sizes="(max-width: 3167px) 100vw, 3167px"
                                    style="width:100%;height:52.64%;max-width:3167px" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> cfe3fd761e453b74b3b1c9b57e3d12fa2e151dc6
@endsection
