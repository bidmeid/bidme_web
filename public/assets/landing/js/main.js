/*------------------------------------------------------------------
[Custom JS File]

Project:        Sisa - Multipurpose Portfolio HTML5 Template
Version:        1.0
Last change:    28/02/19
Author Name:    IdealWebGuru
-------------------------------------------------------------------*/


/*------------------------------------------------------------------
[Table of contents]


1. Preloader
2. Smooth Scroll
3. Removing Nav Active
4. Animated Headline Initialize
5. Mixitup Initialize
6. Testimonial Carousel


-------------------------------------------------------------------*/


$(document).ready(function($){
    "use strict";

    // ---- Preloader
    $(window).on('load', function(e) { 
        e.preventDefault();
        $('#status').fadeOut(); 
        $('#preloader').delay(350).fadeOut('slow'); 
        $('body').delay(350).css({'overflow':'visible'});
    })

    //---- Smooth Scroll to Targeted Section

    $('.logo-wrapper a, .left-footer a').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('.home').offset().top
        }, 1000);
    });

    $('.nav-list li a').on('click',function() {

        $('.nav-active').attr('class', '');
        $(this).attr('class','nav-active');

        var target = $(this).data('target');
        
        $('html, body').animate({
            scrollTop: $('#'+target).offset().top
        }, 1000);

    });


    // ---- Removing all Navigation .nav-active classes when clicked anywhere
    var hide = true;
    $('.content').on('click', function () {
        if (hide) $('.nav-active').removeClass('nav-active');
        hide = true;
    });


    // ---- Animated Headline Initialize
    $(function() {
        $('.selector').animatedHeadline({
            animationType: 'rotate-1'
        });
    })

    // ---- Mixitup Initialize
    var mixer = mixitup('.portfolio-container', {
		load: {
			filter: '.sekertariat'
		}
	});


    // ---- Testimonial Carousel

    


}(jQuery));