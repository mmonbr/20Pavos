<div id="MobileSidebar" class="ui left vertical menu sidebar">
    <a href="{{ route('home') }}" class="item"><i class="block home icon"></i> Inicio</a>
    <a href="{{ route('products.latest') }}" class="item"><i class="block bullhorn icon"></i> Novedades</a>
    <a href="{{ route('products.popular') }}" class="item"><i class="block heart icon"></i> Populares</a>
    <a href="{{ route('products.cheap') }}" class="item"><i class="block euro icon"></i> Baratos</a>
    @if(auth()->user())
        <div class="ui dropdown item">
            <img class="ui avatar image" src="{{ Gravatar::src(auth()->user()->email, 28) }}">
            {{ '@' . auth()->user()->username }}<i class="dropdown icon"></i>

            <div class="menu">
                <a class="item"><i class="gift icon"></i> Lista de regalos</a>
                <a href="{{ route('users.edit') }}" class="item"><i
                            class="wrench icon"></i> Configuración</a>
                <a href="{{ route('auth.logout') }}" class="item"><i class="sign out icon"></i> Logout</a>
            </div>
        </div>
    @else
        <a href="{{ route('auth.registration') }}" class="item"><i class="block signup icon"></i> Registro</a>
        <a href="{{ route('auth.form') }}" class="item"><i class="block sign in icon"></i> Login</a>
    @endif
    <a href="{{ route('contact.form') }}" class="item"><i class="block envelope icon"></i>Contacto</a>
    <div class="item">
        @include('frontend.layouts.partials._search', ['prompt' => true, 'placeholder' => '¿Buscas algo?'])
    </div>
</div>