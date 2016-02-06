<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.partials._head')
</head>
<body>

@include('frontend.layouts.partials._sidebar_menu')

<div class="pusher">
    @include('frontend.layouts.partials._facebook')
    @include('frontend.layouts.partials._header')

    <div class="ui container">
        <div class="ui two column stackable grid">
            <div class="twelve wide column">
                @yield('content')
            </div>
            <div class="four wide column">
                @include('frontend.layouts.partials._sidebar')
            </div>
        </div>
    </div>
</div>

@include('frontend.layouts.partials._scripts')

</body>
</html>
