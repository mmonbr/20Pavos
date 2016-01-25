<div class="ui container" style="margin-bottom: 20px">
    <div id="Featured">
        <div class="Featured__carousel">
            <div class="slick-container">
                <div><img src="http://placehold.it/640x400" class="ui fluid image"></div>
                <div><img src="http://placehold.it/640x400" class="ui fluid image"></div>
                <div><img src="http://placehold.it/640x400" class="ui fluid image"></div>
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

                <a href="{{ route('products.cheap') }}"
                   class="item {{ active_class(if_route(['products.cheap']), 'active') }}">
                    <i class="big euro icon"></i>
                    Baratos
                </a>
            </div>
        </div>

        <div class="Featured__extra">
            <div class="Featured__ads">
                <img src="http://placehold.it/300x250">
            </div>
            <div class="Featured__subscribe">
                <h3 class="Subscribe__header">Boletín semanal</h3>
                <p class="Subscribe__text">
                    <small>
                        Los productos más hilarantes cada lunes en tu email. Ya somos <strong>5420</strong>
                        derrochadores.
                    </small>
                </p>
                <form class="ui large form">
                    <div class="field">
                        <input type="email" name="email" class="Subscribe__input" placeholder="Introduce tu email...">
                    </div>
                    <button class="ui yellow button Subscribe__button">¡Suscríbeme!</button>
                </form>
            </div>
        </div>

        <div style="clear: both"></div>
    </div>
</div>