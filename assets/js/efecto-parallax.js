//----- Jquery efectos parallax
$(window).bind('scroll', function(e) {
    parallaxScroll();
});

function parallaxScroll() {
    var scrollEje_Y = $(window).scrollTop();
    $('.info-banner').css('left', +((scrollEje_Y * -0.5)) + 'px');
}
