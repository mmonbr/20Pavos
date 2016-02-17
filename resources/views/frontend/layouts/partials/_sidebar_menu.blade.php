<div id="MobileSidebar" class="ui left vertical sidebar labeled icon menu">
    <a href="{{ route('home') }}" class="item"><i class="block home icon"></i> Inicio</a>
    <a href="{{ route('products.latest') }}" class="item"><i class="block bullhorn icon"></i> Novedades</a>
    <a href="{{ route('products.popular') }}" class="item"><i class="block heart icon"></i> Populares</a>
    <a href="{{ route('products.cheap') }}" class="item"><i class="block euro icon"></i> Baratos</a>
    <a href="{{ route('products.random') }}" class="item"><i class="block gift icon"></i> Sorpresa</a>
    @if(auth()->user())
        <a href="{{ route('users.edit') }}" class="item">
            <i class="block user icon"></i> {{ '@' . auth()->user()->username }}
        </a>
    @else
        <a href="{{ route('auth.registration') }}" class="item"><i class="block signup icon"></i> Registro</a>
        <a href="{{ route('auth.form') }}" class="item"><i class="block sign in icon"></i> Login</a>
    @endif
    <a href="{{ route('contact.form') }}" class="item"><i class="block envelope icon"></i>Contacto</a>
    <div class="item">
        @include('frontend.layouts.partials._search', ['prompt' => true, 'placeholder' => '¿Buscas algo?'])
    </div>
</div>