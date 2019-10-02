$(document).ready(function() {

"use strict";


/* =================================
   LOADER                     
=================================== */
// makes sure the whole site is loaded
$(window).on('load', function() {

    // will first fade out the loading animation
    $(".loader-inner").fadeOut();
    // will fade out the whole DIV that covers the website.
    $(".loader").fadeOut("slow");

});


/* =================================
   NAVBAR COLLAPSE ON SCROLL
=================================== */
$(window).on('scroll', function(){
    var b = $(window).scrollTop();
    if( b > 60 ){
        $(".navbar").addClass("top-nav-collapse");
    } else {
        $(".navbar").removeClass("top-nav-collapse");
    }
});


/* =================================
   NAVBAR WITH TOP BAR
=================================== */
$('.nav-2').affix({
      offset: {
        top: $('.top-bar').height()
      }
});


/* ===========================================================
   PAGE SCROLLING FEATURE
============================================================== */
$('a.smooth-scroll').on('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top + 20
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
});
/* ===========================================================
   BACK TO TOP BUTTON
============================================================== */
var offset = 300,
//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
offset_opacity = 1200,
//duration of the top scrolling animation (in ms)
scroll_top_duration = 700,
//grab the "back to top" link
$back_to_top = $('.top');

//hide or show the "back to top" link
$(window).on('scroll', function() {
    ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('is-visible') : $back_to_top.removeClass('is-visible fade-out');
    if( $(this).scrollTop() > offset_opacity ) {
        $back_to_top.addClass('fade-out');
    }
});

//smooth scroll to top
$back_to_top.on('click', function(event){
    event.preventDefault();
    $('body,html').animate({
        scrollTop: 0
        }, scroll_top_duration
    );
});


/* ===========================================================
   HIDE MOBILE MENU AFTER CLICKING 
============================================================== */
$('.navbar-nav>li>a:not(#dLabel)').on('click', function(){
    $('#navbar-collapse').removeClass("in").addClass("collapse"); 
});


/* ===========================================================
   BOOTSTRAP FIX FOR IE10 in Windows 8 and Windows Phone 8  
============================================================== */
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style');
    msViewportStyle.appendChild(
        document.createTextNode(
            '@-ms-viewport{width:auto!important}'
            )
        );
    document.querySelector('head').appendChild(msViewportStyle);
}



}); // End $(document).ready Function