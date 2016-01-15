<div class="ui fluid card">
    <div class="image">
        @include('frontend.layouts.partials._share-buttons',[
            'url'  => route('products.show', $product->slug),
            'description'  => $product->name,
        ])

        @include('frontend.products.partials._featured', ['product' => $product])

        <img src="{{ $product->image_url }}">
    </div>
    <div class="content">
        <div class="header"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></div>
        <div class="meta">
            {{ $product->current_price }} <i class="euro icon"></i>
        </div>
        <div class="description">
            {{ $product->short_description }}
        </div>
    </div>
    <div class="ui bottom attached yellow button">
        <i class="shop icon"></i>
        ¡Lo quiero!
    </div>
</div>