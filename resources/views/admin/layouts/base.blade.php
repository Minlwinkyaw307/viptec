<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/panel/css/main.css') }}">

    @yield('style')
</head>
<body class="preload">

@include('admin.includes.navbar')

<main class="content relative">
    <header class="header flex items-center justify-between mb-6">
        <div class="header-left">
            <div class="back-next">
                <ul class="flex">
                    <li>
                        <button class="{{ session('lang') == 'tr' ? 'button-first' : '' }} focus:outline-none link-button" data-link="{{ route('admin.language.change', ['lang' => 'tr']) }}">
                            TR
                        </button>
                    </li>
                    <li>
                        <button class="{{ session('lang') == 'en' ? 'button-first' : '' }} focus:outline-none link-button" data-link="{{ route('admin.language.change', ['lang' => 'en']) }}">
                            EN
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-right">
            <div class="user-action">
                <ul class="flex items-center">
                    <li>
                        <a class="block">
                        <form action="{{ localized_route('front.logout') }}" method="post">
                            @csrf

                                <button class="block" href="javascript:void(0);">
                                    {{ __("Log Out") }}
                                </button>
                        </form>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </header>

    @yield('content')

</main>

@yield('bt-javascript')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{ asset('assets/panel/js/bundle.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset('assets/panel/js/custom.js') }}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2JWWC4M4R5"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2JWWC4M4R5');
</script>

@yield('bb-javascript')
</body>
</html>
