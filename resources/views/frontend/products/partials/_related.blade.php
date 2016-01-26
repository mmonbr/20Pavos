<div class="ui piled segment">
    <h3 class="ui header">Otros productos que te podrían interesar...</h3>
</div>

<div id="Products">
    @foreach($related as $product)
        @include('frontend.products.partials._product_small', ['product' => $product])
    @endforeach
</div>