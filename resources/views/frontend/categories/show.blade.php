@extends('frontend.layouts.app')

@section('content')
    <div class="ui two column doubling stackable grid">
        <div class="four wide column">
            <div class="ui large fluid vertical menu">
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
            <div class="ui piled segment">
                <h3 class="ui header">{{ $category->name }}</h3>
                <p>{{ $category->description }}</p>
            </div>

            <div id="Products">
                @foreach($products as $product)
                    @include('frontend.products.partials._product_small', ['product' => $product])
                @endforeach
            </div>

            <div class="ui center aligned basic segment">
                {!! $products->appends(Request::only(['query', 'max_price', 'min_price', 'filtro']))->render(new App\Presenters\SemanticUIPaginationPresenter($products)) !!}
            </div>
        </div>
    </div>
@endsection