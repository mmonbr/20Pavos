<header class="ui top fixed fluid four item borderless doubling stackable small menu">
    <div class="ui container">
        <a href="{{ route('home') }}" class="item">
            <!--<img class="ui image" src="{{ asset('img/drr.png') }}">-->
            <h1>Derrochando</h1>
        </a>
        <div class="ui dropdown item">
            <i class="big sidebar icon"></i>
            Explorar
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

        @if(auth()->user())
            <div class="ui dropdown item" tabindex="0">
                <img class="ui avatar image" src="{{ Gravatar::src(auth()->user()->email, 28) }}">
                {{ '@' . auth()->user()->username }}<i class="dropdown icon"></i>

                <div class="menu">
                    <a class="item"><i class="gift icon"></i> Lista de regalos</a>
                    <a href="{{ route('users.edit', [auth()->user()->username]) }}" class="item"><i
                                class="wrench icon"></i> Configuración</a>
                    <a href="{{ route('auth.logout') }}" class="item"><i class="sign out icon"></i> Logout</a>
                </div>
            </div>
        @else
            <div class="ui dropdown item">
                <i class="big user icon"></i>
                Mi cuenta

                <div class="menu">
                    <a href="{{ route('auth.registration') }}" class="item"><i class="signup icon"></i> Registro</a>
                    <a href="{{ route('auth.form') }}" class="item"><i class="sign in icon"></i> Login</a>
                </div>
            </div>
        @endif

        <div class="item">
            @include('frontend.layouts.partials._search', ['prompt' => true, 'placeholder' => '¿Buscas algo?'])
        </div>
    </div>
</header>