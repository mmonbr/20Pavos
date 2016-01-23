<div class="ui container" style="margin-bottom: 20px">
    <div class="ui center aligned stackable grid">
        <div class="eleven wide column">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="http://placehold.it/730x250">
                    </div>
                    <div class="swiper-slide">
                        <img src="http://placehold.it/730x250">
                    </div>
                    <div class="swiper-slide">
                        <img src="http://placehold.it/730x250">
                    </div>
                    <div class="swiper-slide">
                        <img src="http://placehold.it/730x250">
                    </div>
                    <div class="swiper-slide">
                        <img src="http://placehold.it/730x250">
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="fourfive wide column">
            <div class="ui medium rectangle ad">
                <img src="http://placehold.it/300x250">
            </div>

            <!--<div class="ui middle algined segment">
                <h3 class="header">Recibe los pruductos más raros en tu email</h3>
                <form class="ui form">
                    <div class="field">
                        <input type="text">
                    </div>
                    <button class="ui submit button fluid">¡Quiero suscribirme!</button>
                </form>
            </div>-->
        </div>
    </div>

    <div class="ui fluid doubling borderless three item stackable menu">
        <a href="{{ route('products.latest') }}"
           class="item {{ active_class(if_route(['products.latest', 'home']), 'active') }}">
            <i class="big announcement icon"></i>
            Recientes
        </a>

        <a href="{{ route('products.popular') }}"
           class="item {{ active_class(if_route(['products.popular']), 'active') }}">
            <i class="big heart icon"></i>
            Populares
        </a>

        <a href="{{ route('products.cheap') }}" class="item {{ active_class(if_route(['products.cheap']), 'active') }}">
            <i class="big euro icon"></i>
            Baratos
        </a>
    </div>
</div>