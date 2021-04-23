<section class="offer-area" style="display: none;">
    <div class="modal-overlay">
        <div class="modal-content">
            <div class="modal-close">
                <svg height="512" viewBox="0 0 413.348 413.348" width="512" xmlns="http://www.w3.org/2000/svg"><path d="M413.348 24.354L388.994 0l-182.32 182.32L24.354 0 0 24.354l182.32 182.32L0 388.994l24.354 24.354 182.32-182.32 182.32 182.32 24.354-24.354-182.32-182.32z"></path></svg>
            </div>
            <span>Get a Free Quote</span>
            <form action="" method="post" id="getquote-form">
                <input type="text" id="q-name" name="name" placeholder="{{ __("Name") }} *">
                <input type="text" id="q-surname" name="surname" placeholder="{{ __("Surname") }} *">
                <input type="email" id="q-email" name="email" placeholder="{{ __("Email Address") }} *">
                <input type="phone" id="q-phone" name="phone" placeholder="{{ __("Phone Number") }} *">
                <select name="product" id="q-product" {{ !is_null($product) ? 'disable' : '' }}>
                    @if(!is_null($product))
                    <option value="{{ $product->id }}">{{ $product->translations[0]->title }}</option>
                    @else
                        <option value="">{{ __("Please Select Product") }}</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->translations[0]->title }}</option>
                        @endforeach
                    @endif
                </select>
                <input type="number" min="1" placeholder="{{ __("Piece") }}" id="q-piece" name="piece">
                <textarea placeholder="{{ __("Message") }}" id="q-message" name="message"></textarea>
                <button id="send-getquote" class="engintag_priceform">{{ __("Send") }}</button>
            </form>
        </div>
    </div>
</section>
