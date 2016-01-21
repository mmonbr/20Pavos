<header class="ui borderless doubling top large stackable menu">
    <div class="ui container">
        <a href="{{ route('home') }}" class="item">
            <img src="{{ asset('img/logo.png') }}">
        </a>

        <div class="ui dropdown item">
            <i class="big sidebar icon"></i>
            Categorías
            <div class="menu">
                <a href="#" class="item">Novedades</a>
                <a href="{{ route('home') }}?max_price=10" class="item">Menos de 10€</a>
                <a href="#" class="item">Categoría 1</a>
                <a href="#" class="item">Categoría 2</a>
                <a href="#" class="item">Categoría 3</a>
                <a href="#" class="item">Categoría 4</a>
                <a href="#" class="item">Contacto</a>
            </div>
        </div>

        <a href="{{ route('products.latest') }}" class="item {{ active_class(if_route(['products.latest', 'home']), 'active') }}">
            <i class="big announcement icon"></i>
            Recientes
        </a>

        <a href="{{ route('products.popular') }}" class="item {{ active_class(if_route(['products.popular']), 'active') }}">
            <i class="big heart icon"></i>
            Populares
        </a>

        <a href="{{ route('products.cheap') }}" class="item {{ active_class(if_route(['products.cheap']), 'active') }}">
            <i class="big euro icon"></i>
            Baratos
        </a>

        <a href="{{ route('home') }}" class="item">
            <i class="big user icon"></i>
            Mi cuenta
        </a>

        <div class="right menu">
            <div class="item">
                @include('frontend.layouts.partials._search', ['prompt' => true, 'placeholder' => '¿Buscas algo?'])
            </div>
        </div>
    </div>
</header>