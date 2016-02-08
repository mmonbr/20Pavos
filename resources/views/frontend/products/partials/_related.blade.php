<h2 class="Heading--Fancy">
    <span>También te podrían interesar...</span>
</h2>

<div id="Products">
    @foreach($related as $product)
        @include('frontend.products.partials._product', ['product' => $product])
    @endforeach
</div>