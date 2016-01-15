<div class="ui piled segment">
    <h3 class="ui header">Otros productos que te podrían interesar...</h3>
</div>

<div class="ui three doubling stackable cards">
    @foreach($related as $product)
        @include('frontend.products.partials._product', ['product' => $product])
    @endforeach
</div>