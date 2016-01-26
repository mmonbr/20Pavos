<a href="http://twitter.com/share?url={{ $url }}&text={{ $name }}&via={{ config('settings.twitter.via') }}"
   target="_blank" rel="nofollow">
    <img class="Product__Share--button" src="{{ asset('img/share/twitter.png') }}"
         alt="Compartir en twitter">
</a>
<a href="http://facebook.com/sharer.php?u={{ $url }}" target="_blank" rel="nofollow">
    <img class="Product__Share--button" src="{{ asset('img/share/facebook.png') }}"
         alt="Compartir en facebook">
</a>
<a href="http://pinterest.com/pin/create/button/?url={{ $url }}&media=&description={{ $description }}&media={{ $media }}"
   target="_blank" rel="nofollow">
    <img class="Product__Share--button" src="{{ asset('img/share/pinterest.png') }}"
         alt="Compartir en pinterest">
</a>