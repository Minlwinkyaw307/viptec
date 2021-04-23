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
        <div class="about-certificates">
            <div class="container mx-auto">
                <div class="head text-center">
                    <span class="block">Sertifikalar</span>
                    <h4>Kalite Belgelerimiz</h4>
                </div>

                <div class="swiper-container about-certificate-slide swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-748px, 0px, 0px);">
                        <div class="swiper-slide" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="Marka Tescil Belgesi" href="https://viptec.com.tr/uploads/certifica/original/marka-tescil-belgesi1586.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/marka-tescil-belgesi1586.jpg" alt="Marka Tescil Belgesi">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="Tasarım Tescil Belgesi" href="https://viptec.com.tr/uploads/certifica/original/tasarim-tescil-belgesi86070.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/tasarim-tescil-belgesi86070.jpg" alt="Tasarım Tescil Belgesi">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="Tasarım Tescil Belgesi 2016" href="https://viptec.com.tr/uploads/certifica/original/tasarim-tescil-belgesi-201671187.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/tasarim-tescil-belgesi-201671187.jpg" alt="Tasarım Tescil Belgesi 2016">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-prev" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="Tasarım Tescil Belgesi 2017" href="https://viptec.com.tr/uploads/certifica/original/tasarim-tescil-belgesi-20179337.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/tasarim-tescil-belgesi-20179337.jpg" alt="Tasarım Tescil Belgesi 2017">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="OHSAS 18001:2007" href="https://viptec.com.tr/uploads/certifica/original/ohsas-18001-200718282.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/ohsas-18001-200718282.jpg" alt="OHSAS 18001:2007">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-next" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="ISO 14001:2015" href="https://viptec.com.tr/uploads/certifica/original/iso-14001-201570440.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/iso-14001-201570440.jpg" alt="ISO 14001:2015">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="ISO 9001:2015" href="https://viptec.com.tr/uploads/certifica/original/iso-9001-201561784.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/iso-9001-201561784.jpg" alt="ISO 9001:2015">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="Marka Tescil Belgesi 2009" href="https://viptec.com.tr/uploads/certifica/original/marka-tescil-belgesi-200910748.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/marka-tescil-belgesi-200910748.jpg" alt="Marka Tescil Belgesi 2009">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 167px; margin-right: 20px;">
                            <div class="about-certificate-box">
                                <div class="about-certificate-box-image">
                                    <a class="block" data-fancybox="certificates" data-caption="Marka Tescil Belgesi 2011" href="https://viptec.com.tr/uploads/certifica/original/marka-tescil-belgesi-201145649.jpg">
                                        <img src="https://viptec.com.tr/uploads/certifica/detail/marka-tescil-belgesi-201145649.jpg" alt="Marka Tescil Belgesi 2011">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-certificate-button-prev" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492.004 492.004"><path d="M484.14 226.886L306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"></path></svg>
                    </div>
                    <div class="about-certificate-button-next" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.344 207.418l.768.168H135.888l103.496-103.724c5.068-5.064 7.848-11.924 7.848-19.124 0-7.2-2.78-14.012-7.848-19.088L223.28 49.538c-5.064-5.064-11.812-7.864-19.008-7.864-7.2 0-13.952 2.78-19.016 7.844L7.844 226.914C2.76 231.998-.02 238.77 0 245.974c-.02 7.244 2.76 14.02 7.844 19.096l177.412 177.412c5.064 5.06 11.812 7.844 19.016 7.844 7.196 0 13.944-2.788 19.008-7.844l16.104-16.112c5.068-5.056 7.848-11.808 7.848-19.008 0-7.196-2.78-13.592-7.848-18.652L134.72 284.406h329.992c14.828 0 27.288-12.78 27.288-27.6v-22.788c0-14.82-12.828-26.6-27.656-26.6z"></path></svg>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
        </div>
    </main>
@endsection
