@if($type == 'Buttons')
    <div class="ShareButtons">
        <a class="ui button facebook new_window" href="http://facebook.com/sharer.php?u={{ $url }}" target="_blank" rel="nofollow">
            <i class="fitted facebook icon"></i>
            <span class="ShareButton__network">Facebook</span>
        </a>
        <a class="ui button twitter new_window"
           href="http://twitter.com/share?url={{ $url }}&text={{ $name }}&via={{ config('settings.twitter.via') }}"
           target="_blank" rel="nofollow">
            <i class="fitted twitter icon"></i>
            <span class="ShareButton__network">Twitter</span>
        </a>
        <a class="ui button red new_window"
           href="http://pinterest.com/pin/create/button/?url={{ $url }}&media=&description={{ $description }}&media={{ $media }}"
           target="_blank" rel="nofollow">
            <i class="fitted pinterest icon"></i>
            <span class="ShareButton__network">Pinterest</span>
        </a>
    </div>
@endif

@if($type == 'List')
    <ul class="ShareButtonsList">
        <li class="ShareButton__item">
            <a rel="nofollow" target="_blank" class="new_window"
               href="http://facebook.com/sharer.php?u={{ $url }}">
                <img class="ShareButton__item__image"
                     src="{{ asset('img/share/facebook.png') }}"
                     alt="Compartir en facebook"></a>
        </li>
        <li class="ShareButton__item">
            <a rel="nofollow" target="_blank" class="new_window"
               href="http://twitter.com/share?url={{ $url }}&text={{ $name }}&via={{ config('settings.twitter.via') }}">
                <img class="ShareButton__item__image"
                     src="{{ asset('img/share/twitter.png') }}"
                     alt="Compartir en twitter"></a>
        </li>
        <li class="ShareButton__item">
            <a rel="nofollow" target="_blank" class="new_window"
               href="http://pinterest.com/pin/create/button/?url={{ $url }}&media=&description={{ $description }}&media={{ $media }}">
                <img class="ShareButton__item__image"
                     src="{{ asset('img/share/pinterest.png') }}"
                     alt="Compartir en pinterest"></a>
        </li>
    </ul>
@endif