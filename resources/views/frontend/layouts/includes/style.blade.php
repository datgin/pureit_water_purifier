<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;600;700&display=swap" rel="stylesheet" />

<link href="{{ asset('global/css/bootstrap.min.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

<link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" />

<link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />

<link rel="stylesheet"
    href="{{ asset('frontend/assets/css/style.css') }}?v={{ filemtime(public_path('frontend/assets/css/style.css')) }}" />

@stack('styles')
