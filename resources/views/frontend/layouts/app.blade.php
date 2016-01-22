<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.partials._head')
</head>
<body>

@include('frontend.layouts.partials._header')


<div class="ui container">
    @yield('content')
</div>

@include('frontend.layouts.partials._scripts')

</body>
</html>
