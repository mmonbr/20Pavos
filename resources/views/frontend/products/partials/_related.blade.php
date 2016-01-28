<div class="ui piled segment">
    <h3 class="ui header">En caso de que aún te quede dinero, echa un ojo a...</h3>
</div>

<div id="Products">
    @foreach($related as $product)
        @include('frontend.products.partials._product', ['product' => $product])
    @endforeach
</div>