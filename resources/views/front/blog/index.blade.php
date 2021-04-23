@extends('front.layouts.base')

@section('content')

    <main class="content relative z-10">
        <div class="blog relative z-10">
            <div class="container mx-auto">
                <div class="head text-center">
                    <span class="block">{{ __("Blog") }}</span>
                    <h1>{{ $configs->translations[0]->site_name }} {{ __("Blog") }}</h1>
                </div>
                <div class="blog-list w-full">
                    <ul class="flex flex-wrap">
                        @foreach($blogs as $blog)
                            <li class="w-full sm:w-1/2 xl:w-1/3">
                                <div class="blog-box">
                                    <div class="blog-box-image">
                                        <a class="block" href="">
                                            <img src="{{ $blog->thumbnailUrl }}"
                                                 alt="{{ $blog->translations[0]->title }}">
                                        </a>
                                    </div>
                                    <div class="blog-box-text">
                                        <a class="block"
                                           href="https://viptec.com.tr/blog/maket-bicaginin-yanlis-kullanimi-ve-dikkat-edilmesi-gereken-hususlar">
                                            <h2>{{ $blog->translations[0]->title }}</h2>
                                            <p>{!! \Illuminate\Support\Str::limit(strip_tags(addslashes($blog->translations[0]->content), 50)) !!}</p>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{ $blogs->appends(request()->query())->links('partials.pagination') }}

            </div>
        </div>
    </main>
@endsection
