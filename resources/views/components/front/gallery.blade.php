<div class="gallery">
    <div class="container mx-auto">
        <div class="head text-center">
            <span class="block">Fotoğraflar</span>
            <h4>Bizden Kareler</h4>
        </div>

        <div class="gallery-in">
            <div class="gallery-col flex flex-wrap">
                @foreach($galleries as $gallery)
                    <div class="gallery-box w-full sm:w-1/2 md:w-1/3 xl:w-1/5">
                        <a data-fancybox="gallery" href="{{ $gallery->imageUrl }}">
                            <img src="{{ $gallery->imageUrl }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
