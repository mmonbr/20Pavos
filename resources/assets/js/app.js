/*
 * SWIPER - PRODUCT IMAGE SLIDER
 */
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 30
});

/*
 * INFINITE SCROLL
 */

var ias = jQuery.ias({
    container: '#products-container',
    item: '.card',
    pagination: '.pagination',
    next: '.active.item + a'
});

ias.extension(new IASSpinnerExtension({
    src: '/img/loading_spinner.gif',
    html: '<img class="ui centered image" src="{src}"/>'
}));

