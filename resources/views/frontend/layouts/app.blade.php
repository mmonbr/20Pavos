<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.partials._head')
</head>
<body>

@include('frontend.layouts.partials._header')
@include('frontend.layouts.partials._block')

<div class="ui mobile only container">
    @yield('content')
</div>

@include('frontend.layouts.partials._scripts')

</body>
</html>
