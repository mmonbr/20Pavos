@extends('frontend.layouts.sidebar')

@section('content')

    @include('frontend.layouts.partials._errors')

    <div class="ui attached message">
        <div class="header">
            Registro
        </div>
        <p>Estas son algunas de las ventajas que obtendrás al registrarte en Derrochando.com</p>
        <ul class="ui list">
            <li>Compartir listas de regalos con tus amigos</li>
            <li>Los productos más molones cada lunes en tu email</li>
        </ul>
    </div>
    <form method="POST" action="{{ route('auth.register') }}" class="ui form attached fluid segment">

        {!! csrf_field() !!}

        <div class="field">
            <label>Nombre de usuario</label>
            <input type="text" name="username" value="{{ old('username') }}">
        </div>

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field">
            <label>Contraseña</label>
            <input type="password" name="password">
        </div>

        <div class="field">
            <label>Confirmar contraseña</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="is_subscribed" value="1" checked>
                <label>Acepto recibir los mejores productos en mi email cada Lunes.</label>
            </div>
        </div>

        <div class="field">
            <div class="two fields">
                <div class="field">
                    <button type="submit" class="ui yellow fluid button">Crear cuenta</button>
                </div>
                <div class="field">
                    <a href="{{ route('auth.facebook') }}" class="ui fluid facebook button"><i
                                class="icon facebook"></i> Crear cuenta con Facebook</a>
                </div>
            </div>
            <p>
                <small>
                    Al hacer clic en "Crear cuenta" certifico que tengo 13 años o más, y que acepto las Condiciones de
                    Uso y la Política de Privacidad.
                </small>
            </p>

        </div>
    </form>
    <div class="ui bottom attached message">
        <i class="icon help"></i>
        ¿Ya eres miembro? <a href="{{ route('auth.form') }}">inicia sesión</a>.
    </div>
@endsection
