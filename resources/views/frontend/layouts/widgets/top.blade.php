<div class="ui segment">
    <h4 class="ui header">Top 5 productos</h4>
</div>

<div class="ui relaxed items">
    @foreach($topProducts as $product)
        <div class="item">
            <div class="ui tiny image">
                <img src="{{ $product->image() }}">
            </div>
            <div class="middle aligned content">
                <a class="header" href="{{ route('products.show', [$product->slug]) }}">{{ $product->name }}</a>
            </div>
        </div>
    @endforeach
</div>