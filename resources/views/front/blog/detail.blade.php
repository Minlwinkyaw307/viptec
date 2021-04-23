@extends('front.layouts.base')

@section('content')
    <main class="content relative z-10">
        <div class="blog-slide">
            <div class="blog-slide-boxes">
                <div class="blog-slide-box">
                    <img src="{{ $blog->imageUrl }}" alt="{{ $blog->translations[0]->title }}">
                </div>
            </div>
        </div>
        <div class="blog-detail">
            <div class="container mx-auto">
                <div class="blog-fl flex items-start">
                    <div class="blog-detail-content w-full lg:w-2/3 xl:w-4/6">
                        <div class="blog-detail-content-in">
                            <h1>{{ $blog->translations[0]->title }}</h1>

                            {!! $blog->translations[0]->content !!}

                            <iframe width="726" height="410" src="{{ $configs->tutorial_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <x-front::recent-blogs></x-front::recent-blogs>
                </div>
            </div>
        </div>
    </main>
@endsection
