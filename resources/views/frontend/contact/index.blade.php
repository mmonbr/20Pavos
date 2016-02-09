@extends('frontend.layouts.sidebar')

@section('content')

    @include('frontend.layouts.partials._errors')

    <div class="ui attached message">
        <div class="header">
            Contacta con nosotros
        </div>
        <p class="utility-justify">¿Tienes alguna duda? ¿Has encontrado algún producto increíble y te gustaría que lo añadiéramos al catálogo? ¡Escríbenos! También te atenderemos si tienes sugerencias, la web está en llamas o, por supuesto, si quieres anunciarte en Derrochando.com ;) </p>
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
            <label>¿Por qué nos escribes?</label>
            <select name="subject" class="ui fluid dropdown selection">
                <option>He encontrado un producto muy interesante</option>
                <option>Tengo una sugerencia para mejorar la web</option>
                <option>¿Me ayudáis con esta duda o problema?</option>
                <option>Soy un posible anunciante. ¿Hablamos?</option>
                <option>Otros motivos</option>
            </select>
        </div>

        <div class="field">
            <label>Tú dirás…</label>
            <textarea name="content">{{ old('content') }}</textarea>
        </div>

        <div class="field">
            <button type="submit" class="ui yellow fluid button">Enviar</button>
        </div>
    </form>
@endsection