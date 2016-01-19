<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="{{ cdn_file($product->image_url) }}"
                 class="ui image fluid">
        </div>
        <div class="swiper-slide">
            <img src="{{ cdn_file($product->image_url) }}"
                 class="ui image fluid">
        </div>
        <div class="swiper-slide">
            <img src="{{ cdn_file($product->image_url) }}"
                 class="ui image fluid">
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>