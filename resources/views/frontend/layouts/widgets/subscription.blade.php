<div class="ui segment">
    <h4 class="ui header">Suscríbete</h4>
</div>

<form action="{{ route('newsletter.subscribe') }}" method="POST" class="ui form">
    {{ csrf_field()  }}
    <div class="ui field fluid icon @if ($errors->has('subscriber_email')) error @endif input">
        @if ($errors->has('email'))
            <input type="email" value="{{ old('subscriber_email') }}" name="subscriber_email" placeholder="{{ $errors->first('subscriber_email') }}">
        @else
            <input type="email" value="{{ old('subscriber_email') }}" name="subscriber_email" placeholder="Introduce tu email">
        @endif
        <i class="mail icon"></i>
    </div>
</form>