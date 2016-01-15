<header class="ui borderless doubling top large stackable menu">
    <div class="ui container">
        <a href="{{ route('home') }}" class="item">
            <img src="http://semantic-ui.com/images/logo.png">
        </a>

        <div class="ui dropdown item">
            <i class="big sidebar icon"></i>
            Categorías
            <div class="menu">
                @foreach($categories as $category)
                    <a href="{{ route('categorias.show' , [$category['slug']]) }}"
                       class="item">{{ $category['name'] }}</a>
                @endforeach
            </div>
        </div>

        <a href="{{ route('home') }}?filtro=nuevos" class="item">
            <i class="big announcement icon"></i>
            Recientes
        </a>

        <a href="{{ route('home') }}?filtro=populares" class="item">
            <i class="big heart icon"></i>
            Populares
        </a>

        <a href="{{ route('home') }}?filtro=baratos" class="item">
            <i class="big euro icon"></i>
            Baratos
        </a>

        <div class="right menu">
            <div class="item">
                @include('frontend.layouts.partials._search', ['prompt' => true, 'placeholder' => '¿Buscas algo?'])
            </div>
        </div>
    </div>
</header>