@extends('frontend.layouts.sidebar')

@section('content')

    @include('frontend.layouts.partials._errors')

    <div class="ui attached message">
        <div class="header">
            Login
        </div>
    </div>
    <form method="POST" action="{{ route('auth.login') }}" class="ui form attached fluid segment">

        {!! csrf_field() !!}

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field">
            <label>Contraseña</label>
            <input type="password" name="password" id="password">
        </div>

        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="remember" tabindex="0" class="hidden">
                <label>Recuérdame</label>
            </div>

        </div>

        <div class="field">
            <div class="two fields">
                <div class="field">
                    <button type="submit" class="ui fluid button">Login</button>
                </div>
                <div class="field">
                    <a href="{{ route('auth.facebook') }}" class="ui fluid facebook button"><i class="icon facebook"></i> Login con Facebook</a>
                </div>
            </div>
        </div>

    </form>
    <div class="ui bottom attached message">
        <i class="icon help"></i>
        <a href="{{ route('password.reset') }}">Olvidé mi contraseña</a> | <a href="{{ route('auth.registration') }}">Registro</a>
    </div>
@endsection
