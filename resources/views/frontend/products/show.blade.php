@extends('frontend.layouts.app')

@section('content')
    <div class="ProductDetails">
        <div class="ProductDetails__media">
            @foreach($product->attachments as $key => $attachment)
                <div class="ProductDetails__media__item">
                    @if($key == 0)
                        <h2 class="ProductDetails__media__item__title">{{ $product->name }}</h2>
                    @endif
                    <img class="ProductDetails__media__item__image" src="{{ cdn_file($attachment->path) }}" alt="">
                </div>
            @endforeach
        </div>
        <div class="ProductDetails__meta">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Product Details -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-7268316187159751"
                 data-ad-slot="2168358421"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

            <div class="ProductDetails__meta__description">
                {!! $product->description !!}
            </div>

            <div class="ProductDetails__meta__price">
                {!! $product->current_price !!}
                <i class="fitted euro icon"></i>
            </div>

            <button class="ui button fluid yellow">¡Lo quiero!</button>
        </div>

        <div class="ProductDetails__meta__responsive">
            <div class="ProductDetails__meta__responsive__name">
                {!! $product->name !!}
            </div>

            <div class="ProductDetails__meta__responsive__description">
                {!! $product->description !!}
            </div>

            <div class="ProductDetails__meta__responsive__price">
                {!! $product->current_price !!}
                <i class="fitted euro icon"></i>
            </div>

            <button class="ui button fluid yellow">¡Lo quiero!</button>
        </div>
    </div>

    <div class="ProductDetails__share">
        <button class="ui button facebook"><i class="fitted facebook icon"></i> <span class="Product__Share--network">Facebook</span>
        </button>
        <button class="ui button twitter"><i class="fitted twitter icon"></i> <span class="Product__Share--network">Twitter</span>
        </button>
        <button class="ui button red"><i class="fitted pinterest icon"></i> <span class="Product__Share--network">Pinterest</span>
        </button>
    </div>

    @include('frontend.products.partials._related', ['related' => $product->getRelatedProducts(12)])
@endsection