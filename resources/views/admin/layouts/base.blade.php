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
                        <button class="focus:outline-none">
                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="focus:outline-none">
                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-right">
            <div class="user-action">
                <ul class="flex items-center">
                    <li><a class="block" href="javascript:void(0);">
                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg></a></li>
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

@yield('bb-javascript')
</body>
</html>
