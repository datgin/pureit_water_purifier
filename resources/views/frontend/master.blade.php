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

    @include('frontend.pages.popup.index')
        

    <!-- ✅ Footer -->
    <footer class="footer">
        @include('frontend.layouts.includes.footer')
        {!! $setting->script_footer !!}

    </footer>

    @include('frontend.layouts.includes.script')
</body>

</html>
