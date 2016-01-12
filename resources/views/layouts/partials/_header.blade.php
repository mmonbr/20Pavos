<header class="ui borderless doubling top large stackable menu">
    <div class="ui container">
        <a  href="{{ route('home') }}" class="item">
            <img src="http://semantic-ui.com/images/logo.png">
        </a>

        <div class="ui dropdown item">
            <i class="big sidebar icon"></i>
            Categorías
            <div class="menu">
                <a class="item">Novedades</a>
                <a class="item">Menos de 20€</a>
                <a class="item">Para él</a>
                <a class="item">Para ella</a>
            </div>
        </div>

        <a href="{{ route('products.popular') }}" class="item">
            <i class="big heart icon"></i>
            Populares
        </a>


        <a href="#" class="item">
            <i class="big announcement icon"></i>
            Novedades
        </a>

        <a href="#" class="item">
            <i class="big euro icon"></i>
            Baratos
        </a>

        <div class="right menu">
            <div class="item">
                <div class="ui category search">
                    <div class="ui icon input">
                        <form method="GET" action="{{ route('search') }}">
                            <input class="prompt" type="text" name="query" placeholder="¿Qué buscas?">
                            <i class="search icon"></i>
                        </form>
                    </div>
                    <div class="results"></div>
                </div>
            </div>
        </div>
    </div>
</header>