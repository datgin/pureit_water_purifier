<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;600;700&display=swap" rel="stylesheet" />

<link href="{{ asset('global/css/bootstrap.min.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

<link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" />

<link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/popup.css') }}" />

<link rel="stylesheet"
    href="{{ asset('frontend/assets/css/style.css') }}?v={{ filemtime(public_path('frontend/assets/css/style.css')) }}" />

@stack('styles')

<style>
    .floating-buttons {
        position: fixed;
        right: 20px;
        bottom: 100px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        z-index: 9999;
    }

    .floating-buttons a,
    .scroll-top-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s;
        cursor: pointer;
    }

    .floating-buttons a:hover,
    .scroll-top-btn:hover {
        transform: scale(1.1);
    }

    .floating-buttons img,
    .scroll-top-btn img {
        width: 30px;
        height: 30px;
    }

    .scroll-top-btn {
        display: none;
        position: fixed;
        bottom: 30px;
        right: 20px;
    }
</style>
