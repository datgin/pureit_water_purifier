@extends('frontend.master');
@section('content')
    <div data-elementor-type="wp-page" data-elementor-id="1148" class="elementor elementor-1148">
        <div class="elementor-element elementor-element-23d669 e-con-full e-flex e-con e-parent" data-id="23d669"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}"
            data-core-v316-plus="true">
            <div class="elementor-element elementor-element-3ec522e0 e-con-full e-flex e-con e-child" data-id="3ec522e0"
                data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                <div class="elementor-element elementor-element-440d06f3 sec-archive-product-banner elementor-widget elementor-widget-image"
                    data-id="440d06f3" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <img decoding="async" width="1920" height="497"
                            src="../wp-content/uploads/2023/11/b6df7eede994ed1377548649c671f4a4-1.png"
                            class="attachment-full size-full wp-image-315" alt=""
                            srcset="https://pureitvn-official.com/wp-content/uploads/2023/11/b6df7eede994ed1377548649c671f4a4-1.png 1920w, https://pureitvn-official.com/wp-content/uploads/2023/11/b6df7eede994ed1377548649c671f4a4-1-300x78.png 300w, https://pureitvn-official.com/wp-content/uploads/2023/11/b6df7eede994ed1377548649c671f4a4-1-1024x265.png 1024w, https://pureitvn-official.com/wp-content/uploads/2023/11/b6df7eede994ed1377548649c671f4a4-1-768x199.png 768w, https://pureitvn-official.com/wp-content/uploads/2023/11/b6df7eede994ed1377548649c671f4a4-1-1536x398.png 1536w, https://pureitvn-official.com/wp-content/uploads/2023/11/b6df7eede994ed1377548649c671f4a4-1-1568x406.png 1568w, https://pureitvn-official.com/wp-content/uploads/2023/11/b6df7eede994ed1377548649c671f4a4-1-600x155.png 600w"
                            sizes="(max-width: 1920px) 100vw, 1920px" style="width:100%;height:25.89%;max-width:1920px" />
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-62e566e4 e-flex e-con-boxed e-con e-parent" data-id="62e566e4"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-3f8bb745 e-con-full e-flex e-con e-child" data-id="3f8bb745"
                    data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-99a30b9 elementor-widget elementor-widget-page-title"
                        data-id="99a30b9" data-element_type="widget" data-widget_type="page-title.default">
                        <div class="elementor-widget-container">

                            <div class="hfe-page-title hfe-page-title-wrapper elementor-widget-heading">

                                <a href="{{ route('product.list') }}">
                                    <h2 class="elementor-heading-title elementor-size-default">

                                        Máy lọc nước
                                    </h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-1b2dcd2d e-flex e-con-boxed e-con e-parent" data-id="1b2dcd2d"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-59de74 e-con-full e-flex e-con e-child" data-id="59de74"
                    data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-67a218a9 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-grid-4 elementor-products-grid elementor-wc-products elementor-show-pagination-border-yes elementor-widget elementor-widget-woocommerce-products"
                        data-id="67a218a9" data-element_type="widget" data-widget_type="woocommerce-products.default">
                        <div class="elementor-widget-container">
                            <link rel="stylesheet"
                                href="../wp-content/plugins/elementor-pro/assets/css/widget-woocommerce.min.css">
                            <div class="woocommerce columns-4 ">
                                <div class="woocommerce-notices-wrapper"></div>
                                <ul class="products elementor-grid columns-4">
                                    @foreach ($products as $item)
                                        <li class="entry product type-product">
                                            <a href="{{ route('product.detail', $item->slug) }}"
                                                class="woocommerce-LoopProduct-link woocommerce-loop-product__link">

                                                <span class="onsale">{{ $item->discount_value }}%</span>
                                                <img loading="lazy" width="300" height="300"
                                                    src="{{ asset('storage/' . $item->image) }}"
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                    alt="" style="width:100%;height:100%;max-width:1500px;" />

                                                <h2 class="woocommerce-loop-product__title">{{ $item->name }}</h2>

                                                <div class="pro_price_area">
                                                    @if ($item->final_price < $item->price && $item->final_price > 0)
                                                        <del>{{ number_format($item->price, 0, ',', '.') }} ₫</del>
                                                        <ins>{{ number_format($item->final_price, 0, ',', '.') }} ₫</ins>
                                                    @else
                                                        <span>{{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                                    @endif
                                                </div>
                                            </a>
                                            <div class="woo_btn_add_to_cart_wrapper">
                                                <div class="chi_tiet">
                                                    <a href="{{ route('product.detail', $item->slug) }}"
                                                        class="mona-btn-hover hover-1">Chi tiết</a>
                                                </div>
                                                <div class="mua_ngay">
                                                    <a class="popmake-33 mona-btn-hover hover-2">Mua ngay</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
