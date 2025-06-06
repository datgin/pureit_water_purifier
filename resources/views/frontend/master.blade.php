<!DOCTYPE html>
<html lang="vi">

<head>

    @include('frontend.layouts.includes.meta')

    @include('frontend.layouts.includes.style')
    {!! $setting->script_head !!}

</head>

<body>
    <!-- ✅ Header -->
    {!! $setting->script_body !!}

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

    <div class="floating-buttons">
        <a href="https://zalo.me/{{ preg_replace('/[^0-9+]/', '', $setting->hotline) }}" target="_blank" title="Chat Zalo">
            <img src="{{asset('frontend/assets/image/Icon_of_Zalo.svg-removebg-preview.png')}}" alt="Zalo">
        </a>
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $setting->hotline) }}" title="Gọi hotline">
            <img src="{{asset('frontend/assets/image/call-hot-line-online-customer-support-customer-consultation-illustration-vector-removebg-preview.png')}}" alt="Hotline">
        </a>
    </div>

    <!-- Nút scroll top -->
    <!-- Nút scroll top dùng icon -->
    <div class="scroll-top-btn" id="scrollTopBtn" title="Lên đầu trang">
        <i class="bi bi-arrow-up-circle-fill" style="font-size: 30px; color: #333;"></i>
    </div>


    @include('frontend.pages.popup.index')


    <!-- ✅ Footer -->
    <footer class="footer">
        @include('frontend.layouts.includes.footer')
        {!! $setting->script_footer !!}

    </footer>

    @include('frontend.layouts.includes.script')
</body>

</html>
