@extends('frontend.layouts.sidebar')

@section('content')
    @include('frontend.layouts.partials._errors')

    <div class="ui attached message">
        <div class="header">
            Actualiza tus datos
        </div>
    </div>
    <form method="POST" action="{{ route('users.update', auth()->user()->id) }}" class="ui form attached fluid segment">

        {!! csrf_field() !!}

        <input type="hidden" name="_method" value="PATCH">

        <div class="field">
            <label>Nombre de usuario</label>
            <input type="text" name="username" value="{{ $user->username }}">
        </div>

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="field">
            <label>Contraseña</label>
            <input type="password" name="password">
        </div>

        <div class="field">
            <label>Confirmar contraseña</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit" class="ui fluid button">Actualizar mis datos</button>
    </form>
@endsection