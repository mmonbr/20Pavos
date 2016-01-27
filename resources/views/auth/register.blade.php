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
            <li>Recibirás los productos más molones cada lunes en tu email</li>
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

        <button type="submit" class="ui fluid button">Registro</button>
    </form>
    <div class="ui bottom attached message">
        <i class="icon help"></i>
        ¿Ya eres miembro? <a href="{{ route('auth.form') }}">inicia sesión</a>.
    </div>
@endsection
