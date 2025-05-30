<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{-- <link rel="icon" href="{{ showImage($settings->icon) }}" sizes="32x32" />
<link rel="icon" href="{{ showImage($settings->icon) }}" sizes="192x192" /> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">


<!-- CSS Files -->

<link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/assets/css/plugins.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/assets/css/kaiadmin.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/assets/css/image-uploader.min.css') }}" />
<link rel="stylesheet" href="{{ asset('global/css/toastr.css') }}" />

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
{{-- <style>
    * {
    outline: 1px solid red;
}

</style> --}}

<style>
    #actionSelect {
        border-radius: 4px 0 0 4px;
    }

    #applyAction {
        border-radius: 0px 4px 4px 0px;
    }
</style>

@stack('styles')
