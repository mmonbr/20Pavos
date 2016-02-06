@extends('frontend.layouts.app')

@section('content')
    <div id="Products">
        @foreach ($products as $key => $value)
            @include('frontend.products.partials._product', ['product' => $value])
            @if(should_display_ad($key, Request::get('page', 0)))
                @include('frontend.products.partials._product_ad')
            @endif
        @endforeach
    </div>

    <div class="ui center aligned basic segment">
        {!! $products->appends(Request::only(['query', 'max_price', 'min_price', 'filtro']))->render(new App\Presenters\SemanticUIPaginationPresenter($products)) !!}
    </div>
@endsection