<div class="ui fluid card">
    <div class="image">
        @include('layouts.partials._share-buttons',[
            'url'  => route('productos.show', $product->id),
            'description'  => $product->name,
        ])

        @if($product->isFeatured())
            <div class="ui yellow ribbon label">
                <i class="star icon"></i> Destacado
            </div>
        @endif

        <img src="{{ $product->image_url }}">
    </div>
    <div class="content">
        <div class="header"><a href="{{ route('productos.show', $product->id) }}">{{ $product->name }}</a></div>
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