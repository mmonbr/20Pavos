<ul class="ShareButtons">
    <li class="ShareButton__item">
        <a rel="nofollow" target="_blank"
           href="http://facebook.com/sharer.php?u={{ $url }}">
            <img class="ShareButton__item__image"
                 src="{{ asset('img/share/facebook.png') }}"
                 alt="Compartir en facebook"></a>
    </li>
    <li class="ShareButton__item">
        <a rel="nofollow" target="_blank"
           href="http://twitter.com/share?url={{ $url }}&text={{ $name }}&via={{ config('settings.twitter.via') }}">
            <img class="ShareButton__item__image"
                 src="{{ asset('img/share/twitter.png') }}"
                 alt="Compartir en twitter"></a>
    </li>
    <li class="ShareButton__item">
        <a rel="nofollow" target="_blank"
           href="http://pinterest.com/pin/create/button/?url={{ $url }}&media=&description={{ $description }}&media={{ $media }}">
            <img class="ShareButton__item__image"
                 src="{{ asset('img/share/pinterest.png') }}"
                 alt="Compartir en pinterest"></a>
    </li>
</ul>