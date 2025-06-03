<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="canonical" href="{{ url()->current() }}" />
<link rel="canonical" href="" />

<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="article" />
<meta property="og:title" content="" />
<meta property="og:description" content="" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="pureit" />
<meta property="article:modified_time" content="{{ now()->toIso8601String() }}" />
<meta property="og:image" content="" />
<meta property="og:image:width" content="1500" />
<meta property="og:image:height" content="1500" />
<meta property="og:image:type" content="image/jpeg" />

<!-- Favicon cho trình duyệt -->
<link rel="icon" href="{{showImage($setting->icon)}}" type="" sizes="32x32">

<!-- Apple Touch Icon -->
<link rel="apple-touch-icon" href="{{showImage($setting->icon)}}">

<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>Pureit Header</title>
