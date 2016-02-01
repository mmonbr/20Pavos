<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.partials._head')
</head>
<body>

@include('frontend.layouts.partials._facebook')
@include('frontend.layouts.partials._header')

@if(in_array(Route::current()->getName(), ['products.latest', 'products.popular', 'products.cheap', 'home']))
    @include('frontend.layouts.partials._block')
@endif

<div class="ui container">
    @yield('content')
</div>

@include('frontend.layouts.partials._scripts')

</body>
</html>