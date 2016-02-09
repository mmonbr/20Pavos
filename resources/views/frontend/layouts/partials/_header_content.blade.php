<div class="ui grid container">
    <div class="computer only row">
        <div class="item">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/drr.png') }}" class="logo_medium">
            </a>
        </div>

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
                <a href="{{ route('contact.form') }}" class="item">Contacto</a>
            </div>
        </div>

        <div class="right menu">
            @if(auth()->user())
                <div class="ui dropdown item">
                    <img class="ui avatar image" src="{{ Gravatar::src(auth()->user()->email, 28) }}">
                    {{ '@' . auth()->user()->username }}<i class="dropdown icon"></i>

                    <div class="menu">
                        <!--<a class="item"><i class="gift icon"></i> Lista de regalos</a>-->
                        <a href="{{ route('users.edit') }}" class="item"><i
                                    class="wrench icon"></i> Configuración</a>
                        <a href="{{ route('auth.logout') }}" class="item"><i class="sign out icon"></i> Logout</a>
                    </div>
                </div>
            @else
                <a href="{{ route('auth.registration') }}" class="item"><i class="big signup icon"></i> Registro</a>
                <a href="{{ route('auth.form') }}" class="item"><i class="big sign in icon"></i> Login</a>
            @endif
            <div class="item">
                @include('frontend.layouts.partials._search', ['prompt' => true, 'placeholder' => '¿Buscas algo?'])
            </div>
        </div>
    </div>
    <div class="tablet and mobile only row">
        <a class="item toggle button">
            <i class="fitted big sidebar icon"></i>
        </a>

        <div class="right menu">
            <div class="item">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/drr.png') }}" class="logo_small">
                </a>
            </div>
        </div>
    </div>
</div>