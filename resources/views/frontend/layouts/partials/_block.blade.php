<div class="ui container" style="margin-bottom: 20px">
    <div id="Featured">
        <div class="Featured__carousel">
            <div class="slick-container">
                <div class="slick-slide">
                    <img data-lazy="http://placehold.it/640x400" class="ui image fluid">
                    <div class="slick-text"><a href="#">DIY Cookie Monster Rug</a></div>
                </div>

                <div class="slick-slide">
                    <img data-lazy="http://placehold.it/640x400" class="ui image fluid">
                    <div class="slick-text"><a href="#">DIY Cookie Monster Rug</a></div>
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

                <a href="{{ route('products.cheap') }}"
                   class="item {{ active_class(if_route(['products.cheap']), 'active') }}">
                    <i class="big euro icon"></i>
                    Baratos
                </a>
            </div>
        </div>

        <div class="Featured__extra">
            <div class="Featured__ads">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Header Block -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:300px;height:250px"
                     data-ad-client="ca-pub-7268316187159751"
                     data-ad-slot="9193927623"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div class="Featured__subscribe">
                <h3 class="Subscribe__header">Boletín semanal</h3>
                <p class="Subscribe__text">
                    <small>
                        Los productos más hilarantes cada lunes en tu email. Ya somos <strong>5420</strong>
                        derrochadores.
                    </small>
                </p>
                <form method="POST" action="{{ route('newsletter.subscribe') }}" class="ui large form">
                    {{ csrf_field() }}
                    <div class="field @if ($errors->has('subscriber_email')) error @endif">
                        <input type="email" name="subscriber_email" value="{{ old('subscriber_email') }}"
                               class="Subscribe__input" placeholder="Introduce tu email...">
                    </div>
                    <button class="ui yellow button Subscribe__button">¡Suscríbeme!</button>
                </form>
            </div>
        </div>
    </div>
</div>