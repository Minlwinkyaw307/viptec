@extends('front.layouts.base')

@section('content')
    <main class="content relative z-10">
        <div class="about relative">
            <div class="container mx-auto">
                <div class="about-box flex flex-col-reverse lg:flex-row lg:items-center">
                    <div class="about-text w-full lg:w-3/5">
                        <div class="head">
                            <span class="block">{{ __('Corporate') }}</span>
                            <h1>{{ $about->translations[0]->about_title }}</h1>
                        </div>
                        <p class="text-justify">
                            {{ $about->translations[0]->about_description }}
                        </p>
                        <a class="about-content-button inline-block" href="https://viptec.com.tr/en/contact">{{ __('Contact Us') }}</a>
                    </div>
                    <div class="about-image w-full lg:w-2/5">
                        <img src="{{ $about->aboutImageUrl }}" alt="About VIP-TEC">
                    </div>
                </div>
            </div>
        </div>
        {!! $about->translations[0]->vision !!}

        <x-front::certificates></x-front::certificates>
    </main>
@endsection
