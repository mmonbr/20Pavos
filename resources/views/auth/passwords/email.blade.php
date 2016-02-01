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
    <form method="POST" action="{{ route('password.email') }}" class="ui form attached fluid segment">
        {!! csrf_field() !!}

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <button type="submit" class="ui yellow fluid button">
                Reiniciar contraseña
            </button>
        </div>
    </form>
@endsection
