<div class="ui segment">
    <h4 class="ui header">Suscríbete</h4>
</div>

<form action="{{ route('newsletter.subscribe') }}" method="POST" class="ui form">
    {{ csrf_field()  }}
    <div class="ui field fluid icon @if ($errors->has('email')) error @endif input">
        @if ($errors->has('email'))
            <input type="email" value="{{ old('email') }}" name="email" placeholder="{{ $errors->first('email') }}">
        @else
            <input type="email" value="{{ old('email') }}" name="email" placeholder="Introduce tu email">
        @endif
        <i class="mail icon"></i>
    </div>
</form>