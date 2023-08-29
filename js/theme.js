﻿(function ($) {
    "use strict";

    var $window = $(window);
    var $document = $(document);
    
    /** Preload  **/    
    $window.on('load',function(){
        $('#preloader').fadeOut('slow',function(){
           $(this).remove();
        });        
    });

    /** Scroll Functions **/
    $window.on('scroll',function () {
        if ($(this).scrollTop() > 300) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });
    $(function () { 
        $('.scroll-top').on('click', function () {
            $('html, body').animate({ scrollTop: 0 }, 2000);
            return false;
        });

        // Scroll Down Elements
        $('.scroll-down[href^="#"], .scroll-to-target[href^="#"]').on('click', function (e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });
    });
    /** Intro Height **/
    $(window).on('scroll',function () {
        var scrolled = $(window).scrollTop();
        var windHeight = $(window).height();
        if (scrolled > 100) {
            $('.header').addClass('header-sticky-top');
        } else {
            $('.header').removeClass('header-sticky-top');
        }

        if (scrolled > 1) {
            $('.header').addClass('header-fixed');
        } else {
            $('.header').removeClass('header-fixed');
        }
    });
    /** Navigation Menu panel **/
    $(function () { 
        var mobile_menu_icon = $(".nav-menu-icon");
        var mobile_menu = $(".nav-menu");

        // Mobile menu max height    
        mobile_menu.css("max-height", $window.height() - 65 + "px");

        // Mobile menu style toggle
        $(".nav-menu-icon").on('click',function () {
            mobile_menu_icon.toggleClass('active');
            mobile_menu.toggleClass('active');
            return false;
        });
    });
    /** Isotope Portfolio Grid **/
    $window.on('load',function () {  
        containerGridMasonry();
    });
        
    $document.on('ready',function () {
        containerGridMasonry();  
    });

    function containerGridMasonry() {

        var $container = $('.portfolio-grid-fit');
        $container.isotope({
            itemSelector: '.portfolio-item',
            layoutMode: 'fitRows',
            transitionDuration: '.8s'
        })

        // bind filter button click
        $('.portfolio-filter').on('click', '.categories', function () {
            var filterValue = $(this).attr('data-filter');
            $container.isotope({ filter: filterValue });
        });

        // change active class on categories
        $('.categories-filter').each(function (i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', '.categories', function () {
                $buttonGroup.find('.active').removeClass('active');
                $(this).addClass('active');
            });
        });
    };
    /** Workskill Bar **/
    $(function(){
        $('.work-skill.design').circleProgress({
            value: 1
           }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
        });
           $('.work-skill.html').circleProgress({
            value: 1
           }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
        });
        $('.work-skill.code').circleProgress({
            value: 1
           }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
        });
        $('.work-skill.php').circleProgress({
            value: 1
           }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
        });
    });
    /** Counter Number **/
    $(function(){
        $(".counter-num").appear(function () {
            var counter = $(this);
            counter.countTo({
                from: 0,
                to: counter.html(),
                speed: 1300,
                refreshInterval: 60,
            });
        });
    });
    /** Counter Number **/
    $(function(){
        var PageHtmlImgae = $('.bg-image,.about-me,.contact-section,.service,.testimonials,.education-section');
        PageHtmlImgae.each(function () {
            if ($(this).attr("data-background-img")) {
                $(this).css("background-image", "url(" + $(this).data("background-img") + ")");
            }
            if ($(this).attr("data-bg-position")) {
                $(this).css("background-position", $(this).data("bg-position"));
            }
            if ($(this).attr("data-height")) {
                $(this).css("height", $(this).data("height") + 'px');
            }
        });
    }); 
   /**  Main Slider **/
    $(function(){
        $('.intro-section').owlCarousel({
         items:1,               
         loop:true,      
         autoplay:true,
         autoplayTimeout:6000,
         autoplayHoverPause:false, 
         dots:false,
         nav:true ,        
         navigationText: [
                    "<i class='fa fa-angle-left'></i>", 
                    "<i class='fa fa-angle-right'></i>"
                    ] 
        });
    });
    /** Testimonial Carousel **/
    $(function(){
        $('.testimonial-carousel').owlCarousel({
         items:1,               
         loop:true,      
         autoplay:true,
         autoplayTimeout:6000,
         autoplayHoverPause:false, 
         dots:true,
         nav:false,
         smartSpeed:2000,
         navigationText: [
                    "<i class='fa fa-angle-left'></i>", 
                    "<i class='fa fa-angle-right'></i>"
                    ]       
        });
    });
    /** Demo3 Blog Carousel **/
    $(function(){
        $('.blog-slider').owlCarousel({
         items:3,               
         loop:true,      
         autoplay:true,
         autoplayTimeout:6000,
         autoplayHoverPause:false, 
         dots:false,
         nav:true,         
         margin:20,
         responsiveClass:true,
         responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:true
            },
            1000:{
                items:3,
                nav:true
               
            }
         },
         navigationText: [
                    "<i class='fa fa-angle-left'></i>", 
                    "<i class='fa fa-angle-right'></i>"
                    ]       
        });
    });
    /** Navigation Menu **/
   
/*   $(function () { 
    $('.singlepage-nav').singlePageNav({
      offset: 0,
      filter: ':not(.external-link)',
      updateHash: true,
      currentClass: 'current',
      easing: 'swing',
      speed: 750,
      beforeStart: function () {
        if ($(window).width() < 1024) {
           $('.nav-menu-icon').removeClass('active');
           $('.nav-menu').removeClass('active');
            };
       }
     });
  });*/

/*=================================*/
/* 2. Slider jQuery                   */
/*=================================*/
 $(function () { 
    $(".slider").owlCarousel({     
         items:1,               
         loop:true,      
         autoplay:true,
         autoplayTimeout:4000,
         autoplayHoverPause:false, 
         dots:false,
         nav:false 
   });       
/*=================================*/
/* 3. Slider with Wow effect        */
/*=================================*/
 var wow = new WOW(
  {
    animateClass: 'animated',
    offset:       100,
    callback:     function(box) {
      console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
  }
);
wow.init(); 
$(".slider").on('changed.owl.carousel', function(event) {       
    wow = new WOW(
        {
            boxClass:     'slider-text', 
            animateClass: 'animated',
            offset:       100
        }
    );
        wow.init();
    }); 
}); 
})(jQuery);