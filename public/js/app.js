(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

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

},{}]},{},[1]);

//# sourceMappingURL=app.js.map
