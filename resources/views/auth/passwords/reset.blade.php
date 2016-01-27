@extends('frontend.layouts.sidebar')

@section('content')

    @include('frontend.layouts.partials._errors')

    <div class="ui attached message">
        <div class="header">
            Reiniciar contraseña
        </div>
        <p>
            Una vez enviado el formulario recibirás un email en el que se te indicarán los pasos a seguir.
        </p>
    </div>
    <form method="POST" action="{{ route('password.reset') }}" class="ui form attached fluid segment">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field">
            <label>Contraseña</label>
            <input type="password" name="password">
        </div>

        <div class="field">
            <label>Confirma tu contraseña</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit" class="ui fluid button">
            Cambiar contraseña
        </button>
    </form>
@endsection
