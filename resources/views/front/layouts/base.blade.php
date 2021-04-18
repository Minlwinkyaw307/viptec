<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viptec | Profesyonel Maket Bıçakları</title>
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
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('bb-javascript')

</body>
</html>
