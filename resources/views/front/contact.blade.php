@extends('front.layouts.base')

@section('content')
    <main class="content relative z-10">
        <div class="contact-content">
            <div class="container mx-auto">
                <div class="head text-center">
                    <span class="block">{{ __("Contact") }}</span>
                    <h1>{{ __("Contact Us") }}</h1>
                </div>
                <div class="contact-map">
                    <div class="contact-map-area">
                        {!! $location !!}
                    </div>
                </div>
                <div class="contact-if flex flex-col lg:flex-row">
                    <div class="contact-info w-full lg:w-1/2">
                        <div class="contact-info-boxes">
                            <div class="contact-info-box">
                                <span class="block">{{ __("Address") }}</span>
                                <p>{{ $configs->address }}</p>
                            </div>
                            <div class="contact-info-box">
                                <span class="block">{{ __("Telephone") }}</span>
                                <a class="block" href="tel:{{ $configs->phone }}">{{ $configs->phone }}</a>
                            </div>
                            <div class="contact-info-box">
                                <span class="block">{{ __("Email Address") }}</span>
                                <a class="block" href="mailto:{{ $configs->email }}">{{ $configs->email }}</a>
                            </div>
                            <div class="contact-info-box">
                                <span class="block">{{ __("Fax") }}</span>
                                <a class="block" href="fax:{{ $configs->fax }}">{{ $configs->fax }}</a>
                            </div>
                            <div class="contact-info-box">
                                <span class="block">{{ __("Social Media") }}</span>
                                <div class="socials">
                                    <ul class="flex">
                                        <li>
                                            <a class="flex items-center justify-center" href="{{ $configs->facebook }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 155.139 155.139">
                                                    <path d="M89.584 155.139V84.378h23.742l3.562-27.585H89.584V39.184c0-7.984 2.208-13.425 13.67-13.425l14.595-.006V1.08C115.325.752 106.661 0 96.577 0 75.52 0 61.104 12.853 61.104 36.452v20.341H37.29v27.585h23.814v70.761h28.48z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center" href="{{ $configs->instagram }}" target="_blank">
                                                <svg viewBox="0 0 512.001 512.001" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M373.406 0H138.594C62.172 0 0 62.172 0 138.594V373.41C0 449.828 62.172 512 138.594 512H373.41C449.828 512 512 449.828 512 373.41V138.594C512 62.172 449.828 0 373.406 0zM256 395.996c-77.195 0-139.996-62.8-139.996-139.996S178.804 116.004 256 116.004 395.996 178.804 395.996 256 333.196 395.996 256 395.996zM399.344 149.02c-22.813 0-41.367-18.555-41.367-41.368s18.554-41.37 41.367-41.37 41.37 18.558 41.37 41.37-18.558 41.368-41.37 41.368zm0 0"></path>
                                                    <path d="M256 146.02c-60.64 0-109.98 49.335-109.98 109.98 0 60.64 49.34 109.98 109.98 109.98 60.645 0 109.98-49.34 109.98-109.98 0-60.645-49.335-109.98-109.98-109.98zm0 0M399.344 96.3c-6.258 0-11.352 5.095-11.352 11.352 0 6.258 5.094 11.352 11.352 11.352 6.261 0 11.355-5.09 11.355-11.352 0-6.261-5.094-11.351-11.355-11.351zm0 0"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center" href="{{ $configs->youtube }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310 310">
                                                    <path d="M297.917 64.645c-11.19-13.302-31.85-18.728-71.306-18.728H83.386c-40.359 0-61.369 5.776-72.517 19.938C0 79.663 0 100.008 0 128.166v53.669c0 54.551 12.896 82.248 83.386 82.248h143.226c34.216 0 53.176-4.788 65.442-16.527C304.633 235.518 310 215.863 310 181.835v-53.669c0-29.695-.841-50.16-12.083-63.521zm-98.896 97.765l-65.038 33.991a9.997 9.997 0 0 1-14.632-8.863v-67.764a10 10 0 0 1 14.609-8.874l65.038 33.772a10 10 0 0 1 .023 17.738z"></path>
                                                </svg>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="flex items-center justify-center" href="{{ $configs->linkedin }}" target="_blank">
                                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.994 24v-.001H24v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07V7.976H8.489v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243V24zM.396 7.977h4.976V24H.396zM2.882 0C1.291 0 0 1.291 0 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909A2.884 2.884 0 0 0 2.882 0z"></path></svg>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form w-full lg:w-1/2">
                        <form method="POST" action="" onsubmit="" accept-charset="UTF-8" class="flex flex-wrap" id="contact_form">
                            @csrf
                            <x-front::alert-message></x-front::alert-message>
                            <div class="input w-full lg:w-1/2 input-error">
                                <label class="block" for="name">{{ __("Name") }} *</label>
                                <input type="text" id="name" name="name">
                                <span class="input-error-message"></span>
                            </div>
                            <div class="input w-full lg:w-1/2 input-error">
                                <label class="block" for="lastname">{{ __("Surname") }} *</label>
                                <input type="text" id="lastname" name="surname">
                                <span class="input-error-message"></span>
                            </div>
                            <div class="input w-full lg:w-1/2 input-error">
                                <label class="block" for="phone">{{ __("Phone Number") }} *</label>
                                <input type="tel" id="phone" name="phone">
                                <span class="input-error-message"></span>
                            </div>
                            <div class="input w-full lg:w-1/2 input-error">
                                <label class="block" for="email">{{ __("Email Address") }} *</label>
                                <input type="email" id="email" name="email">
                                <span class="input-error-message"></span>
                            </div>
                            <div class="input w-full input-error">
                                <label class="block" for="message">{{ __("Message") }}</label>
                                <textarea id="message" name="message"></textarea>
                                <span class="input-error-message"></span>
                                <input type="hidden" value="1" id="type" name="type">
                            </div>
                            <div class="input w-full">
                                <button class="focus:outline-none" id="">{{ __("Send") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
