<h2 class="Heading--Fancy">
    <span>¿Aún con dinero? Derrocha un poco más en...</span>
</h2>

<div id="Products">
    @foreach($related as $product)
        @include('frontend.products.partials._product', ['product' => $product])
    @endforeach
</div>