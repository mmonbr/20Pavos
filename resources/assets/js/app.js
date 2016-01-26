var Vue = require('vue');

/*
 * DROPDOWNS
 */

$('.dropdown')
    .dropdown({
        on: 'hover'
    })
;

/*
 * SWIPER - PRODUCT IMAGE SLIDER
 */
/*var swiper = new Swiper('.swiper-container', {
 pagination: '.swiper-pagination',
 paginationClickable: true,
 nextButton: '.swiper-button-next',
 prevButton: '.swiper-button-prev',
 lazyLoading: true,
 spaceBetween: 30
 });*/

/*
 * Slick Caroussel
 */

$('.slick-container').slick({
    dots: false,
    autoplay: true,
    adaptiveHeight: true,
    autoplaySpeed: 4000
});

/*
 * INFINITE SCROLL
 */

var ias = jQuery.ias({
    container: '#Products',
    item: '.Product',
    pagination: '.pagination',
    next: '.active.item + a'
});

ias.extension(new IASSpinnerExtension({
    src: '/img/loading_spinner.gif',
    html: '<img class="ui centered image" src="{src}"/>'
}));

/*
 * Slider
 */

var slider = document.querySelector('.PriceSlider__container');

noUiSlider.create(slider, {
    start: [10],
    step: 5,
    range: {
        'min': [0],
        '95%': [180],
        'max': [2000]
    }
});

var priceSliderValue = document.querySelector('.PriceSlider__current');

slider.noUiSlider.on('update', function (values, handle) {
    priceSliderValue.innerHTML = values[handle] + '€';
});

