<div class="Product Product__small">
    <a class="Product__title Product__title--small" href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>

    <div class="Product__media">
        <a href="{{ $product->referral_link }}" target="_blank">
            <img class="Product__image" src="{{ cdn_file($product->image_url) }}">
        </a>
    </div>
</div>