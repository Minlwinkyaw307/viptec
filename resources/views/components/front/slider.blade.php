<div class="main-slide relative md:fixed">
    <div class="swiper-container slides">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide flex items-center justify-center">
                    <img src="{{ $slider->imageUrl }}" alt="">
                    <div class="main-slide-text absolute container mx-auto">
                        <span class="block">{{ $slider->translations[0]->title }}</span>
                        <p class="hidden sm:block">{{ $slider->translations[0]->description }}</p>
                        <a class="hidden sm:inline-block" href="{{ localized_route('front.product.index') }}">{{ __("View Products") }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
