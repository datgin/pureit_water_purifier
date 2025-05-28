@extends('frontend.master')
@section('content')
    <div class="elementor-element elementor-element-d3a2891 e-con-full sec-banner  e-flex e-con e-parent" data-id="d3a2891"
        data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}" data-core-v316-plus="true">
        <div class="elementor-element elementor-element-57d56e3 mona-pc popmake elementor-arrows-position-inside elementor-widget elementor-widget-image-carousel"
            data-id="57d56e3" data-element_type="widget"
            data-settings="{&quot;slides_to_show&quot;:&quot;1&quot;,&quot;slides_to_show_mobile&quot;:&quot;1&quot;,&quot;navigation&quot;:&quot;arrows&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;speed&quot;:500}"
            data-widget_type="image-carousel.default">
            <div class="elementor-widget-container">
                <div class="elementor-image-carousel-wrapper swiper" dir="ltr">
                    <div class="elementor-image-carousel swiper-wrapper" aria-live="off">
                        <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="1 of 3">
                            <figure class="swiper-slide-inner"><img decoding="async" class="swiper-slide-image"
                                    src="{{ asset('frontends/assets/images/1700x600.jpg') }}" alt="1700x600" /></figure>
                        </div>
                        <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="2 of 3">
                            <figure class="swiper-slide-inner"><img decoding="async" class="swiper-slide-image"
                                    src="{{ asset('frontends/assets/images/231208_UVN_PUREIT_P2311036_Nuoc-sach-thong-minh_R4-1700x600-1.jpg') }}"
                                    alt="231208_UVN_PUREIT_P2311036_Nuoc sach thong minh_R4 1700x600" /></figure>
                        </div>
                        <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="3 of 3">
                            <figure class="swiper-slide-inner"><img decoding="async" class="swiper-slide-image"
                                    src="{{ asset('frontends/assets/images/231208_UVN_PUREIT_P2311036_Utima_R3-1700x600-1.jpg') }}"
                                    alt="231208_UVN_PUREIT_P2311036_Utima_R3 1700x600" /></figure>
                        </div>
                    </div>
                    <div class="elementor-swiper-button elementor-swiper-button-prev" role="button" tabindex="0">
                        <i aria-hidden="true" class="eicon-chevron-left"></i>
                    </div>
                    <div class="elementor-swiper-button elementor-swiper-button-next" role="button" tabindex="0">
                        <i aria-hidden="true" class="eicon-chevron-right"></i>
                    </div>

                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-31f3521 mona-mb popmake elementor-arrows-position-inside elementor-widget elementor-widget-image-carousel"
            data-id="31f3521" data-element_type="widget"
            data-settings="{&quot;slides_to_show&quot;:&quot;1&quot;,&quot;slides_to_show_mobile&quot;:&quot;1&quot;,&quot;navigation&quot;:&quot;arrows&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;speed&quot;:500}"
            data-widget_type="image-carousel.default">
            <div class="elementor-widget-container">
                <div class="elementor-image-carousel-wrapper swiper" dir="ltr">
                    <div class="elementor-image-carousel swiper-wrapper" aria-live="off">
                        <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="1 of 3">
                            <figure class="swiper-slide-inner"><img decoding="async" class="swiper-slide-image"
                                    src="{{ asset('frontends/assets/images/450x600.jpg') }}" alt="450x600" /></figure>
                        </div>
                        <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="2 of 3">
                            <figure class="swiper-slide-inner"><img decoding="async" class="swiper-slide-image"
                                    src="{{ asset('frontends/assets/images/231208_UVN_PUREIT_P2311036_Nuoc-sach-thong-minh_R4-450x600-1.jpg') }}"
                                    alt="231208_UVN_PUREIT_P2311036_Nuoc sach thong minh_R4 450x600" /></figure>
                        </div>
                        <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="3 of 3">
                            <figure class="swiper-slide-inner"><img decoding="async" class="swiper-slide-image"
                                    src="{{ asset('frontends/assets/images/231208_UVN_PUREIT_P2311036_Utima_R3-450x600-1.jpg') }}"
                                    alt="231208_UVN_PUREIT_P2311036_Utima_R3 450x600" /></figure>
                        </div>
                    </div>
                    <div class="elementor-swiper-button elementor-swiper-button-prev" role="button" tabindex="0">
                        <i aria-hidden="true" class="eicon-chevron-left"></i>
                    </div>
                    <div class="elementor-swiper-button elementor-swiper-button-next" role="button" tabindex="0">
                        <i aria-hidden="true" class="eicon-chevron-right"></i>
                    </div>

                </div>
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

        .sec-about {
            padding: 80px 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header Styles */
        .about-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .line-p-1 {
            color: #999;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .main-title {
            color: #334155;
            font-size: 3.5rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }

        /* Cards Container */
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-bottom: 20px;
        }

        /* Image Box Styles */
        .image-box {
            text-align: center;
            padding: 40px 30px;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            height: 100%;
            background-color: transparent;
        }

        .image-box:hover {
            background-color: #334155;
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(51, 65, 85, 0.2);
        }

        /* Icon Container - Outer Circle */
        .image-box-img {
            width: 96px;
            height: 96px;
            background-color: #e3f2fd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            transition: all 0.3s ease-in-out;
        }

        .image-box:hover .image-box-img {
            background-color: white;
        }

        /* Icon Container - Inner Circle */
        .icon-inner {
            width: 64px;
            height: 64px;
            background-color: #334155;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease-in-out;
        }

        .image-box:hover .icon-inner {
            background-color: #334155;
        }

        /* Image Styling */
        .elementor-image-box-img {
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .elementor-image-box-img img {
            max-width: 40px !important;
            max-height: 40px !important;
            width: auto !important;
            height: auto !important;
            filter: brightness(0) invert(1);
            transition: all 0.3s ease-in-out;
        }

        .image-box:hover .elementor-image-box-img img {
            filter: brightness(0) invert(0);
        }

        /* Card 2 - Remove icon-inner for WQA */
        .image-box:nth-child(2) .icon-inner {
            display: none;
        }

        .image-box:nth-child(2) .elementor-image-box-img img {
            max-width: 50px !important;
            max-height: 50px !important;
        }

        /* Title Styles */
        .image-box-title {
            color: #334155;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 20px;
            transition: all 0.3s ease-in-out;
        }

        .image-box:hover .image-box-title {
            color: white;
        }

        /* Title Underline */
        .title-underline {
            width: 48px;
            height: 4px;
            background-color: #334155;
            margin: 0 auto 20px;
            transition: all 0.3s ease-in-out;
        }

        .image-box:hover .title-underline {
            background-color: white;
        }

        /* Description */
        .image-box-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 0;
            transition: all 0.3s ease-in-out;
        }

        .image-box:hover .image-box-description {
            color: white;
        }

        /* Footnotes - Outside cards container */
        .footnotes {
            text-align: center;
            font-size: 12px;
            color: #999;
            font-style: italic;
            margin-bottom: 40px;
            margin-top: 20px;
        }

        .footnotes p {
            margin-bottom: 5px;
        }

        /* Button Styles */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .mona-btn {
            background-color: transparent;
            color: #334155;
            border: 2px solid #334155;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .mona-btn:hover {
            background-color: #334155;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(51, 65, 85, 0.3);
        }

        .chat-icon::before {
            content: "💬";
            font-size: 16px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-title {
                font-size: 2.5rem;
            }

            .cards-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .sec-about {
                padding: 40px 20px;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 2rem;
            }

            .image-box {
                padding: 30px 20px;
            }
        }
    </style>

    <section class="sec-about" id="gioi-thieu">
        <div class="container">
            <!-- Header Section -->
            <div class="about-header">
                <p class="line-p-1">Về chúng tôi</p>
                <h2 class="main-title">Pureit tự hào vì</h2>
            </div>

            <!-- Cards Container -->
            <div class="cards-container">
                <!-- Card 1: Global Brand -->
                <div class="image-box">
                    <div class="image-box-img">
                        <div class="icon-inner">
                            <figure class="elementor-image-box-img"><img decoding="async" width="72" height="68"
                                    src="{{ asset('frontends/assets/images/gioi-thieu-01.png') }}"
                                    class="attachment-full size-full wp-image-92" alt=""
                                    style="width:100%;height:94.44%;max-width:72px" /></figure>
                        </div>
                    </div>
                    <h3 class="image-box-title">Nhãn hiệu máy lọc nước toàn cầu</h3>
                    <div class="title-underline"></div>
                    <p class="image-box-description">
                        Nhãn hiệu máy lọc nước toàn cầu tự hào với hành trình hơn 20 năm kinh nghiệm
                    </p>
                </div>

                <!-- Card 2: WQA Member -->
                <div class="image-box">
                    <div class="image-box-img">
                        <figure class="elementor-image-box-img"><img decoding="async" width="60" height="56"
                                src="{{ asset('frontends/assets/images/gioi-thieu-03.png') }}"
                                class="attachment-full size-full wp-image-94" alt=""
                                style="width:100%;height:93.33%;max-width:60px" /></figure>
                    </div>
                    <h3 class="image-box-title">Thành viên của Hiệp hội WQA</h3>
                    <div class="title-underline"></div>
                    <p class="image-box-description">
                        Pureit là thành viên Hiệp hội chất lượng nước Hoa Kỳ, cam kết mang lại nguồn nước an toàn, tinh
                        khiết
                    </p>
                </div>

                <!-- Card 3: Vietnam Awards -->
                <div class="image-box">
                    <div class="image-box-img">
                        <div class="icon-inner">
                            <figure class="elementor-image-box-img"><img loading="lazy" decoding="async" width="1267"
                                    height="1266"
                                    src="{{ asset('frontends/assets/images/Pureit_ConsistentWaterFlow_White.png') }}"
                                    class="attachment-full size-full wp-image-1775" alt=""
                                    style="width:100%;height:99.92%;max-width:1267px"
                                    srcset="https://pureitvn-official.com/wp-content/uploads/2023/11/Pureit_ConsistentWaterFlow_White.png 1267w, https://pureitvn-official.com/wp-content/uploads/2023/11/Pureit_ConsistentWaterFlow_White-300x300.png 300w, https://pureitvn-official.com/wp-content/uploads/2023/11/Pureit_ConsistentWaterFlow_White-1024x1024.png 1024w, https://pureitvn-official.com/wp-content/uploads/2023/11/Pureit_ConsistentWaterFlow_White-150x150.png 150w, https://pureitvn-official.com/wp-content/uploads/2023/11/Pureit_ConsistentWaterFlow_White-768x767.png 768w, https://pureitvn-official.com/wp-content/uploads/2023/11/Pureit_ConsistentWaterFlow_White-600x600.png 600w, https://pureitvn-official.com/wp-content/uploads/2023/11/Pureit_ConsistentWaterFlow_White-100x100.png 100w"
                                    sizes="(max-width: 1267px) 100vw, 1267px" /></figure>
                        </div>
                    </div>
                    <h3 class="image-box-title">Giải thưởng uy tín tại Việt Nam</h3>
                    <div class="title-underline"></div>
                    <p class="image-box-description">
                        "Máy lọc nước âm tủ bếp của năm 2022"* và "Máy lọc nước âm tủ yêu thích nhất hè 2023" do người
                        tiêu dùng bình chọn**
                    </p>

                </div>
            </div>
            <div class="footnotes">
                <p>(*) Theo Tạp chí Điện Tử và Ứng Dụng</p>
                <p>(**) Do người tiêu dùng bình chọn tại Diễn đàn Tinh Tế</p>
            </div>
            <!-- Button Section -->
            <div class="button-container">
                <a href="#" class="mona-btn">
                    <span class="chat-icon"></span>
                    Tư vấn ngay
                </a>
            </div>
        </div>
    </section>


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

                            <div
                                class="wpb-wps-slider-item post-293 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry first instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">36%</span>


                                    <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-den/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/240925_UVN_PUREIT_P2409140-1_Pureit-Hero-Image_R2_Ultima-BL-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1500px" /> </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-den/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy lọc nước treo tường/để bàn Ultima Đen</h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">12.400.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">7.990.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-den/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
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
                            <div
                                class="wpb-wps-slider-item post-1426 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry  instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">15%</span>


                                    <a href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5840/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/240925_UVN_PUREIT_P2409140-1_Pureit-Hero-Image_R2_Delica-UR5840-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1500px" /> </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5840/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy lọc nước âm tủ bếp Delica UR5840</h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">18.900.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">15.990.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5840/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="indexdc24.html?add-to-cart=1426" data-quantity="1"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="1426" data-product_sku=""
                                                aria-label="Thêm &ldquo;Máy lọc nước âm tủ bếp Delica UR5840&rdquo; vào giỏ hàng"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                            <div
                                class="wpb-wps-slider-item post-1881 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry  outofstock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">36%</span>


                                    <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-trang/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/Ultima-WHT_goc-nghieng-300x300.png') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:87.72%;max-width:570px" />
                                    </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-trang/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy lọc nước treo tường/để bàn Ultima Trắng</h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">12.400.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">7.990.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-trang/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-ultima-trang/index.html"
                                                data-quantity="1" class="button product_type_simple"
                                                data-product_id="1881" data-product_sku=""
                                                aria-label="Đọc thêm về &ldquo;Máy lọc nước treo tường/để bàn Ultima Trắng&rdquo;"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                            <div
                                class="wpb-wps-slider-item post-1433 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry last instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">28%</span>


                                    <a href="san-pham/may-loc-nuoc-nong-thong-minh-lavita/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/240925_UVN_PUREIT_P2409140-1_Pureit-Hero-Image_R2_Lavita-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1500px" />
                                    </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-nong-thong-minh-lavita/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy lọc nước 3 chế độ nóng thông minh Lavita
                                            </h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">12.500.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">8.990.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-nong-thong-minh-lavita/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="index5039.html?add-to-cart=1433" data-quantity="1"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="1433" data-product_sku=""
                                                aria-label="Thêm &ldquo;Máy lọc nước 3 chế độ nóng thông minh Lavita&rdquo; vào giỏ hàng"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                            <div
                                class="wpb-wps-slider-item post-1482 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry first instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">19%</span>


                                    <a href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5640/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/240925_UVN_PUREIT_P2409140-1_Pureit-Hero-Image_R2_Delica-UR5640-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1500px" />
                                    </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5640/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy lọc nước âm tủ bếp Delica UR5640</h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">13.650.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">10.990.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5640/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="index2502.html?add-to-cart=1482" data-quantity="1"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="1482" data-product_sku=""
                                                aria-label="Thêm &ldquo;Máy lọc nước âm tủ bếp Delica UR5640&rdquo; vào giỏ hàng"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                            <div
                                class="wpb-wps-slider-item post-1484 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry  instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">9%</span>


                                    <a href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5440/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/240925_UVN_PUREIT_P2409140-1_Pureit-Hero-Image_R2_Delica-UR5440-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1500px" />
                                    </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5440/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy lọc nước âm tủ bếp Delica UR5440</h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">10.900.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">9.890.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-am-tu-bep-delica-ur5440/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="index938e.html?add-to-cart=1484" data-quantity="1"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="1484" data-product_sku=""
                                                aria-label="Thêm &ldquo;Máy lọc nước âm tủ bếp Delica UR5440&rdquo; vào giỏ hàng"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                            <div
                                class="wpb-wps-slider-item post-1485 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry  instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">26%</span>


                                    <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-casa-g2/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/240925_UVN_PUREIT_P2409140-1_Pureit-Hero-Image_R2_Casa-G2-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1500px" />
                                    </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-treo-tuong-de-ban-casa-g2/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy lọc nước treo tường/để bàn Casa G2</h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">7.500.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">5.555.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-treo-tuong-de-ban-casa-g2/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="index791a.html?add-to-cart=1485" data-quantity="1"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="1485" data-product_sku=""
                                                aria-label="Thêm &ldquo;Máy lọc nước treo tường/để bàn Casa G2&rdquo; vào giỏ hàng"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                            <div
                                class="wpb-wps-slider-item post-1488 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry last instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">18%</span>


                                    <a href="san-pham/may-loc-nuoc-am-tu-bep-tanka-ur3140/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/240925_UVN_PUREIT_P2409140-1_Pureit-Hero-Image_R2_Tanka-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1500px" />
                                    </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-am-tu-bep-tanka-ur3140/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy lọc nước âm tủ bếp Tanka</h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">6.400.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">5.250.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-am-tu-bep-tanka-ur3140/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="indexff31.html?add-to-cart=1488" data-quantity="1"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="1488" data-product_sku=""
                                                aria-label="Thêm &ldquo;Máy lọc nước âm tủ bếp Tanka&rdquo; vào giỏ hàng"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                            <div
                                class="wpb-wps-slider-item post-1902 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry first instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">30%</span>


                                    <a href="san-pham/loc-tho-trong-suot-am-tu-bep-pureit/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/Loi-loc-Panda-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1080px" />
                                    </a>
                                    <figcaption>


                                        <a href="san-pham/loc-tho-trong-suot-am-tu-bep-pureit/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Lọc Thô Trong Suốt Âm Tủ Bếp Pureit</h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">2.890.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">2.023.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/loc-tho-trong-suot-am-tu-bep-pureit/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="index96fa.html?add-to-cart=1902" data-quantity="1"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="1902" data-product_sku=""
                                                aria-label="Thêm &ldquo;Lọc Thô Trong Suốt Âm Tủ Bếp Pureit&rdquo; vào giỏ hàng"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                            <div
                                class="wpb-wps-slider-item post-1807 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry  instock sale shipping-taxable purchasable product-type-simple">
                                <figure>

                                    <span class="onsale">37%</span>


                                    <a href="san-pham/may-loc-nuoc-classic-tiet-kiem-khong-dung-dien/index.html"
                                        class="wpb_pro_img_url">
                                        <img loading="lazy" decoding="async" width="300" height="300"
                                            src="{{ asset('frontends/assets/images/240925_UVN_PUREIT_P2409140-1_Pureit-Hero-Image_R2_Classic-300x300.jpg') }}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" style="width:100%;height:100%;max-width:1500px" />
                                    </a>
                                    <figcaption>


                                        <a href="san-pham/may-loc-nuoc-classic-tiet-kiem-khong-dung-dien/index.html"
                                            class="wpb-wps-product-title">
                                            <h3 class="pro_title">Máy Lọc Nước Classic Tiết kiệm không dùng điện
                                            </h3>
                                        </a>


                                        <div class="pro_price_area"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount">2.390.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
                                            <ins><span class="woocommerce-Price-amount amount">1.500.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
                                        </div>



                                        <div class="wpb_cart_button">
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet"><a
                                                        href="san-pham/may-loc-nuoc-classic-tiet-kiem-khong-dung-dien/index.html"
                                                        class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                <div class="mua_ngay"> <a class="popmake-33 mona-btn-hover  hover-2">Mua
                                                        ngay</a>
                                                </div>
                                            </div>
                                            <a href="indexf0d3.html?add-to-cart=1807" data-quantity="1"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="1807" data-product_sku=""
                                                aria-label="Thêm &ldquo;Máy Lọc Nước Classic Tiết kiệm không dùng điện&rdquo; vào giỏ hàng"
                                                aria-describedby="" rel="nofollow"></a>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-dc80921 e-flex e-con-boxed e-con e-child" data-id="dc80921"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-f75929a popmake-33 mona-btn mona-btn-2 elementor-invisible elementor-widget elementor-widget-button"
                    data-id="f75929a" data-element_type="widget"
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
    </section>

    <section
        class="elementor-element elementor-element-0a20a46 sec-why elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile e-flex e-con-boxed e-con e-parent"
        data-id="0a20a46" data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-7be51ea e-con-full e-flex e-con e-child" data-id="7be51ea"
                data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                <div class="elementor-element elementor-element-41dc9c3 line-p-1 elementor-invisible elementor-widget elementor-widget-text-editor"
                    data-id="41dc9c3" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:100}"
                    data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p>lý do chọn chúng tôi</p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-0e05aa6 elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="0e05aa6" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">Mua sản phẩm từ Pureit thì được
                            gì?</h2>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-e66f335 elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile e-flex e-con-boxed e-con e-child"
                data-id="e66f335" data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-28ee5eb e-con-full sec-why-image e-flex e-con e-child"
                        data-id="28ee5eb" data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-caaedf4 elementor-widget elementor-widget-image"
                            data-id="caaedf4" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <img loading="lazy" decoding="async" width="527" height="487"
                                    src="wp-content/uploads/2023/11/why.png"
                                    class="attachment-full size-full wp-image-161" alt=""
                                    srcset="https://pureitvn-official.com/wp-content/uploads/2023/11/why.png 527w, https://pureitvn-official.com/wp-content/uploads/2023/11/why-300x277.png 300w"
                                    sizes="(max-width: 527px) 100vw, 527px"
                                    style="width:100%;height:92.41%;max-width:527px" />
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-7dc42e0 e-con-full sec-why-list e-flex e-con e-child"
                        data-id="7dc42e0" data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-1b3bb1b e-con-full sec-why-item e-flex e-con e-child"
                            data-id="1b3bb1b" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-a92f2f9 elementor-position-top elementor-widget elementor-widget-image-box"
                                data-id="a92f2f9" data-element_type="widget" data-widget_type="image-box.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image-box-wrapper">
                                        <figure class="elementor-image-box-img"><img loading="lazy" decoding="async"
                                                width="70" height="70"
                                                src="wp-content/uploads/2023/11/icon-why-01.png"
                                                class="attachment-full size-full wp-image-174" alt=""
                                                style="width:100%;height:100%;max-width:70px" /></figure>
                                        <div class="elementor-image-box-content">
                                            <h3 class="elementor-image-box-title">Thiết kế không bình chứa phù hợp
                                                với không gian sống nhỏ gọn</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-228c252 elementor-widget elementor-widget-button"
                                data-id="228c252" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="#">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-icon elementor-align-icon-right">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="elementor-button-text">Bấm vào đây</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-58fe2b0 e-con-full sec-why-item e-flex e-con e-child"
                            data-id="58fe2b0" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-a9e8fb0 elementor-position-top elementor-widget elementor-widget-image-box"
                                data-id="a9e8fb0" data-element_type="widget" data-widget_type="image-box.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image-box-wrapper">
                                        <figure class="elementor-image-box-img"><img loading="lazy" decoding="async"
                                                width="42" height="42"
                                                src="wp-content/uploads/2023/11/icon-why-02.png"
                                                class="attachment-full size-full wp-image-169" alt=""
                                                style="width:100%;height:100%;max-width:42px" /></figure>
                                        <div class="elementor-image-box-content">
                                            <h3 class="elementor-image-box-title">Cảnh báo tuổi thọ lõi lọc</h3>
                                            <p class="elementor-image-box-description">Công nghệ lọc nước RO
                                                Water, loại bỏ mọi vi sinh vật, vi khuẩn có hại, giúp gia đình bạn
                                                tiếp kiệm đến hơn 80 ly nước mỗi ngày, đáp ứng các tiêu chuẩn an
                                                toàn khắc nghiệt nhất</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-66cf74d elementor-widget elementor-widget-button"
                                data-id="66cf74d" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="#">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-icon elementor-align-icon-right">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="elementor-button-text">Bấm vào đây</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-ecdc475 e-con-full sec-why-item e-flex e-con e-child"
                            data-id="ecdc475" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-dfce819 elementor-position-top elementor-widget elementor-widget-image-box"
                                data-id="dfce819" data-element_type="widget" data-widget_type="image-box.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image-box-wrapper">
                                        <figure class="elementor-image-box-img"><img loading="lazy" decoding="async"
                                                width="70" height="70"
                                                src="wp-content/uploads/2023/11/icon-why-03.png"
                                                class="attachment-full size-full wp-image-173" alt=""
                                                style="width:100%;height:100%;max-width:70px" /></figure>
                                        <div class="elementor-image-box-content">
                                            <h3 class="elementor-image-box-title">Tỷ lệ thu hồi nước 60%</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-4fcfb4f elementor-widget elementor-widget-button"
                                data-id="4fcfb4f" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="#">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-icon elementor-align-icon-right">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="elementor-button-text">Bấm vào đây</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-6e8c767 e-con-full sec-why-item e-flex e-con e-child"
                            data-id="6e8c767" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-bdc5485 elementor-position-top elementor-widget elementor-widget-image-box"
                                data-id="bdc5485" data-element_type="widget" data-widget_type="image-box.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image-box-wrapper">
                                        <figure class="elementor-image-box-img"><img loading="lazy" decoding="async"
                                                width="70" height="70"
                                                src="wp-content/uploads/2023/11/icon-why-04.png"
                                                class="attachment-full size-full wp-image-170" alt=""
                                                style="width:100%;height:100%;max-width:70px" /></figure>
                                        <div class="elementor-image-box-content">
                                            <h3 class="elementor-image-box-title">Dễ dàng thay thế bộ lọc</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-2cc0aff elementor-widget elementor-widget-button"
                                data-id="2cc0aff" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="#">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-icon elementor-align-icon-right">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="elementor-button-text">Bấm vào đây</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-a63fbc2 e-con-full sec-why-item e-flex e-con e-child"
                            data-id="a63fbc2" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-63620b5 elementor-position-top elementor-widget elementor-widget-image-box"
                                data-id="63620b5" data-element_type="widget" data-widget_type="image-box.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image-box-wrapper">
                                        <figure class="elementor-image-box-img"><img loading="lazy" decoding="async"
                                                width="70" height="70"
                                                src="wp-content/uploads/2023/11/icon-why-05.png"
                                                class="attachment-full size-full wp-image-172" alt=""
                                                style="width:100%;height:100%;max-width:70px" /></figure>
                                        <div class="elementor-image-box-content">
                                            <h3 class="elementor-image-box-title">Vật liệu an toàn cho trẻ em</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-cfd31c1 elementor-widget elementor-widget-button"
                                data-id="cfd31c1" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="#">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-icon elementor-align-icon-right">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="elementor-button-text">Bấm vào đây</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-127563f e-con-full sec-why-item e-flex e-con e-child"
                            data-id="127563f" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-db0992d elementor-position-top elementor-widget elementor-widget-image-box"
                                data-id="db0992d" data-element_type="widget" data-widget_type="image-box.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image-box-wrapper">
                                        <figure class="elementor-image-box-img"><img loading="lazy" decoding="async"
                                                width="70" height="70"
                                                src="wp-content/uploads/2023/11/icon-why-06.png"
                                                class="attachment-full size-full wp-image-171" alt=""
                                                style="width:100%;height:100%;max-width:70px" /></figure>
                                        <div class="elementor-image-box-content">
                                            <h3 class="elementor-image-box-title">Thiết kế nguyên khối</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-4ead9d0 elementor-widget elementor-widget-button"
                                data-id="4ead9d0" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="#">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-icon elementor-align-icon-right">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="elementor-button-text">Bấm vào đây</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-eda3607 e-con-full e-flex e-con e-child" data-id="eda3607"
                data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                <div class="elementor-element elementor-element-85133eb popmake-33 mona-btn mona-btn-2 elementor-widget elementor-widget-button"
                    data-id="85133eb" data-element_type="widget" data-widget_type="button.default">
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
    </section>

    <section class="elementor-element elementor-element-594beed sec-product e-flex e-con-boxed e-con e-parent"
        data-id="594beed" data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-b773a2c e-con-full e-flex e-con e-child" data-id="b773a2c"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="section-filter-products">
                    <div class="container">
                        <div class="section-subtitle">
                            <p>Sản phẩm</p>
                        </div>
                        <div class="section-title">
                            <h2>Sản phẩm lõi lọc của Pureit</h2>
                        </div>
                    </div>
                </div>

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

                                        <div
                                            class="wpb-wps-slider-item post-1392 product type-product status-publish has-post-thumbnail product_cat-loi-loc-thay-the entry  instock shipping-taxable purchasable product-type-simple">
                                            <figure>


                                                <a href="san-pham/loi-loc-nuoc-ultima-gkk1/index.html"
                                                    class="wpb_pro_img_url">
                                                    <img loading="lazy" decoding="async" width="300" height="300"
                                                        src="{{ asset('frontends/assets/images/Ultima_Bo-loc-thay-the-Ultima-1-1-300x300.png') }}"
                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                        alt="" style="width:100%;height:100%;max-width:1000px" />
                                                </a>
                                                <figcaption>


                                                    <a href="san-pham/loi-loc-nuoc-ultima-gkk1/index.html"
                                                        class="wpb-wps-product-title">
                                                        <h3 class="pro_title">Bộ lọc thay thế Ultima Đen GKK1</h3>
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
                                        <div
                                            class="wpb-wps-slider-item post-1494 product type-product status-publish has-post-thumbnail product_cat-loi-loc-thay-the entry last instock shipping-taxable purchasable product-type-simple">
                                            <figure>


                                                <a href="san-pham/bo-loc-thay-the-ultima-gkk2/index.html"
                                                    class="wpb_pro_img_url">
                                                    <img loading="lazy" decoding="async" width="300" height="300"
                                                        src="{{ asset('frontends/assets/images/Ultima_Bo-loc-thay-the-Ultima-2-300x300.png') }}"
                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                        alt="" style="width:100%;height:100%;max-width:1000px" />
                                                </a>
                                                <figcaption>


                                                    <a href="san-pham/bo-loc-thay-the-ultima-gkk2/index.html"
                                                        class="wpb-wps-product-title">
                                                        <h3 class="pro_title">Bộ lọc thay thế Ultima Đen GKK2</h3>
                                                    </a>


                                                    <div class="pro_price_area"><span
                                                            class="woocommerce-Price-amount amount">1.980.000&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </div>



                                                    <div class="wpb_cart_button">
                                                        <div class="woo_btn_add_to_cart_wrapper">
                                                            <div class="chi_tiet"><a
                                                                    href="san-pham/bo-loc-thay-the-ultima-gkk2/index.html"
                                                                    class="mona-btn-hover hover-1">Chi tiết</a>
                                                            </div>
                                                            <div class="mua_ngay"> <a
                                                                    class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                    ngay</a></div>
                                                        </div>
                                                        <a href="index6727.html?add-to-cart=1494" data-quantity="1"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                            data-product_id="1494" data-product_sku=""
                                                            aria-label="Thêm &ldquo;Bộ lọc thay thế Ultima Đen GKK2&rdquo; vào giỏ hàng"
                                                            aria-describedby="" rel="nofollow"></a>
                                                    </div>

                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div
                                            class="wpb-wps-slider-item post-294 product type-product status-publish has-post-thumbnail product_cat-loi-loc-thay-the entry first instock shipping-taxable purchasable product-type-simple">
                                            <figure>


                                                <a href="san-pham/loi-loc-thay-the-ro-pureit-delica-ur5840/index.html"
                                                    class="wpb_pro_img_url">
                                                    <img loading="lazy" decoding="async" width="300" height="300"
                                                        src="{{ asset('frontends/assets/images/lõi-lọc-RO-delica-ur5840-300x300.jpg') }}"
                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                        alt="" style="width:100%;height:100%;max-width:900px" />
                                                </a>
                                                <figcaption>


                                                    <a href="san-pham/loi-loc-thay-the-ro-pureit-delica-ur5840/index.html"
                                                        class="wpb-wps-product-title">
                                                        <h3 class="pro_title">Lõi Lọc RO Máy lọc Âm Tủ Bếp Delica
                                                            UR5840</h3>
                                                    </a>


                                                    <div class="pro_price_area"><span
                                                            class="woocommerce-Price-amount amount">2.500.000&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </div>



                                                    <div class="wpb_cart_button">
                                                        <div class="woo_btn_add_to_cart_wrapper">
                                                            <div class="chi_tiet"><a
                                                                    href="san-pham/loi-loc-thay-the-ro-pureit-delica-ur5840/index.html"
                                                                    class="mona-btn-hover hover-1">Chi tiết</a>
                                                            </div>
                                                            <div class="mua_ngay"> <a
                                                                    class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                    ngay</a></div>
                                                        </div>
                                                        <a href="index0634.html?add-to-cart=294" data-quantity="1"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                            data-product_id="294" data-product_sku=""
                                                            aria-label="Thêm &ldquo;Lõi Lọc RO Máy lọc Âm Tủ Bếp Delica UR5840&rdquo; vào giỏ hàng"
                                                            aria-describedby="" rel="nofollow"></a>
                                                    </div>

                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div
                                            class="wpb-wps-slider-item post-1499 product type-product status-publish has-post-thumbnail product_cat-loi-loc-thay-the entry  instock shipping-taxable purchasable product-type-simple">
                                            <figure>


                                                <a href="san-pham/loi-loc-cto-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                    class="wpb_pro_img_url">
                                                    <img loading="lazy" decoding="async" width="300" height="300"
                                                        src="{{ asset('frontends/assets/images/lõi-lọc-CTO-delica-ur5840-300x300.jpg') }}"
                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                        alt="" style="width:100%;height:100%;max-width:900px" />
                                                </a>
                                                <figcaption>


                                                    <a href="san-pham/loi-loc-cto-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                        class="wpb-wps-product-title">
                                                        <h3 class="pro_title">Lõi Lọc CTO Máy lọc Âm Tủ Bếp Delica
                                                            UR5840</h3>
                                                    </a>


                                                    <div class="pro_price_area"><span
                                                            class="woocommerce-Price-amount amount">550.000&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </div>



                                                    <div class="wpb_cart_button">
                                                        <div class="woo_btn_add_to_cart_wrapper">
                                                            <div class="chi_tiet"><a
                                                                    href="san-pham/loi-loc-cto-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                                    class="mona-btn-hover hover-1">Chi tiết</a>
                                                            </div>
                                                            <div class="mua_ngay"> <a
                                                                    class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                    ngay</a></div>
                                                        </div>
                                                        <a href="index63fa.html?add-to-cart=1499" data-quantity="1"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                            data-product_id="1499" data-product_sku=""
                                                            aria-label="Thêm &ldquo;Lõi Lọc CTO Máy lọc Âm Tủ Bếp Delica UR5840&rdquo; vào giỏ hàng"
                                                            aria-describedby="" rel="nofollow"></a>
                                                    </div>

                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div
                                            class="wpb-wps-slider-item post-1533 product type-product status-publish has-post-thumbnail product_cat-loi-loc-thay-the entry  instock shipping-taxable purchasable product-type-simple">
                                            <figure>


                                                <a href="san-pham/loi-loc-pgp-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                    class="wpb_pro_img_url">
                                                    <img loading="lazy" decoding="async" width="300"
                                                        height="300"
                                                        src="{{ asset('frontends/assets/images/lõi-lọc-PGP-delica-ur5840-300x300.jpg') }}"
                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                        alt="" style="width:100%;height:100%;max-width:900px" />
                                                </a>
                                                <figcaption>


                                                    <a href="san-pham/loi-loc-pgp-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                        class="wpb-wps-product-title">
                                                        <h3 class="pro_title">Lõi Lọc PGP Máy lọc Âm tủ bếp Delica
                                                            UR5840</h3>
                                                    </a>


                                                    <div class="pro_price_area"><span
                                                            class="woocommerce-Price-amount amount">800.000&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </div>



                                                    <div class="wpb_cart_button">
                                                        <div class="woo_btn_add_to_cart_wrapper">
                                                            <div class="chi_tiet"><a
                                                                    href="san-pham/loi-loc-pgp-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                                    class="mona-btn-hover hover-1">Chi tiết</a>
                                                            </div>
                                                            <div class="mua_ngay"> <a
                                                                    class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                    ngay</a></div>
                                                        </div>
                                                        <a href="indexc15d.html?add-to-cart=1533" data-quantity="1"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                            data-product_id="1533" data-product_sku=""
                                                            aria-label="Thêm &ldquo;Lõi Lọc PGP Máy lọc Âm tủ bếp Delica UR5840&rdquo; vào giỏ hàng"
                                                            aria-describedby="" rel="nofollow"></a>
                                                    </div>

                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div
                                            class="wpb-wps-slider-item post-1911 product type-product status-publish has-post-thumbnail product_cat-loi-loc-thay-the entry last instock shipping-taxable purchasable product-type-simple">
                                            <figure>


                                                <a href="san-pham/bo-loc-thay-the-ultima-trang-gkk1/index.html"
                                                    class="wpb_pro_img_url">
                                                    <img loading="lazy" decoding="async" width="300"
                                                        height="300"
                                                        src="{{ asset('frontends/assets/images/1-2-300x300.png') }}"
                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                        alt=""
                                                        style="width:100%;height:100%;max-width:1200px" /> </a>
                                                <figcaption>


                                                    <a href="san-pham/bo-loc-thay-the-ultima-trang-gkk1/index.html"
                                                        class="wpb-wps-product-title">
                                                        <h3 class="pro_title">Bộ lọc thay thế Ultima Trắng GKK1
                                                        </h3>
                                                    </a>


                                                    <div class="pro_price_area"><span
                                                            class="woocommerce-Price-amount amount">1.250.000&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </div>



                                                    <div class="wpb_cart_button">
                                                        <div class="woo_btn_add_to_cart_wrapper">
                                                            <div class="chi_tiet"><a
                                                                    href="san-pham/bo-loc-thay-the-ultima-trang-gkk1/index.html"
                                                                    class="mona-btn-hover hover-1">Chi tiết</a>
                                                            </div>
                                                            <div class="mua_ngay"> <a
                                                                    class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                    ngay</a></div>
                                                        </div>
                                                        <a href="index71d1.html?add-to-cart=1911" data-quantity="1"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                            data-product_id="1911" data-product_sku=""
                                                            aria-label="Thêm &ldquo;Bộ lọc thay thế Ultima Trắng GKK1&rdquo; vào giỏ hàng"
                                                            aria-describedby="" rel="nofollow"></a>
                                                    </div>

                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-c46977b e-con-full e-flex e-con e-child"
                    data-id="c46977b" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-6ef4933 popmake-33 mona-btn mona-btn-2 elementor-invisible elementor-widget elementor-widget-button"
                        data-id="6ef4933" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
                        data-widget_type="button.default">
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

    <section class="elementor-element elementor-element-17d6a84 sec-fb e-flex e-con-boxed e-con e-parent"
        data-id="17d6a84" data-element_type="container" id="y-kien-kh"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-4ba216b e-con-full e-flex e-con e-child" data-id="4ba216b"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-element elementor-element-e19e6f7 e-con-full e-flex e-con e-child"
                    data-id="e19e6f7" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
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
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-10.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-11.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-08.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-02.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-03.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-04.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-05.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-06.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="44" height="44"
                                                        src="{{ asset('frontends/assets/images/nx-07.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:100%;max-width:44px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon portrait'>
                                                    <img loading="lazy" width="224" height="296"
                                                        src="{{ asset('frontends/assets/images/Cao-Văn-Tuấn.jpg') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
                                                        style="width:100%;height:132.14%;max-width:224px;" />
                                                </div>
                                            </figure>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <img loading="lazy" width="100" height="100"
                                                        src="{{ asset('frontends/assets/images/icons8-plus-100.png') }}"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async"
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
                <div class="elementor-element elementor-element-da0ea0b e-con-full e-flex e-con e-child"
                    data-id="da0ea0b" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-56d2697 popmake-33 mona-btn mona-btn-2 elementor-invisible elementor-widget elementor-widget-button"
                        data-id="56d2697" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
                        data-widget_type="button.default">
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
@endsection
