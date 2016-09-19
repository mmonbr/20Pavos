@extends('frontend.layouts.app')

@section('content')
    <div class="ui two column doubling stackable grid">
        <div class="four wide column">
            <div class="ui fluid vertical menu">
                <div class="item">
                    @include('frontend.layouts.partials._search', ['fluid' => true, 'placeholder' => 'breaking bad, star wars...'])
                </div>
                @foreach($categories as $treeItem)
                    {!! renderNode($treeItem, $category) !!}
                @endforeach
                <div class="item">
                    <i class="grid filter icon"></i> Filtrar por precio
                    <div id="PriceSlider">
                        <div class="PriceSlider__container"></div>
                        <span class="PriceSlider__minimum">
                            0€
                        </span>
                        <span class="PriceSlider__current"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="twelve wide column">
            <h2 class="Heading--Fancy">
                <span>{{ $category->name }}</span>
            </h2>

            <p class="Category__description">{{ $category->description }}</p>

            <div id="Products">
                @foreach($products as $product)
                    @include('frontend.products.partials._product_small', ['product' => $product])
                @endforeach
            </div>

            <div class="ui center aligned basic segment">
                {!! $products->appends(Request::only(['query', 'max_price', 'min_price', 'filtro']))->links() !!}
            </div>
        </div>
    </div>
@endsection