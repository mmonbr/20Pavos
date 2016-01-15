<form method="GET" action="{{ route('search') }}">
    <div class="ui search">
        <div class="ui @if(isset($fluid) && $fluid == true) fluid @endif icon input">
            <input class="@if(isset($prompt) && $prompt == true) prompt @endif" type="text" value="{{ $searchQuery }}" name="query" placeholder="{{ $placeholder or '¿Buscas algo?' }}">
            <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>
</form>