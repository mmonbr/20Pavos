<div id="Products">
    @foreach ($products as $key => $product)
        @include('frontend.products.partials._product', ['product' => $product, 'newWindow' => true])
        @if(should_display_ad($key, Request::get('page', 0)))
            @include('frontend.products.partials._product_ad')
        @endif
    @endforeach
</div>

<div class="ui center aligned basic segment">
    {!! $products->appends(Request::only(['query', 'max_price', 'min_price', 'filtro']))->render(new App\Presenters\SemanticUIPagination($products)) !!}
</div>