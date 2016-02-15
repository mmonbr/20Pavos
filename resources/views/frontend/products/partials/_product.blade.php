<div class="Product">
    <a class="Product__title" href="{{ route('products.show', $product->slug) }}" @if(isset($newWindow) && $newWindow == true) target="_blank" @endif>{{ $product->name }}</a>

    <div class="Product__media">
        <a href="{{ $product->referral_link }}" target="_blank">
            <img class="Product__media__image" src="{{ cdn_file($product->image_path) }}" alt="{{ $product->slug }}">
        </a>

        @include('frontend.products.partials._share',
        [
            'type'  => 'List',
            'url'  => route('products.show', $product->slug),
            'name'  => $product->name,
            'description'  => $product->description,
            'media' => cdn_file($product->image_path)
        ])
    </div>

    <div class="Product__description">
        {!! $product->description !!}
    </div>

    <div class="Product__info">
        <div class="Product__info__meta">
            <div class="Product__info__meta__price">
                {!! $product->price !!}
                <i class="fitted euro icon"></i>
            </div>

            <!--<div class="Product__info__meta__favorites">
                320 <i class="icon heart"></i>Favoritos
            </div>-->
        </div>

        <div class="Product__info__buy">
            <a href="{{ $product->provider->link() }}" target="_blank" class="ui yellow fluid button"><i
                        class="shop icon"></i> !Lo quiero!</a>
        </div>
    </div>

    <div class="Product__share">
        @include('frontend.products.partials._share',
        [
            'type'  => 'Buttons',
            'url'  => route('products.show', $product->slug),
            'name'  => $product->name,
            'description'  => $product->description,
            'media' => cdn_file($product->image_path)
        ])
    </div>
</div>
