@extends('front.layouts.base')

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

        <x-front::featured-products></x-front::featured-products>

        <div class="infobar relative z-0">
            <div class="container mx-auto">
                <span class="block">Get a Quote for Special Offers and Solutions</span>
                <p>Prices vary according to features of desired products. To get our special price offer, press the button below and we will contact you.</p>
                <a class="offer-btn inline-block relative" href="javascript:void(0);" data-target=".offer-area" data="">Get Quote</a>
            </div>
        </div>

        <x-front::gallery></x-front::gallery>

        <x-front::f-a-q></x-front::f-a-q>

    </main>

    <div class="newsletter relative">
        <div class="container mx-auto flex items-center justify-between flex-col lg:flex-row">
            <div class="newsletter-text">
                <span class="block">Maket Bıçaklarımız Hakkında Bilgi Edinin</span>
                <p>E-bültenimize kayıt olarak maket bıçaklarımızdan haberdar olun.</p>
            </div>
            <div class="newsletter-input flex justify-center flex-col sm:flex-row">
                <input class="focus:outline-none" type="email" placeholder="Email Adresiniz">
                <button class="focus:outline-none">Kayıt Ol</button>
            </div>
        </div>
    </div>

    <section class="offer-area" style="display: none;">
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="modal-close">
                    <svg height="512" viewBox="0 0 413.348 413.348" width="512" xmlns="http://www.w3.org/2000/svg"><path d="M413.348 24.354L388.994 0l-182.32 182.32L24.354 0 0 24.354l182.32 182.32L0 388.994l24.354 24.354 182.32-182.32 182.32 182.32 24.354-24.354-182.32-182.32z"></path></svg>
                </div>
                <span>Get a Free Quote</span>
                <form action="" method="post" id="getquote-form">
                    <input type="text" id="name" name="name" placeholder="Your Name *">
                    <input type="text" id="surname" name="surname" placeholder="Your Surname *">
                    <input type="email" id="email" name="email" placeholder="Your E-mail Address *">
                    <input type="phone" id="phone" name="phone" placeholder="Your Phone Number *">
                    <select name="product" id="product">
                        <option value="">Select a Product</option>
                        <option value="VT875101 Profesyonel Maket Bıçağı">VT875101  Professional Utility Knife </option>
                    </select>
                    <input type="number" min="1" placeholder="Piece" id="piece" name="piece">
                    <textarea placeholder="Your Message" id="message" name="message"></textarea>
                    <button id="send-getquote" class="engintag_priceform">Send</button>
                </form>
            </div>
        </div>
    </section>

@endsection
