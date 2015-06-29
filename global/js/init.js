$(document).ready(function() {
    $('#preloader-container').hide();
    /* Menu */
    $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 240
        closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor
    });
    
    /* Scroll */
    $('html').niceScroll();
    $('#nav-mobile').niceScroll();
});

$( window ).resize(function(){
    $('html').getNiceScroll().resize();
    $('#nav-mobile').getNiceScroll().resize();
});

$('#nav-mobile a').click(function(){
    $('#preloader-container').show();
});

$('button#login').click(function(){
    $('#preloader-container').show();
});