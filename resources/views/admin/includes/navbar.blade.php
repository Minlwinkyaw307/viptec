<aside class="leftbar fixed flex flex-col">
    <div class="logo"><a class="flex items-center" href="{{ route('admin.index') }}">
            <div class="logo-figure">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M432 240a79.66 79.66 0 00-16.672 1.76C408.128 169.024 346.592 112 272 112c-8.832 0-16 7.168-16 16v256c0 8.832 7.168 16 16 16h160c44.128 0 80-35.872 80-80 0-44.096-35.872-80-80-80zM208 144c-8.832 0-16 7.168-16 16v224c0 8.832 7.168 16 16 16s16-7.168 16-16V160c0-8.832-7.168-16-16-16zM144 208c-8.832 0-16 7.168-16 16v160c0 8.832 7.168 16 16 16s16-7.168 16-16V224c0-8.832-7.168-16-16-16zM80 208c-8.832 0-16 7.168-16 16v160c0 8.832 7.168 16 16 16s16-7.168 16-16V224c0-8.832-7.168-16-16-16zM16 256c-8.832 0-16 7.168-16 16v96c0 8.832 7.168 16 16 16s16-7.168 16-16v-96c0-8.832-7.168-16-16-16z"></path>
                </svg>
            </div>
            <div class="logo-text"><span class="block">Engin</span><span class="block">Admin Panel</span></div>
        </a></div>
    <div class="leftbar-nav">
        <div class="leftbar-nav-box"><span class="block">Genel</span>
            <ul>
                @foreach(config('navigation') as $navigation)
                    @if(!key_exists('children', $navigation))
                        <li class="{{ str_contains(\Illuminate\Support\Facades\URL::current(), route($navigation['route'])) ? 'active' : '' }}">
                            <a class="flex items-center" href="{{ route($navigation['route']) }}">
                                {{ __($navigation['name']) }}
                            </a>
                        </li>
                    @else
                        <li class="@php
                                foreach($navigation['children'] as $subnav)
                                {
                                    if(str_contains(\Illuminate\Support\Facades\URL::current(), route($subnav['route'])))
                                        {
                                            echo 'active';
                                            break;
                                        }
                                }
                        @endphp">
                            <a class="flex items-center" href="javascript:void(0);">
                                {{ __($navigation['name']) }}
                            </a>
                            <div class="leftbar-nav-drop">
                                <ul>
                                    @foreach($navigation['children'] as $subNav)
                                        <li class=""><a class="flex items-center"
                                                        href="{{ route($subNav['route']) }}"><span
                                                    class="block relative"></span>{{ __($subNav['name']) }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="user-profile"><a class="flex items-center" href="javascript:void(0);">
            <div class="user-profile-text">
                <span class="flex items-center">
                    {{ Auth::user()->name }}
                </span>
                <p>{{ Auth::user()->email  }}</p>
            </div>
        </a>
    </div>
</aside>
