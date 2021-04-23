<div class="up-area relative sticky z-50" id="up">
    <header class="header">
        <div class="container mx-auto flex justify-end relative">
            <div class="logo absolute"><a class="block" href="{{ localized_route('front.index') }}"><img class=" z-40"
                                                                                                         src="{{ $configs->logoUrl }}"
                                                                                                         alt="{{ $configs->translations[0]->title }}"></a>
            </div>
            <div class="infos flex items-center">
                <ul class="flex">
                    <li>
                        <div class="infos-box flex items-center">
                            <div class="infos-box-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.806 473.806">
                                    <path
                                        d="M374.456 293.506c-9.7-10.1-21.4-15.5-33.8-15.5-12.3 0-24.1 5.3-34.2 15.4l-31.6 31.5c-2.6-1.4-5.2-2.7-7.7-4-3.6-1.8-7-3.5-9.9-5.3-29.6-18.8-56.5-43.3-82.3-75-12.5-15.8-20.9-29.1-27-42.6 8.2-7.5 15.8-15.3 23.2-22.8 2.8-2.8 5.6-5.7 8.4-8.5 21-21 21-48.2 0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5-6-6.2-12.3-12.6-18.8-18.6-9.7-9.6-21.3-14.7-33.5-14.7s-24 5.1-34 14.7l-.2.2-34 34.3c-12.8 12.8-20.1 28.4-21.7 46.5-2.4 29.2 6.2 56.4 12.8 74.2 16.2 43.7 40.4 84.2 76.5 127.6 43.8 52.3 96.5 93.6 156.7 122.7 23 10.9 53.7 23.8 88 26 2.1.1 4.3.2 6.3.2 23.1 0 42.5-8.3 57.7-24.8.1-.2.3-.3.4-.5 5.2-6.3 11.2-12 17.5-18.1 4.3-4.1 8.7-8.4 13-12.9 9.9-10.3 15.1-22.3 15.1-34.6 0-12.4-5.3-24.3-15.4-34.3l-54.9-55.1zm35.8 105.3c-.1 0-.1.1 0 0-3.9 4.2-7.9 8-12.2 12.2-6.5 6.2-13.1 12.7-19.3 20-10.1 10.8-22 15.9-37.6 15.9-1.5 0-3.1 0-4.6-.1-29.7-1.9-57.3-13.5-78-23.4-56.6-27.4-106.3-66.3-147.6-115.6-34.1-41.1-56.9-79.1-72-119.9-9.3-24.9-12.7-44.3-11.2-62.6 1-11.7 5.5-21.4 13.8-29.7l34.1-34.1c4.9-4.6 10.1-7.1 15.2-7.1 6.3 0 11.4 3.8 14.6 7l.3.3c6.1 5.7 11.9 11.6 18 17.9 3.1 3.2 6.3 6.4 9.5 9.7l27.3 27.3c10.6 10.6 10.6 20.4 0 31-2.9 2.9-5.7 5.8-8.6 8.6-8.4 8.6-16.4 16.6-25.1 24.4-.2.2-.4.3-.5.5-8.6 8.6-7 17-5.2 22.7l.3.9c7.1 17.2 17.1 33.4 32.3 52.7l.1.1c27.6 34 56.7 60.5 88.8 80.8 4.1 2.6 8.3 4.7 12.3 6.7 3.6 1.8 7 3.5 9.9 5.3.4.2.8.5 1.2.7 3.4 1.7 6.6 2.5 9.9 2.5 8.3 0 13.5-5.2 15.2-6.9l34.2-34.2c3.4-3.4 8.8-7.5 15.1-7.5 6.2 0 11.3 3.9 14.4 7.3l.2.2 55.1 55.1c10.3 10.2 10.3 20.7.1 31.3zM256.056 112.706c26.2 4.4 50 16.8 69 35.8s31.3 42.8 35.8 69c1.1 6.6 6.8 11.2 13.3 11.2.8 0 1.5-.1 2.3-.2 7.4-1.2 12.3-8.2 11.1-15.6-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3 3.7-15.6 11s3.5 14.4 10.9 15.6zM473.256 209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2 3.7-15.5 11-1.2 7.4 3.7 14.3 11.1 15.6 46.6 7.9 89.1 30 122.9 63.7 33.8 33.8 55.8 76.3 63.7 122.9 1.1 6.6 6.8 11.2 13.3 11.2.8 0 1.5-.1 2.3-.2 7.3-1.1 12.3-8.1 11-15.4z"></path>
                                </svg>
                            </div>
                            <div class="infos-box-text">
                                <a href="tel:{{ $configs->phone }}" class="engintag_phonecall">
                                    <span>{{ $configs->phone }}</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="hidden md:block">
                        <div class="infos-box flex items-center">
                            <div class="infos-box-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M467 61H45C20.218 61 0 81.196 0 106v300c0 24.72 20.128 45 45 45h422c24.72 0 45-20.128 45-45V106c0-24.72-20.128-45-45-45zm-6.214 30L256.954 294.833 51.359 91h409.427zM30 399.788V112.069l144.479 143.24L30 399.788zM51.213 421l144.57-144.57 50.657 50.222c5.864 5.814 15.327 5.795 21.167-.046L317 277.213 460.787 421H51.213zM482 399.787L338.213 256 482 112.212v287.575z"/>
                                </svg>
                            </div>
                            <div class="infos-box-text">
                                <a href="mailto:{{ $configs->email }}" class="engintag_mail">
                                    <span>{{ $configs->email }}</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="social hidden xl:flex items-center">
                <ul class="flex">
                    <li>
                        <a class="flex items-center justify-center" href="{{ $configs->facebook }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M288 176v-64c0-17.664 14.336-32 32-32h32V0h-64c-53.024 0-96 42.976-96 96v80h-64v80h64v256h96V256h64l32-80h-96z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center justify-center" href="{{ $configs->instagram }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.00096 512.00096">
                                <path
                                    d="M373.40625 0h-234.8125C62.171875 0 0 62.171875 0 138.59375v234.816406C0 449.828125 62.171875 512 138.59375 512h234.816406C449.828125 512 512 449.828125 512 373.410156V138.59375C512 62.171875 449.828125 0 373.40625 0zM256 395.996094c-77.195312 0-139.996094-62.800782-139.996094-139.996094S178.804688 116.003906 256 116.003906 395.996094 178.804688 395.996094 256 333.195312 395.996094 256 395.996094zm143.34375-246.976563c-22.8125 0-41.367188-18.554687-41.367188-41.367187S376.53125 66.28125 399.34375 66.28125s41.371094 18.558594 41.371094 41.371094-18.558594 41.367187-41.371094 41.367187zm0 0"></path>
                                <path
                                    d="M256 146.019531c-60.640625 0-109.980469 49.335938-109.980469 109.980469 0 60.640625 49.339844 109.980469 109.980469 109.980469 60.644531 0 109.980469-49.339844 109.980469-109.980469 0-60.644531-49.335938-109.980469-109.980469-109.980469zm0 0M399.34375 96.300781c-6.257812 0-11.351562 5.09375-11.351562 11.351563 0 6.257812 5.09375 11.351562 11.351562 11.351562 6.261719 0 11.355469-5.089844 11.355469-11.351562 0-6.261719-5.09375-11.351563-11.355469-11.351563zm0 0"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center justify-center" href="{{ $configs->youtube }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310 310">
                                <path
                                    d="M297.917 64.645c-11.19-13.302-31.85-18.728-71.306-18.728H83.386c-40.359 0-61.369 5.776-72.517 19.938C0 79.663 0 100.008 0 128.166v53.669c0 54.551 12.896 82.248 83.386 82.248h143.226c34.216 0 53.176-4.788 65.442-16.527C304.633 235.518 310 215.863 310 181.835v-53.669c0-29.695-.841-50.16-12.083-63.521zm-98.896 97.765l-65.038 33.991a9.997 9.997 0 0 1-14.632-8.863v-67.764a10 10 0 0 1 14.609-8.874l65.038 33.772a10 10 0 0 1 .023 17.738z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center justify-center" href="{{ $configs->linkedin }}" target="_blank">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.994 24v-.001H24v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07V7.976H8.489v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243V24zM.396 7.977h4.976V24H.396zM2.882 0C1.291 0 0 1.291 0 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909A2.884 2.884 0 0 0 2.882 0z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="language relative flex items-center">
                <ul>
                    <li>
                        <a href="javascript:void(0);" class="focus:outline-none flex items-center">
                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                            {{ app()->getLocale() }}                              </a>
                        <div class="language-drop absolute">
                            <ul>
                                @foreach(languages() as $language)
                                    <li>
                                        <a class="block"
                                           href="{{ current_route($language->code)  }}">{{ $language->original_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="up-area-bot flex">
        <nav class="nav flex justify-end container mx-auto">
            <ul class="hidden lg:flex">
                <li class="relative"><a class="block" href="{{ localized_route('front.index') }}">{{ __("") }}</a>
                </li>
                <li class="relative">
                    <a class="block" href="{{ localized_route("front.corporate") }}">{{ __("Corporate") }}</a>
                </li>
                <li class="relative main-menu">
                    <a class="block" href="{{ localized_route("front.product.index") }}">{{ __("Products") }}</a>
                    <ul class="sub-menu absolute">
                        @foreach($categories as $category)
                            <li><a href="{{ localized_route('front.product.index',
array_merge(request()->query(), ['category'=> $category->translations[0]->slug])) }}">{{ $category->translations[0]->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="relative">
                    <a class="block" href="{{ localized_route("front.certificates") }}">{{ __('Certificates') }}</a>
                </li>
                <li class="relative">
                    <a class="block" href="{{ localized_route("front.blog.index") }}">{{ __("Blog") }}</a>
                </li>
                <li class="relative">
                    <a class="block" href="{{ localized_route("front.contact") }}">{{ __("Contact") }}</a>
                </li>
                <li class="relative"><a class="block engintag_catalogue" target="_blank"
                                        href="{{ $configs->catalogueFileUrl }}">{{ __("Download Catalogue") }}</a>
                </li>
                <li class="relative">
                    <form action="{{ localized_route('front.product.index', request()->query()) }}" class=""
                          method="get">
                        <input type="hidden" name="category" value="{{ request()->query('category') }}">
                        <input class="search-input" type="text" value="{{ request()->query('q') }}" id="name" name="q"
                               placeholder="{{ __('Search Products') }}">
                    </form>
                </li>
            </ul>

            <div class="mobile-nav-btn flex lg:hidden">
                <button class="focus:outline-none">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" class="css-i6dzq1">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </nav>
    </div>
</div>

<div class="mobile-nav">
    <div class="mobile-nav-overlay fixed">
        <div class="mobile-nav-content fixed">
                  <span class="flex items-center justify-between">
                     {{ __("Menu") }}
                     <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                          stroke-linejoin="round" class="css-i6dzq1">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                     </svg>
                  </span>
            <ul>
                <li>
                    <a class="flex items-center" href="{{ localized_route("front.index") }}">{{ __("Home") }}</a>
                </li>
                <li>
                    <a class="flex items-center"
                       href="{{ localized_route("front.corporate") }}">{{ __("Corporate") }}</a>
                </li>
                <li class="mobile-nav-drop-go">
                    <a class="flex items-center justify-between" href="javascript:void(0);">
                        {{ __('Products') }}
                        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                             stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"
                             style="transform: rotate(0deg);">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </a>
                    <ul class="mobile-nav-drop">
                        @foreach($categories as $category)
                            <li><a class="flex items-center" href="{{ localized_route('front.product.index',
array_merge(request()->query(), ['category'=> $category->translations[0]->slug])) }}">{{ $category->translations[0]->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a class="flex items-center"
                       href="{{ localized_route('front.certificates') }}">{{ __('Certificates') }}</a>
                </li>
                <li>
                    <a class="flex items-center" href="{{ localized_route("front.blog.index") }}">{{ __("Blog") }}</a>
                </li>
                <li>
                    <a class="flex items-center" href="{{ localized_route("front.contact") }}">{{ __("Contact") }}</a>
                </li>
                <li><a class="block engintag_catalogue" target="_blank"
                       href="{{ $configs->catalogueFileUrl }}">{{ __('Download Catalogue') }}</a>
                </li>
                <li class="relative px-6 py-2">
                    <form action="{{ localized_route('front.product.index', request()->query()) }}" class=""
                          method="get">
                        <input type="hidden" name="category" value="{{ request()->query('category') }}" class="d-none">
                        <input class="search-input py-4" type="text" id="name" name="q"
                               placeholder="{{ __('Search Products') }}">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

