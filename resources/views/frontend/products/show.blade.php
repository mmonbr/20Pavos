@extends('frontend.layouts.app')

@section('content')
    <div class="Product__details--container">
        <div class="Product__details--media">
            <div class="Product__details--media--item">
                <h2 class="Product__details--title">{{ $product->name }}</h2>
                <img class="Product__details--image" src="http://placehold.it/640x530" alt="">
            </div>

            <div class="Product__details--media--item">
                <h2 class="Product__details--title">{{ $product->name }}</h2>
                <img class="Product__details--image" src="http://placehold.it/640x530" alt="">
            </div>

            <div class="Product__details--media--item">
                <h2 class="Product__details--title">{{ $product->name }}</h2>
                <img class="Product__details--image" src="http://placehold.it/640x530" alt="">
            </div>
        </div>
        <div class="Product__details--meta">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Product Details -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-7268316187159751"
                 data-ad-slot="2168358421"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

            <div class="Product__details--description">
                {!! $product->description !!}
            </div>

            <div class="Product__details--price">
                {!! $product->current_price !!}
                <i class="fitted euro icon"></i>
            </div>

            <button class="ui button fluid yellow">¡Lo quiero!</button>
        </div>
        <div class="Product__details--meta--responsive">
            <div class="Product__details--name">
                {!! $product->name !!}
            </div>

            <div class="Product__details--description">
                {!! $product->description !!}
            </div>

            <div class="Product__details--price">
                {!! $product->current_price !!}
                <i class="fitted euro icon"></i>
            </div>

            <button class="ui button fluid yellow">¡Lo quiero!</button>
        </div>
    </div>

    <div class="Product__details--share">
        <button class="ui button facebook"><i class="fitted facebook icon"></i> <span class="Product__Share--network">Facebook</span></button>
        <button class="ui button twitter"><i class="fitted twitter icon"></i> <span class="Product__Share--network">Twitter</span></button>
        <button class="ui button red"><i class="fitted pinterest icon"></i> <span class="Product__Share--network">Pinterest</span></button>
    </div>

    @include('frontend.products.partials._related', ['related' => $product->getRelatedProducts(12)])
@endsection