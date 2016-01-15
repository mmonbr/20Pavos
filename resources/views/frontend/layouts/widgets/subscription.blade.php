<div class="ui segment">
    <h4 class="ui header">Suscríbete</h4>
</div>

<form action="{{ route('newsletter.subscribe') }}" method="POST" class="ui form">
    {{ csrf_field()  }}
    <div class="ui fluid icon input">
        <input type="email" value="{{ old('email') }}" name="email" placeholder="Introduce tu email">
        <i class="mail icon"></i>
    </div>
</form>