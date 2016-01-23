<header class="ui borderless doubling top large stackable menu">
    <div class="ui container">
        <a href="{{ route('home') }}" class="item">
            <h1>Derrochando</h1>
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