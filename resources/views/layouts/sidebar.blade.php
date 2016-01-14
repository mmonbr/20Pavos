<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials._head')
</head>
<body>

@include('layouts.partials._header')

<div class="ui container">
    <div class="ui two column stackable grid">
        <div class="twelve wide column">
            @yield('content')
        </div>
        <div class="four wide column">
            @include('layouts.partials._sidebar')
        </div>
    </div>
</div>

@include('layouts.partials._scripts')

</body>
</html>
