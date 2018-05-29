//----- Jquery menus pegajosos
var flag = false;
var scroll;

$(window).scroll(function() {
    scroll = $(window).scrollTop();
    //console.log(scroll);
    if (scroll > 150) {
        if (!flag) {
            $('.c-llamanos-banner').addClass('stiky');
            flag = true;
        }
    } else {
        if (flag) {
            $('.c-llamanos-banner').removeClass('stiky');
            flag = false;
        }
    }
});