@extends('front.layouts.base')

@section('content')

    <main class="content relative z-10">
        <div class="certificates-content relative">
            <div class="container mx-auto">
                <div class="head text-center">
                    <span class="block">{{ __("Cetificates") }}</span>
                    <h1>{{ __('Quality Certificates') }}</h1>
                </div>
                <ul class="flex flex-wrap">
                    @foreach($certificates as $certificate)
                    <li class="w-full md:w-1/2 lg:w-1/3 xl:w-1/5">
                        <a href="{{ $certificate->imageUrl }}" data-fancybox="certificates" data-caption="{{ $certificate->translations[0]->title }}">
                            <img src="{{ $certificate->imageUrl }}" alt="{{ $certificate->translations[0]->title }}">
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>

@endsection
