@extends('layouts.app')

@section('content')
    <div class="ui two column stackable grid">
        <div class="four wide column">
            <div class="ui large vertical menu">
                @foreach(\App\Category::all()->toTree() as $treeItem)
                    {!! renderNode($treeItem, $category) !!}
                @endforeach
                <div class="item">
                    @include('layouts.partials._search', ['fluid' => true, 'placeholder' => 'breaking bad, star wars...'])
                </div>
            </div>
        </div>
        <div class="twelve wide column">
            <div class="ui piled segment">
                <h3 class="ui header">{{ $category->name }}</h3>
                <p>{{ $category->description }}</p>
            </div>

            <div id="products-container" class="ui three doubling stackable cards">
                @foreach($products as $product)
                    @include('products.partials._product', ['product' => $product])
                @endforeach
            </div>

            <div class="ui center aligned basic segment">
                {!! $products->appends(Request::only(['query', 'max_price', 'min_price', 'filtro']))->render(new App\Presenters\SemanticUIPaginationPresenter($products)) !!}
            </div>
        </div>
    </div>
@endsection