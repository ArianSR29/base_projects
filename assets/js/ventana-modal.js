//----- Jquery para crear ventanas modales
$(document).ready(function() {
    $('.btn-agendar').on('click', function() {
        $('.c-agenda-quirofano').addClass('visible');
        $('body').addClass('non-scroll');

    })
    $('.close-fancy').on('click', function() {
        $(this).closest('.c-agenda-quirofano').removeClass('visible');
        $('body').removeClass('non-scroll');
    });
})