@extends('frontend.layouts.app')

@section('content')
    <div id="products-container" class="ui three doubling stackable cards">
        @foreach($products as $product)
            @include('frontend.products.partials._product', ['product' => $product])
        @endforeach
    </div>

    <div class="ui center aligned basic segment">
        {!! $products->appends(Request::only(['query', 'max_price', 'min_price', 'filtro']))->render(new App\Presenters\SemanticUIPaginationPresenter($products)) !!}
    </div>
@endsection