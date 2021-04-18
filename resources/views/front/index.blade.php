@extends('front.layouts.base')

@section('content')

    <x-front::slider></x-front::slider>

    <main class="content relative z-10">
        <div class="about for-slide relative">
            <div class="container mx-auto">
                <div class="about-box flex flex-col-reverse lg:flex-row lg:items-center">
                    <div class="about-text w-full lg:w-3/5">
                        <div class="head">
                            <span class="block">Hakkımızda</span>
                            <h3>Kısaca Viptec</h3>
                        </div>
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus interdum risus urna, a ultrices libero pellentesque id. Suspendisse augue eros, rutrum sit amet orci ut, şuctus laoreet felis. Cras ut facilisis est, sed porta neque. Mauris posuere pellentesque risus sed tempor. Aliquam rutrum, mauris eu aliquam luctus, ligula quam scelerisque massa, vitae ultrices dolor urna vitae augue. Nullam luctus semper diam, quis pharetra quam iaculis sit amet. Mauris iaculis libero leo, at scelerisque ligula pulvinar non.
                        </p>

                        <a class="inline-block" href="">Detaylı Bilgi Edin</a>
                    </div>
                    <div class="about-image w-full lg:w-2/5"><img src="https://i.hizliresim.com/MWYAKL.jpg" alt="Viptec hakkında"></div>
                </div>
            </div>
        </div>

        <x-front::featured-products></x-front::featured-products>

        <div class="infobar relative z-0">
            <div class="container mx-auto">
                <span class="block">Size Özel Çözümlerimiz İçin <br> Hemen Teklif Alın. </span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac erat euismod <br> volutpat egestas suscipit pellentesque non aliquam turpis, nec porta risus.</p>
                <a class="inline-block relative" href="">Teklif Al</a>
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

@endsection
