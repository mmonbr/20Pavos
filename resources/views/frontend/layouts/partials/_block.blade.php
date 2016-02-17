<div class="ui container">
    <div id="Featured">
        <div class="Featured__carousel">
            <div class="slick-container">
                @foreach($featuredProducts as $featured)
                    <div class="slick-slide">
                        <a href="{{ $featured->referral_link }}" rel="nofollow" target="_blank">
                            <img src="{{ cdn_file($featured->attachments->first()->path) }}"
                                 class="ui image fluid">
                            <div class="slick-meta">
                                <h3>
                                    {{ $featured->name }}
                                </h3>
                                <p>
                                    {{ $featured->price }} <i class="fitted euro icon"></i>
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="ui fluid doubling borderless four item stackable menu">
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

                <a href="{{ route('products.random') }}"
                   class="item {{ active_class(if_route(['products.random']), 'active') }}" target="_blank">
                    <i class="big gift icon"></i>
                    Sorpresa
                </a>
            </div>
        </div>

        <div class="Featured__extra">
            <div class="Featured__extra__ads">
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
            <div class="Featured__extra__subscribe">
                <h3 class="Featured__extra__subscribe__header"><i class="at icon"></i> Boletín semanal</h3>
                <p class="Featured__extra__subscribe__text">
                    <small>
                        Los productos más hilarantes cada lunes en tu email. Ya somos <strong>{{ $subscribers_count }}</strong>
                        derrochadores.
                    </small>
                </p>
                <form method="POST" action="{{ route('newsletter.subscribe') }}" class="ui large form">
                    {{ csrf_field() }}
                    <div class="field @if ($errors->has('subscriber_email')) error @endif">
                        <input type="email" name="subscriber_email" value="{{ old('subscriber_email') }}"
                               class="Featured__extra__subscribe__input" placeholder="Introduce tu email...">
                    </div>
                    <button class="ui yellow button Featured__extra__subscribe__button">¡Suscríbeme!</button>
                </form>
            </div>
        </div>
    </div>
</div>