<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? $configs->translations[0]->title }}</title>
    <meta name="title" content="{{ $title ?? $configs->translations[0]->title }}">
    <meta name="description" content="{{ $description ?? $configs->translations[0]->description }}">

    <meta lang="{{ app()->getLocale() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="{{ $title ?? $configs->translations[0]->title }}">
    <meta property="og:description" content="{{ $description ?? $configs->translations[0]->description }}">
    <meta property="og:image" content="{{ $meta_image ?? $configs->logoUrl }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="{{ $meta_image ?? $configs->logoUrl }}">
    <meta property="twitter:url" content="{{ URL::current() }}">
    <meta property="twitter:title" content="{{ $title ?? $configs->translations[0]->title }}">
    <meta property="twitter:description" content="{{ $description ?? $configs->translations[0]->description }}">
    <meta property="twitter:image" content="{{ $meta_image ?? $configs->logoUrl }}">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="shortcut icon">

    @yield('style')
</head>

<body>
@include('front.includes.navbar')

@yield('content')

@include('front.includes.footer')

@yield('bt-javascript')

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('bb-javascript')

</body>
</html>
