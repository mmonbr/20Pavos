<div class="Product Product--small">
    <a class="Product__title Product__title--small" href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>

    <div class="Product__media">
        <a href="{{ $product->provider->link() }}" target="_blank">
            <img class="Product__media__image" src="{{ cdn_file($product->image_path) }}" alt="{{ $product->slug }}">
        </a>
    </div>
</div>