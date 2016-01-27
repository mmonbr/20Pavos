@extends('frontend.layouts.sidebar')

@section('content')
    <div class="ui piled segment">
        <div class="ui header">Lista de deseos de {{ $user->username }}</div>
    </div>
@endsection