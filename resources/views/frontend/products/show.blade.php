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

    @include('frontend.products.partials._share',
            [
                'type'  => 'Buttons',
                'url'  => route('products.show', $product->slug),
                'name'  => $product->name,
                'description'  => $product->description,
                'media' => cdn_file($product->image_url)
            ])

    <div class="comments">
        <div class="fb-comments" data-href="{{ route('products.show', [$product->slug]) }}"
             data-width="100%" data-numposts="5">
        </div>
    </div>

    @include('frontend.products.partials._related', ['related' => $product->getRelatedProducts(12)])
@endsection