@extends('front.layouts.base')

@section('content')
    <main class="content relative z-10">
        <div class="products">
            <div class="container mx-auto">
                <div class="head text-center">
                    <span class="block">{{ __("Our Products") }}</span>
                    <h1>{{ request()->query('category') ? $categories->where('translations.0.slug', request()->query('category'))->first()->translations[0]->name : __("Professional Utility Knives") }}</h1>
                </div>
                <div class="products-fl flex items-start">
                    <x-front::categories :categories="$categories" :phone="$configs->phone"></x-front::categories>
                    <div class="products-list w-full lg:w-2/3 xl:w-3/4">
                        <ul class="flex flex-wrap">
                            @if(!count($products))
                                <h1 class="py-3 text-2xl text-center d-block text-center">{{ __("No Product Found") }}</h1>
                            @endif
                            @foreach($products as $product)
                                <li class="w-full sm:w-1/2 xl:w-1/3">
                                    <div class="products-box">
                                        <div class="products-box-image">
                                            <a class="block" href="{{ localized_route('front.product.detail', ['slug' => $product->translations[0]->slug]) }}">
                                                <img src="{{ $product->imageUrl }}"
                                                     alt="{{ $product->translations[0]->title }}">
                                            </a>
                                        </div>
                                        <div class="products-box-text text-center">
                                            <h2><a class="block" href="">{{ $product->translations[0]->title }}</a></h2>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        {{ $products->appends(request()->query())->links('partials.pagination') }}

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
