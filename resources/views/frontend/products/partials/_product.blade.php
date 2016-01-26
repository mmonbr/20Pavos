<div class="Product">
    <a class="Product__title" href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>

    <a href="{{ $product->referral_link }}" target="_blank">
        <img class="Product__image" src="{{ cdn_file($product->image_url) }}">
    </a>

    @include('frontend.layouts.partials._share-buttons',
    [
        'url'  => route('products.show', $product->slug),
        'name'  => $product->name,
        'description'  => $product->description,
        'media' => cdn_file($product->image_url)
    ])

    <div class="Product__description">
        {!! $product->description !!}
    </div>
    <div class="Product__info">
        <div class="Product__price">
            {{ $product->current_price }}
            <i class="euro icon"></i>
        </div>

        <div class="Product__buy">
            <a href="#" class="ui yellow button"><i class="shop icon"></i> !Lo quiero!</a>
        </div>
    </div>
</div>