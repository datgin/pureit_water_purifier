@extends('frontend.master')
@section('content')
    <div data-elementor-type="product" data-elementor-id="302"
        class="elementor elementor-302 elementor-location-single post-1426 product type-product status-publish has-post-thumbnail product_cat-may-loc-nuoc entry first instock sale shipping-taxable purchasable product-type-simple product">
        <div class="elementor-element elementor-element-93570ec e-flex e-con-boxed e-con e-parent" data-id="93570ec"
            data-element_type="container"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">

                <div class="elementor-element elementor-element-6bdf4a7 e-con-full e-flex e-con e-child" data-id="6bdf4a7"
                    data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-a6ed62b yes elementor-widget elementor-widget-woocommerce-product-images"
                        data-id="a6ed62b" data-element_type="widget" data-widget_type="woocommerce-product-images.default">
                        <div class="elementor-widget-container">
                            <link rel="stylesheet" href="{{ asset('frontends/assets/css/widget-woocommerce.min.css') }}">
                            <span class="onsale">{{ $product->discount_value }}%</span>

                            <div class="woo-product-gallery-slider woocommerce-product-gallery wpgs--with-images images">
                                <div class="wpgs-for">
                                    @foreach ($product->images as $item)
                                        <div class="woocommerce-product-gallery__image single-product-main-image">
                                            <a class="wpgs-lightbox-icon" href="{{ asset('storage/' . $item->image) }}"
                                                data-fancybox="wpgs-lightbox" data-caption="Ảnh sản phẩm">
                                                <img loading="lazy" width="600" height="600"
                                                    src="{{ asset('storage/' . $item->image) }}"
                                                    class="attachment-shop_single size-shop_single wp-post-image"
                                                    alt="" data-zoom-image="{{ asset('storage/' . $item->image) }}"
                                                    style="width:100%;height:100%;max-width:1500px;" />
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="wpgs-nav">
                                    @foreach ($product->images as $item)
                                        <div>
                                            <img loading="lazy" width="100" height="100"
                                                src="{{ asset('storage/' . $item->image) }}" class="wpgs-thumb-main-image"
                                                alt="" style="width:100%;height:100%;max-width:1500px;" />
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="elementor-element elementor-element-08c6938 e-con-full e-flex e-con e-child" data-id="08c6938"
                    data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-4ff5bbc e-con-full e-flex e-con e-child"
                        data-id="4ff5bbc" data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-4ccd9ca elementor-widget elementor-widget-woocommerce-product-title elementor-page-title elementor-widget-heading"
                            data-id="4ccd9ca" data-element_type="widget"
                            data-widget_type="woocommerce-product-title.default">
                            <div class="elementor-widget-container">
                                <style>
                                    /*! elementor - v3.17.0 - 08-11-2023 */
                                    .elementor-heading-title {
                                        padding: 0;
                                        margin: 0;
                                        line-height: 1
                                    }

                                    .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                                        color: inherit;
                                        font-size: inherit;
                                        line-height: inherit
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                        font-size: 15px
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                        font-size: 19px
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                        font-size: 29px
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                        font-size: 39px
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                        font-size: 59px
                                    }
                                </style>
                                <h1 class="product_title entry-title elementor-heading-title elementor-size-default">Máy
                                    lọc nước âm tủ bếp Delica UR5840</h1>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-b77e026 elementor-widget elementor-widget-woocommerce-product-short-description"
                            data-id="b77e026" data-element_type="widget"
                            data-widget_type="woocommerce-product-short-description.default">
                            <div class="elementor-widget-container">
                                <div class="woocommerce-product-details__short-description">
                                    <p>&#8211; Công nghệ DURAViva™ lọc vượt trội kèm tia UV khử khuẩn tới 99,99%<br />
                                        &#8211; Tốc độ lọc 2L/phút, đáp ứng đa dạng nhu cầu sử dụng nước sạch<br />
                                        &#8211; Vòi điện tử diệt khuẩn UV thông minh: hiển thị cảnh báo thay lọc và chất
                                        lượng nguồn nước<br />
                                        &#8211; Thiết kế sang trọng, nhỏ tương đương tờ giấy A3, tiết kiệm 70% không
                                        gian tủ bếp<br />
                                        &#8211; Tỷ lệ thu hồi nước&gt;60%<br />
                                        &#8211; Chất liệu nhựa an toàn thực phẩm, dễ dàng thay lọc tại nhà<br />
                                        &#8211; Cảnh báo rò rỉ cùng hệ thống bơm trực tiếp không cần bình chưa<br />
                                        &#8211; Hệ thống sục rửa tự động kéo dài tuổi thọ bộ lọc tới 3 năm</p>
                                    <p><span style="font-size: 8pt;">(*) Theo thông tin chính thức từ Nhà sản
                                            xuất</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-587baea e-con-full e-flex e-con e-child"
                        data-id="587baea" data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                        <div class="elementor-element elementor-element-1894ac0 single-product-cart  e-con-full e-flex e-con e-child"
                            data-id="1894ac0" data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                            <div class="elementor-element elementor-element-a06cb61 price-cus elementor-widget elementor-widget-woocommerce-product-price"
                                data-id="a06cb61" data-element_type="widget"
                                data-widget_type="woocommerce-product-price.default">
                                <div class="elementor-widget-container">
                                    <p class="price"><del aria-hidden="true"><span
                                                class="woocommerce-Price-amount amount"><bdi>18.900.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></del>
                                        <ins><span class="woocommerce-Price-amount amount"><bdi>15.990.000&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins>
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-b093fbe mona-btn popmake-33 elementor-widget elementor-widget-button"
                                data-id="b093fbe" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-size-lg" role="button">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-text">Mua ngay</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-2285566 e-con-full e-flex e-con e-parent" data-id="2285566"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}"
            data-core-v316-plus="true">
            <div class="elementor-element elementor-element-65ca6fc e-con-full acf_single_content e-flex e-con e-child"
                data-id="65ca6fc" data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                <div class="elementor-element elementor-element-bab30ff elementor-widget elementor-widget-text-editor"
                    data-id="bab30ff" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <section class="acf-prod-group-desc">
                            <!-- kiểm tra check lõi lọc -->
                            <!-- check tính năng -->
                            <section class="elementor-section elementor-section-boxed sec-tinh-nang">
                                <div class="elementor-container">
                                    <div class="acf-prod-tn-wrap">
                                        <h3 class="acf-prod-title">Tính năng, đặc điểm</h3>
                                        <div class="acf-prod-tn-img">
                                            <img src="../../wp-content/uploads/2023/12/Pureit_product_front-right-angle_2000x2000_master-1-e1701421659157.png"
                                                alt="Tính năng, đặc điểm">
                                        </div>
                                        <div class="acf-prod-tn-list">
                                            <div class="acf-prod-tn-item">
                                                <div class="acf-prod-tn-icon">
                                                </div>
                                                <div class="acf-prod-tn-title">
                                                    <p>Thiết kế không bình chứa phù hợp với không gian sống nhỏ gọn</p>
                                                </div>
                                                <div class="acf-prod-tn-desc">
                                                    <p>Nhỏ gọn hơn đến 70% so với nhiều máy lọc nước RO có bình chứa
                                                        nước truyền thống và tiết kiệm không gian bên dưới bồn rửa.</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-tn-item">
                                                <div class="acf-prod-tn-icon">
                                                </div>
                                                <div class="acf-prod-tn-title">
                                                    <p>Tỷ lệ thu hồi nước 60%</p>
                                                </div>
                                                <div class="acf-prod-tn-desc">
                                                    <p>Cung cấp nước hiệu quả, lọc được nhiều nước tinh khiết hơn và ít
                                                        nước thải hơn.</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-tn-item">
                                                <div class="acf-prod-tn-icon">
                                                </div>
                                                <div class="acf-prod-tn-title">
                                                    <p>Chất liệu </p>
                                                </div>
                                                <div class="acf-prod-tn-desc">
                                                    <p>Không chứa BPA.
                                                        Mọi bộ phận nhựa đều không chứa BPA giúp đảm bảo việc bảo vệ sức
                                                        khỏe cho những đứa trẻ thân yêu của bạn.</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-tn-item">
                                                <div class="acf-prod-tn-icon">
                                                </div>
                                                <div class="acf-prod-tn-title">
                                                    <p>Cảnh báo tuổi thọ lõi lọc</p>
                                                </div>
                                                <div class="acf-prod-tn-desc">
                                                    <p>Cảnh báo thời điểm cần thay thế bộ lọc để tối ưu tính an toàn khi
                                                        sử dụng,</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-tn-item">
                                                <div class="acf-prod-tn-icon">
                                                </div>
                                                <div class="acf-prod-tn-title">
                                                    <p>Dễ dàng thay thế bộ lọc DIY</p>
                                                </div>
                                                <div class="acf-prod-tn-desc">
                                                    <p>3 lõi lọc tự dễ dàng thay lọc tại nhà</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-tn-item">
                                                <div class="acf-prod-tn-icon">
                                                </div>
                                                <div class="acf-prod-tn-title">
                                                    <p>Thiết kế nguyên khối</p>
                                                </div>
                                                <div class="acf-prod-tn-desc">
                                                    <p>Sản phẩm được thiết kế nguyên khối cho ra nước lọc tinh khiết và
                                                        hạn chế nguy cơ rò rỉ nước. Thiết bị cảnh báo nguy cơ rò rỉ nước
                                                        đính kèm.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end check tính năng -->
                            <!-- check thông số -->
                            <section class="elementor-section elementor-section-boxed sec-thong-so">
                                <div class="elementor-container">
                                    <div class="acf-prod-ts-wrap">
                                        <h3 class="acf-prod-title">Thông số kỹ thuật</h3>
                                        <div class="acf-prod-ts-list">
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Mức độ lọc sạch chất rắn hòa tan trong nước:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> >90%</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Tốc độ lọc:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 2L/phút</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Cảnh báo rò rỉ :</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> Có</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Công Nghệ Lọc:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> DURAViva</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Hệ Thống Lọc:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> PGP+RO+CTO</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Tỷ lệ loại bỏ vi khuẩn và vi-rút:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 99%</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Tỷ lệ loại bỏ kim loại nặng:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 99%</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Tỷ lệ loại bỏ chất ô nhiễm công nghiệp:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 99%</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> GPD:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 800G</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Công suất lọc:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 8000L</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Tỷ lệ thu hồi nước:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 60%</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Kích thước sản phẩm:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 435 (Sâu)×155 (Rộng)×365 (Cao)（mm)</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Chất liệu vòi:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> Inox 304, thép không rỉ</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Chỉ báo vòng đời bộ lọc:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> Có</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Bộ lọc DIY (Tự thay thế):</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> 3 lõi lọc &#8211; dễ dàng tự thay thế tại nhà</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Chức năng tự xả:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> Có</p>
                                                </div>
                                            </div>
                                            <div class="acf-prod-ts-item">
                                                <div class="acf-prod-ts-title">
                                                    <p> Tuổi thọ đề xuất của bộ lọc:</p>
                                                </div>
                                                <div class="acf-prod-ts-desc">
                                                    <p> Lõi lọc RO: 3 năm
                                                        Lõi lọc PGP/ CTO: 1 năm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- end check thông số -->
                            <section class="elementor-section elementor-section-boxed sec-related-product">
                                <div class="elementor-container">
                                    <div class="sec-related-product-wrap">
                                        <div class="sec-related-product-title">
                                            <h3>Lõi lọc thay thế</h3>
                                        </div>
                                        <div class="sec-related-product-item">

                                            <div class="woocommerce columns-3 ">
                                                <ul class="products columns-3">
                                                    <li
                                                        class="entry product type-product post-294 status-publish first instock product_cat-loi-loc-thay-the has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                                        <a href="../loi-loc-thay-the-ro-pureit-delica-ur5840/index.html"
                                                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img
                                                                loading="lazy" width="300" height="300"
                                                                src="../../wp-content/uploads/2023/11/lo%cc%83i-lo%cc%a3c-RO-delica-ur5840-300x300.jpg"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                alt="" decoding="async"
                                                                srcset="https://pureitvn-official.com/wp-content/uploads/2023/11/lõi-lọc-RO-delica-ur5840-300x300.jpg 300w, https://pureitvn-official.com/wp-content/uploads/2023/11/lõi-lọc-RO-delica-ur5840-150x150.jpg 150w, https://pureitvn-official.com/wp-content/uploads/2023/11/lõi-lọc-RO-delica-ur5840-768x768.jpg 768w, https://pureitvn-official.com/wp-content/uploads/2023/11/lõi-lọc-RO-delica-ur5840-600x600.jpg 600w, https://pureitvn-official.com/wp-content/uploads/2023/11/lõi-lọc-RO-delica-ur5840-100x100.jpg 100w, https://pureitvn-official.com/wp-content/uploads/2023/11/lõi-lọc-RO-delica-ur5840.jpg 900w"
                                                                sizes="(max-width: 300px) 100vw, 300px"
                                                                style="width:100%;height:100%;max-width:900px;" />
                                                            <h2 class="woocommerce-loop-product__title">Lõi Lọc RO Máy
                                                                lọc Âm Tủ Bếp Delica UR5840</h2>
                                                            <span class="price"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>2.500.000&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></span>
                                                        </a>
                                                        <div class="woo_btn_add_to_cart_wrapper">
                                                            <div class="chi_tiet"><a
                                                                    href="../loi-loc-thay-the-ro-pureit-delica-ur5840/index.html"
                                                                    class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                            <div class="mua_ngay"> <a
                                                                    class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                    ngay</a></div>
                                                        </div>
                                                        <a href="index0634.html?add-to-cart=294" data-quantity="1"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                            data-product_id="294" data-product_sku=""
                                                            aria-label="Thêm &ldquo;Lõi Lọc RO Máy lọc Âm Tủ Bếp Delica UR5840&rdquo; vào giỏ hàng"
                                                            aria-describedby="" rel="nofollow"></a>
                                                    </li>
                                                    <li
                                                        class="entry product type-product post-1499 status-publish instock product_cat-loi-loc-thay-the has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                                        <a href="../loi-loc-cto-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img
                                                                loading="lazy" width="300" height="300"
                                                                src="../../wp-content/uploads/2023/12/lo%cc%83i-lo%cc%a3c-CTO-delica-ur5840-300x300.jpg"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                alt="" decoding="async"
                                                                srcset="https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-CTO-delica-ur5840-300x300.jpg 300w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-CTO-delica-ur5840-150x150.jpg 150w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-CTO-delica-ur5840-768x768.jpg 768w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-CTO-delica-ur5840-600x600.jpg 600w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-CTO-delica-ur5840-100x100.jpg 100w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-CTO-delica-ur5840.jpg 900w"
                                                                sizes="(max-width: 300px) 100vw, 300px"
                                                                style="width:100%;height:100%;max-width:900px;" />
                                                            <h2 class="woocommerce-loop-product__title">Lõi Lọc CTO Máy
                                                                lọc Âm Tủ Bếp Delica UR5840</h2>
                                                            <span class="price"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>550.000&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></span>
                                                        </a>
                                                        <div class="woo_btn_add_to_cart_wrapper">
                                                            <div class="chi_tiet"><a
                                                                    href="../loi-loc-cto-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                                    class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                            <div class="mua_ngay"> <a
                                                                    class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                    ngay</a></div>
                                                        </div>
                                                        <a href="index63fa.html?add-to-cart=1499" data-quantity="1"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                            data-product_id="1499" data-product_sku=""
                                                            aria-label="Thêm &ldquo;Lõi Lọc CTO Máy lọc Âm Tủ Bếp Delica UR5840&rdquo; vào giỏ hàng"
                                                            aria-describedby="" rel="nofollow"></a>
                                                    </li>
                                                    <li
                                                        class="entry product type-product post-1533 status-publish last instock product_cat-loi-loc-thay-the has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                                        <a href="../loi-loc-pgp-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img
                                                                loading="lazy" width="300" height="300"
                                                                src="../../wp-content/uploads/2023/12/lo%cc%83i-lo%cc%a3c-PGP-delica-ur5840-300x300.jpg"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                alt="" decoding="async"
                                                                srcset="https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-PGP-delica-ur5840-300x300.jpg 300w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-PGP-delica-ur5840-150x150.jpg 150w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-PGP-delica-ur5840-768x768.jpg 768w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-PGP-delica-ur5840-600x600.jpg 600w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-PGP-delica-ur5840-100x100.jpg 100w, https://pureitvn-official.com/wp-content/uploads/2023/12/lõi-lọc-PGP-delica-ur5840.jpg 900w"
                                                                sizes="(max-width: 300px) 100vw, 300px"
                                                                style="width:100%;height:100%;max-width:900px;" />
                                                            <h2 class="woocommerce-loop-product__title">Lõi Lọc PGP Máy
                                                                lọc Âm tủ bếp Delica UR5840</h2>
                                                            <span class="price"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>800.000&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></span>
                                                        </a>
                                                        <div class="woo_btn_add_to_cart_wrapper">
                                                            <div class="chi_tiet"><a
                                                                    href="../loi-loc-pgp-may-loc-am-tu-bep-delica-ur5840/index.html"
                                                                    class="mona-btn-hover hover-1">Chi tiết</a> </div>
                                                            <div class="mua_ngay"> <a
                                                                    class="popmake-33 mona-btn-hover  hover-2">Mua
                                                                    ngay</a></div>
                                                        </div>
                                                        <a href="indexc15d.html?add-to-cart=1533" data-quantity="1"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                            data-product_id="1533" data-product_sku=""
                                                            aria-label="Thêm &ldquo;Lõi Lọc PGP Máy lọc Âm tủ bếp Delica UR5840&rdquo; vào giỏ hàng"
                                                            aria-describedby="" rel="nofollow"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- File hướng dẫn -->
                            <section class="elementor-section elementor-section-boxed sec-download">
                                <div class="elementor-container">
                                    <div class="acf-prod-download-wrap">
                                        <div class="acf-prod-download-title">
                                            <h3>Hướng dẫn sử dụng sản phẩm</h3>
                                        </div>
                                        <div class="acf-prod-download-btn">
                                            <a href="../../wp-content/uploads/2023/11/HDSD-Delica-UR5840-Tie%cc%82%cc%81ng-Vie%cc%a3%cc%82t.pdf"
                                                alt="hướng dẫn sử dụng sản phẩm" download>Tải PDF VN<img
                                                    src="{{asset('frontends/assets/images/icon_down.png')}}"
                                                    width="20"></a>
                                            <a href="../../wp-content/uploads/2023/11/Manual-Delica-UR5840.pdf"
                                                alt="hướng dẫn sử dụng sản phẩm" download>Tải PDF EN<img
                                                    src="{{asset('frontends/assets/images/icon_down.png')}}"
                                                    width="20"></a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
