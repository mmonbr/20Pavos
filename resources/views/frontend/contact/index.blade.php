@extends('frontend.layouts.sidebar')

@section('content')

    @include('frontend.layouts.partials._errors')

    <div class="ui attached message">
        <div class="header">
            Contacto
        </div>
        <p>¿Tienes alguna duda?</p>
        <ul class="ui list">
            <li>Publicidad</li>
            <li>Dudasss</li>
        </ul>
    </div>
    <form method="POST" action="{{ route('contact.send') }}" class="ui form attached fluid segment">

        {!! csrf_field() !!}

        <div class="field">
            <label>Nombre</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field">
            <label>Motivo</label>
            <select name="subject" class="ui fluid dropdown selection">
                <option>He encontrado un producto increíble</option>
                <option>Sugerencias</option>
                <option>Publicidad</option>
                <option>Otros</option>
            </select>
        </div>

        <div class="field">
            <label>Contenido</label>
            <textarea name="content">{{ old('content') }}</textarea>
        </div>

        <div class="field">
            <button type="submit" class="ui yellow fluid button">Enviar</button>
        </div>
    </form>
    <div class="ui bottom attached message">
        <i class="icon help"></i>
        ¿Ya eres miembro? <a href="{{ route('auth.form') }}">inicia sesión</a>.
    </div>
@endsection