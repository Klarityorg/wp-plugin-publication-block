document.addEventListener("DOMContentLoaded", function(event) {
    'use strict';
    //do work
    jQuery( function ( $ ) {
        $('.publication-share').click(function (e) {
            e.preventDefault();
            if($(this).parent().find('.container-publication-share').hasClass("toggled-on"))
            {
                $(this).parent().find('.container-publication-share').removeClass("toggled-on");
            }
            else{
                $(this).parent().find('.container-publication-share').addClass("toggled-on");
            }

        });
        $('.publication-share').on( "mouseenter", function() {
            $(this).parent().find('.container-publication-share').addClass("toggled-on");
        })
        .on( "mouseleave", function() {
            $(this).parent().find('.container-publication-share').removeClass("toggled-on");
        });
    });
});
