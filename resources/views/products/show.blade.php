@extends('layouts.app')

@section('content')
    <div class="ui two column stackable grid">
        <div class="twelve wide column">
            <div class="ui piled segment">
                <h1 class="ui header">Llavero Breaking Bad</h1>
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

                        <button class="ui huge yellow button fluid"><i class="shop icon"></i> Lo quiero</button>

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
            <div class="ui piled segment">
                <h3 class="ui header">Otros productos que te podrían interesar...</h3>
            </div>
            <div class="ui three column stackable grid">
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image">
                            <div class="ui yellow ribbon label">
                                <i class="star icon"></i> Destacado
                            </div>
                            <img src="http://www.thisiswhyimbroke.com/images/water-jet-pack1-300x250.jpg">
                        </div>
                        <div class="content">
                            <div class="header">Drone RC irrompible</div>
                            <div class="meta">
                                700 <i class="euro icon"></i>
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum, deleniti deserunt
                                dolorem
                                earum eum illum maxime minus molestiae neque nostrum praesentium provident quasi qui
                                ratione
                                repellat repudiandae sunt? Ducimus!
                            </div>
                        </div>
                        <div class="ui bottom attached yellow button">
                            <i class="shop icon"></i>
                            ¡Lo quiero!
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image">
                            <img src="http://www.thisiswhyimbroke.com/images/underground-parking-dock1-300x250.jpg">
                        </div>
                        <div class="content">
                            <div class="header">Drone RC irrompible</div>
                            <div class="meta">
                                700 <i class="euro icon"></i>
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum, deleniti deserunt
                                dolorem
                                earum eum illum maxime minus molestiae neque nostrum praesentium provident quasi qui
                                ratione
                                repellat repudiandae sunt? Ducimus!
                            </div>
                        </div>
                        <div class="ui bottom attached yellow button">
                            <i class="shop icon"></i>
                            ¡Lo quiero!
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image">
                            <img src="http://www.thisiswhyimbroke.com/images/nintendo-gameboy-dress-300x250.jpg">
                        </div>
                        <div class="content">
                            <div class="header">Drone RC irrompible</div>
                            <div class="meta">
                                700 <i class="euro icon"></i>
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum, deleniti deserunt
                                dolorem
                                earum eum illum maxime minus molestiae neque nostrum praesentium provident quasi qui
                                ratione
                                repellat repudiandae sunt? Ducimus!
                            </div>
                        </div>
                        <div class="ui bottom attached yellow button">
                            <i class="shop icon"></i>
                            ¡Lo quiero!
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="four wide column">
            <div class="widget">
                <div class="ui segment">
                    <h4 class="ui header">Suscríbete</h4>
                </div>

                <form action="#" class="ui form">
                    <div class="ui fluid icon input">
                        <input type="text" placeholder="Introduce tu email">
                        <i class="mail icon"></i>
                    </div>
                </form>
            </div>

            <div class="widget">
                <div class="ui segment">
                    <h4 class="ui header">¿Buscas algo?</h4>
                </div>

                <form action="#" class="ui form">
                    <div class="ui fluid icon input">
                        <input type="text" placeholder="breaking bad, star wars....">
                        <i class="search icon"></i>
                    </div>
                </form>
            </div>

            <div class="widget">
                <div class="ui segment">
                    <h4 class="ui header">Top 5 productos</h4>
                </div>

                <div class="ui relaxed items">
                    <div class="item">
                        <div class="ui tiny image">
                            <img src="http://www.thisiswhyimbroke.com/images/led-cube-wireless-speaker-300x250.jpg">
                        </div>
                        <div class="middle aligned content">
                            <a class="header">LED Bluetooth Cube Speaker</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui tiny image">
                            <img src="http://www.thisiswhyimbroke.com/images/remote-control-land-cruiser-300x250.jpg">
                        </div>
                        <div class="middle aligned content">
                            <a class="header">R/C Toyota Land Cruiser Kit</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui tiny image">
                            <img src="http://www.thisiswhyimbroke.com/images/water-filtration-water-bottle-300x250.jpg">
                        </div>
                        <div class="middle aligned content">
                            <a class="header">Water Filtration Bottle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection