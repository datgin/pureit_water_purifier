<!DOCTYPE html>
<html lang="vi">

<head>

    @include('frontend.layouts.includes.meta')

    @include('frontend.layouts.includes.style')

</head>

<body>
    <!-- ✅ Header -->
    <header>
        @include('frontend.layouts.includes.header')
    </header>

    <!-- ✅ Mobile Offcanvas Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
        @include('frontend.layouts.includes.offcanvas')
    </div>

    <main>
        @yield('content')
    </main>

    <!-- Search Overlay -->
    <div id="searchOverlay" class="search-overlay">
        @include('frontend.layouts.includes.search-overlay')
    </div>

    <!-- ✅ Footer -->
    <footer class="footer">
        @include('frontend.layouts.includes.footer')
    </footer>


    {{-- Footer --}}
    <div data-elementor-type="footer" data-elementor-id="728" class="elementor elementor-728 elementor-location-footer">
        @include('frontend.layouts.includes.script')
    </div>

    <div id="wpcp-error-message" class="msgmsg-box-wpcp hideme"><span>error: </span>Content is protected !!</div>


    {{-- Tư vấn --}}
    <div id="pum-33" class="pum pum-overlay pum-theme-627 pum-theme-popup-register popmake-overlay click_open"
        data-popmake="{&quot;id&quot;:33,&quot;slug&quot;:&quot;popup-register&quot;,&quot;theme_id&quot;:627,&quot;cookies&quot;:[],&quot;triggers&quot;:[{&quot;type&quot;:&quot;click_open&quot;,&quot;settings&quot;:{&quot;cookie_name&quot;:&quot;&quot;,&quot;extra_selectors&quot;:&quot;&quot;,&quot;do_default&quot;:true}}],&quot;mobile_disabled&quot;:null,&quot;tablet_disabled&quot;:null,&quot;meta&quot;:{&quot;display&quot;:{&quot;stackable&quot;:false,&quot;overlay_disabled&quot;:false,&quot;scrollable_content&quot;:false,&quot;disable_reposition&quot;:false,&quot;size&quot;:&quot;tiny&quot;,&quot;responsive_min_width&quot;:&quot;0%&quot;,&quot;responsive_min_width_unit&quot;:false,&quot;responsive_max_width&quot;:&quot;100%&quot;,&quot;responsive_max_width_unit&quot;:false,&quot;custom_width&quot;:&quot;640px&quot;,&quot;custom_width_unit&quot;:false,&quot;custom_height&quot;:&quot;380px&quot;,&quot;custom_height_unit&quot;:false,&quot;custom_height_auto&quot;:false,&quot;location&quot;:&quot;center&quot;,&quot;position_from_trigger&quot;:false,&quot;position_top&quot;:&quot;100&quot;,&quot;position_left&quot;:&quot;0&quot;,&quot;position_bottom&quot;:&quot;0&quot;,&quot;position_right&quot;:&quot;0&quot;,&quot;position_fixed&quot;:false,&quot;animation_type&quot;:&quot;fade&quot;,&quot;animation_speed&quot;:&quot;350&quot;,&quot;animation_origin&quot;:&quot;center top&quot;,&quot;overlay_zindex&quot;:false,&quot;zindex&quot;:&quot;1999999999&quot;},&quot;close&quot;:{&quot;text&quot;:&quot;&quot;,&quot;button_delay&quot;:&quot;0&quot;,&quot;overlay_click&quot;:false,&quot;esc_press&quot;:false,&quot;f4_press&quot;:false},&quot;click_open&quot;:[]}}"
        role="dialog" aria-modal="false" aria-labelledby="pum_popup_title_33">
        {{-- @include('frontend.layouts.partials.suport') --}}
    </div>

    {{-- Giảm giá --}}
    {{-- <div id="pum-1443"
        class="pum pum-overlay pum-theme-1445 pum-theme-popup-home popmake-overlay auto_open click_open"
        data-popmake="{&quot;id&quot;:1443,&quot;slug&quot;:&quot;popup-home&quot;,&quot;theme_id&quot;:1445,&quot;cookies&quot;:[],&quot;triggers&quot;:[{&quot;type&quot;:&quot;auto_open&quot;,&quot;settings&quot;:{&quot;delay&quot;:2000}},{&quot;type&quot;:&quot;click_open&quot;,&quot;settings&quot;:{&quot;extra_selectors&quot;:&quot;&quot;,&quot;cookie_name&quot;:null}}],&quot;mobile_disabled&quot;:null,&quot;tablet_disabled&quot;:null,&quot;meta&quot;:{&quot;display&quot;:{&quot;stackable&quot;:&quot;1&quot;,&quot;overlay_disabled&quot;:false,&quot;scrollable_content&quot;:false,&quot;disable_reposition&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;responsive_min_width&quot;:&quot;0%&quot;,&quot;responsive_min_width_unit&quot;:false,&quot;responsive_max_width&quot;:&quot;100%&quot;,&quot;responsive_max_width_unit&quot;:false,&quot;custom_width&quot;:&quot;640px&quot;,&quot;custom_width_unit&quot;:false,&quot;custom_height&quot;:&quot;380px&quot;,&quot;custom_height_unit&quot;:false,&quot;custom_height_auto&quot;:false,&quot;location&quot;:&quot;center&quot;,&quot;position_from_trigger&quot;:false,&quot;position_top&quot;:&quot;100&quot;,&quot;position_left&quot;:&quot;0&quot;,&quot;position_bottom&quot;:&quot;0&quot;,&quot;position_right&quot;:&quot;0&quot;,&quot;position_fixed&quot;:false,&quot;animation_type&quot;:&quot;fade&quot;,&quot;animation_speed&quot;:&quot;350&quot;,&quot;animation_origin&quot;:&quot;center top&quot;,&quot;overlay_zindex&quot;:false,&quot;zindex&quot;:&quot;1999999999&quot;},&quot;close&quot;:{&quot;text&quot;:&quot;&quot;,&quot;button_delay&quot;:&quot;0&quot;,&quot;overlay_click&quot;:false,&quot;esc_press&quot;:false,&quot;f4_press&quot;:false},&quot;click_open&quot;:[]}}"
        role="dialog" aria-modal="false"> --}}

    @include('frontend.layouts.partials.discount')

    </div>
    <!-- CSS -->

    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->




    <!-- End Meta Pixel Event Code -->
    <div id='fb-pxl-ajax-code'></div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('frontend.layouts.includes.script')

    <script>
        jQuery(document).ready(function() {
            var listItem = document.querySelector('.acf-prod-ques-list');
            var item = document.querySelectorAll('.acf-prod-ques-title');
            if (listItem) {
                item.forEach(function(items) {
                    items.onclick = function() {
                        items.parentElement.classList.toggle('active');
                    };
                })
            }
        });
    </script>

    <script>
        document.body.classList.remove("no-js");
    </script>
    <script>
        if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/index.html')) {
            document.body.classList.add('is-IE');
        }
    </script>
    <script src="{{ asset('frontends/assets/js/sweetalert2.mince14.js') }}" defer></script>
    <script src="{{ asset('frontends/assets/js/jquery.blockUI.minff4f.js') }}" defer></script>

    <script id='cf7-popups-frontend-js-extra'>
        var cf7_popups_val = {
            "msg1": "G\u1eedi kh\u00f4ng th\u00e0nh c\u00f4ng",
            "msg2": "H\u00e3y ki\u1ec3m tra c\u00e1c th\u00f4ng tin \u0111\u00e3 nh\u1eadp",
            "msg3": "Error",
            "msg4": "Failed to send email because possible spam activity has been detected.",
            "msg5": "Failed to send email.",
            "msg6": "Th\u00f4ng tin c\u1ee7a qu\u00fd kh\u00e1ch h\u00e0ng \n\u0111\u00e3 \u0111\u01b0\u1ee3c ghi nh\u1eadn",
            "msg7": "C\u1ea3m \u01a1n Qu\u00fd kh\u00e1ch \u0111\u00e3 g\u1eedi th\u00f4ng tin. Pureit s\u1ebd li\u00ean l\u1ea1c l\u1ea1i Qu\u00fd kh\u00e1ch trong th\u1eddi gian s\u1edbm nh\u1ea5t"
        };
    </script>
    <script id='contact-form-7-js-extra'>
        var wpcf7 = {
            "api": {
                "root": "https:\/\/pureitvn-official.com\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            }
        };
        var wpcf7 = {
            "api": {
                "root": "https:\/\/pureitvn-official.com\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            }
        };
    </script>
    <script src="{{ asset('frontends/assets/js/jquery.sticky.min2f56.js') }}" defer></script>
    <script>
        /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window
            .addEventListener("hashchange", (function() {
                var t, e = location.hash.substring(1);
                /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (
                    /^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
            }), !1);
    </script>

    >>>>>>> cfe3fd761e453b74b3b1c9b57e3d12fa2e151dc6
</body>

</html>
