@extends('layouts.sidebar')

@section('content')
    <div class="ui piled segment">
        <h1 class="ui header">{{ $product->name }}</h1>
    </div>
    <div class="ui two column stackable grid">
        <div class="six wide column">
            <div class="ui segment">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="http://ecx.images-amazon.com/images/I/71Txfh2RFeL._SL1500_.jpg"
                                 class="ui image fluid">
                        </div>
                        <div class="swiper-slide">
                            <img src="http://ecx.images-amazon.com/images/I/61%2B8Omo3GvL._SL1500_.jpg"
                                 class="ui image fluid">
                        </div>
                        <div class="swiper-slide">
                            <img src="http://ecx.images-amazon.com/images/I/31nXZsU-njL.jpg"
                                 class="ui image fluid">
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

        </div>
        <div class="ten wide column">
            <div class="ui segment">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At ea eligendi est eum
                    exercitationem incidunt laboriosam mollitia officiis quibusdam vel. Commodi dignissimos
                    dolor, laborum obcaecati odit tempora voluptatem! Eaque, molestiae!
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At ea eligendi est eum
                    exercitationem incidunt laboriosam mollitia officiis quibusdam vel. Commodi dignissimos
                    dolor, laborum obcaecati odit tempora voluptatem! Eaque, molestiae!
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At ea eligendi est eum
                    exercitationem incidunt laboriosam mollitia officiis quibusdam vel. Commodi dignissimos
                    dolor, laborum obcaecati odit tempora voluptatem! Eaque, molestiae!
                </p>

                <button class="ui huge yellow button fluid"><i class="shop icon"></i> ¡Lo quiero!</button>

                <div class="ui basic segment center aligned container">
                    <h3 class="ui header">¿Te ha gustado? ¡Compártelo con tus amigos y lo mismo tienes suerte y
                        te lo
                        compran!</h3>

                    <button class="ui huge circular facebook icon button">
                        <i class="facebook icon"></i>
                    </button>
                    <button class="ui huge circular twitter icon button">
                        <i class="twitter icon"></i>
                    </button>
                    <button class="ui huge circular google plus icon button">
                        <i class="google plus icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('products.partials._related', ['related' => $product->getRelatedModels(3)])
@endsection