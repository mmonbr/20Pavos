@extends('layouts.app')

@section('content')
    <div id="products-container" class="ui three doubling stackable cards">
        @foreach($products as $product)
            @include('products.product')
        @endforeach
    </div>

    <div class="ui center aligned basic segment">
        {!! $products->appends(Request::only(['query', 'max_price', 'min_price']))->render(new App\Presenters\SemanticUIPaginationPresenter($products)) !!}
    </div>
@endsection