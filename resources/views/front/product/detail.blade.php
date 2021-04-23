@extends('front.layouts.base')

@section('bt-javascript')
    <script>
        let getFreeQuoteUrl = "{{ route('api.get_free_quote') }}";
    </script>
@endsection

@section('content')
    <main class="content relative z-10">
        <div class="product-details">
            <div class="product-details-si relative">
                <div class="container mx-auto flex flex-col items-start xl:flex-row">
                    <div class="product-details-slide w-full xl:w-1/2">
                        <div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                @foreach($product->product_images as $image)
                                <div class="swiper-slide {{ $loop->index == 0 ? 'swiper-slide-active' : ($loop->index == 1 ? 'swiper-slide-next' : '') }}" style="width: 580px; margin-right: 10px;">
                                    <img src="{{ $image->imageUrl }}" alt="{{ $product->translations[0]->title }}">
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next swiper-button-white" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                            <div class="swiper-button-prev swiper-button-white swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        <div class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-free-mode swiper-container-thumbs">
                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                @foreach($product->product_images as $image)
                                <div class="swiper-slide swiper-slide-visible
                                    {{ $loop->index == 0 ? 'swiper-slide-thumb-active swiper-slide-active' : ($loop->index == 1 ? 'swiper-slide-next' : "") }}
                                " style="width: 186.667px; margin-right: 10px;">
                                    <img src="{{ $image->thumbnailUrl }}" alt="{{ $product->translations[0]->title }}">
                                </div>
                                @endforeach
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    </div>
                    <div class="product-details-info w-full xl:w-1/2">
                        <h1>{{ $product->translations[0]->title }}</h1>
                        <div class="product-detail-info-cat flex">
                            <span class="block">{{ $product->category->translations[0]->name }}</span>
                        </div>

                        {!! $product->translations[0]->description !!}

                        <h3>{{ __("Product Specifications") }}</h3>

                        <p>{{ $product->product_features->pluck('feature.translations.0.name')->join(',') }}</p>

                        <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td>{{ __("Product Code") }}</td>
                                <td>{{ $product->code }}</td>
                            </tr>
                            @if($product->translations[0]->color)
                            <tr>
                                <td>{{ __("Color Options") }}</td>
                                <td>{{ $product->translations[0]->color }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>{{ __("Length") }} (mm)</td>
                                <td>{{ $product->length }}</td>
                            </tr>
                            <tr>
                                <td>{{ __("Width") }} (mm)</td>
                                <td>{{ $product->width }}</td>
                            </tr>
                            <tr>
                                <td>{{ __("Weight") }} (gram)</td>
                                <td>{{ $product->weight }}</td>
                            </tr>
                            @if(count($product->product_compatibles))
                            <tr>
                                <td>{{ __("Compatible Blade Code") }}</td>
                                <td>{{ $product->product_compatibles->pluck('blade.code')->join(',') }}</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        <p></p>
                        @if(count($product->product_package_types))
                        <h3>{{ __("Packaging Type Options") }}</h3>
                        <ul class="flex flex-wrap">
                            @foreach($product->product_package_types as $product_package_type)
                            <li class="w-1/2 sm:w-1/5">
                                <a class="block" href="{{ $product_package_type->imageUrl }}" data-fancybox="product" data-caption="{{ $product_package_type->package_type->translations[0]->name }}"><img src="{{ $product_package_type->imageUrl }}" alt="{{ $product->translations[0]->title }}"></a>
                                <em>{{ $product_package_type->package_type->translations[0]->name }}</em>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                        <div class="pd-info-buttons flex">
                            <a class="offer-button block w-1/2" data-target=".offer-area" href="javascript:void(0);">
                                <div class="button-content flex justify-center items-center">
                                    <span>{{ __('Get Quota') }}</span>
                                </div>
                            </a>
                            <a class="pdf-button block w-1/2" target="_blank" href="{{ $configs->catalogueUrl }}">

                                <div class="button-content flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M368 256h-64c-8.837 0-16 7.163-16 16v128c0 8.837 7.163 16 16 16h64c17.673 0 32-14.327 32-32v-96c0-17.673-14.327-32-32-32zm0 128h-48v-96h48v96zM512 288v-32h-80c-8.837 0-16 7.163-16 16v144h32v-64h64v-32h-64v-32h64z"></path><path d="M32 464V48c0-8.837 7.163-16 16-16h240v64c0 17.673 14.327 32 32 32h64v48h32v-64c.025-4.253-1.645-8.341-4.64-11.36l-96-96C312.341 1.645 308.253-.024 304 0H48C21.49 0 0 21.491 0 48v416c0 26.51 21.49 48 48 48h112v-32H48c-8.836 0-16-7.163-16-16z"></path><path d="M240 256h-64c-8.837 0-16 7.163-16 16v144h32v-48h48c17.673 0 32-14.327 32-32v-48c0-17.673-14.327-32-32-32zm0 80h-48v-48h48v48z"></path></svg>
                                    <span>{{ __("Download Catalogue") }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-front::certificates></x-front::certificates>

        <div class="infovideo">
            <div class="container mx-auto">
                <div class="head text-center">
                    <span class="block">{{ __("UTILITY KNIVES") }}</span>
                    <h4>{{ __("How to Use a Utility Knife?") }}</h4>
                </div>
                <iframe src="{{ $configs->tutorial_link }}?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
        </div>

    </main>
    <x-front::quota-modal :product="$product"></x-front::quota-modal>

@endsection
