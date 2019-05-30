document.addEventListener("DOMContentLoaded", function(event) {
    //do work
    jQuery( function ( $ ) {
        $('.publication-share').click(function (e) {
            e.preventDefault();
            $(this).parent().find('.container-publication-share').toggle();
        });
        $('.publication-share').on( "mouseenter", function() {
            $(this).parent().find('.container-publication-share').show();
        })
        .on( "mouseleave", function() {
            $(this).parent().find('.container-publication-share').hide();
        });
    });
});
