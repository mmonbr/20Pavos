@extends('frontend.layouts.sidebar')

@section('content')
    <div class="ui piled segment">
        <h1 class="ui header">{{ $product->name }}</h1>
    </div>
    <div class="ui two column stackable grid">
        <div class="seven wide column">
            <div class="">
                <a href="{{ $product->referral_link }}" target="_blank" class="ui rounded image fluid">
                    <img src="{{ cdn_file($product->image_url) }}">
                </a>
            </div>

            <div class="ui segment">
                <h3>Categorías:</h3>
                <div class="ui blue labels">
                    @foreach($product->categories as $category)
                        <a class="ui label" href="{{ route('categories.show', $category->id) }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="nine wide column">
            <div class="ui segment">
                {!! $product->long_description !!}

                <a href="{{ $product->referral_link }}" target="_blank" class="ui huge yellow button fluid"><i
                            class="shop icon"></i> ¡Lo quiero!</a>

                <h3 class="ui header">
                    ¿Te ha gustado? ¡Compártelo con tus amigos y lo mismo tienes suerte y te lo compran!
                </h3>

                <div class="ui basic segment center aligned container">
                    @include('frontend.products.partials._share', [
                        'url' => route('products.show', $product->slug),
                        'name' => $product->name,
                        'description' => $product->short_description,
                        'media' => cdn_file($product->image_url)
                    ])
                </div>
            </div>
        </div>
    </div>
    @include('frontend.products.partials._related', ['related' => $product->getRelatedProducts(3)])
@endsection