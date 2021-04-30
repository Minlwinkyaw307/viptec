@extends('front.layouts.base')

@section('bt-javascript')
    <script>
        let registerNewsLetterUrl = "{{ route('api.register_news_letter') }}";
        let getFreeQuoteUrl = "{{ route('api.get_free_quote') }}";
    </script>
@endsection

@section('content')

    <x-front::slider></x-front::slider>

    <main class="content relative z-10">
        <div class="about for-slide relative">
            <div class="container mx-auto">
                <div class="about-box flex flex-col-reverse lg:flex-row lg:items-center">
                    <div class="about-text w-full lg:w-3/5">
                        <div class="head">
                            <span class="block">{{ __('About Us') }}</span>
                            <h3>{{ $about->translations[0]->about_title }}</h3>
                        </div>
                        <p class="text-justify">
                            {{ $about->translations[0]->about_description }}
                        </p>

                        <a class="inline-block" href="{{ localized_route('front.corporate') }}">{{ __("More About Us") }}</a>
                    </div>
                    <div class="about-image w-full lg:w-2/5"><img src="{{ $about->aboutImageUrl }}" alt="{{ $about->translations[0]->about_title }}"></div>
                </div>
            </div>
        </div>

        <div class="infobar relative z-0" style="background-image: url('{{ $configs->quotaBackgroundUrl }}')">
            <div class="container mx-auto">
                <span class="block">{{ $about->translations[0]->quota_title }}</span>
                <p>{{ $about->translations[0]->quota_description }}</p>
                <a class="offer-btn inline-block relative" href="javascript:void(0);" data-target=".offer-area" data="">{{ __("Get Quote") }}</a>
            </div>
        </div>

        <x-front::gallery></x-front::gallery>

        <x-front::f-a-q></x-front::f-a-q>

    </main>

    <div class="newsletter relative">
        <div class="container mx-auto flex items-center justify-between flex-col lg:flex-row">
            <div class="newsletter-text">
                <span class="block">{{ $about->translations[0]->subscribe_title }}</span>
                <p>{{ $about->translations[0]->subscribe_description }}</p>
            </div>
            <div class="newsletter-input flex justify-center flex-col sm:flex-row">
                <input id="email" class="focus:outline-none" type="email" placeholder="{{ __("Email Address") }}">
                <button class="focus:outline-none" id="bulletinButton">{{ __("Register") }}</button>
            </div>
        </div>
    </div>

    <x-front::quota-modal></x-front::quota-modal>


@endsection
