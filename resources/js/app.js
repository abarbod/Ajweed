/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue")
);

const app = new Vue({
    el: "#app"
});

/*********************************************************************************************************
 *
 * Front page navbar and scrolling.
 *
 *********************************************************************************************************/
const scrollOffset = 100; //variable for menu height

/**
 * Add dark background to navbar when it is fixed to top.
 */
// function toggleNavInBody() {
//     if ($(window).scrollTop() > 60) {
//         $('.site-nav').addClass('shadow-lg')
//     } else {
//         $('.site-nav').removeClass('shadow-lg')
//     }
// }

// $(window).on("load", toggleNavInBody);

// Scroll to page if there is hash in url.
$(window).on("load", function() {
    const target = $(location.hash);
    if (target.length > 0) {
        $(window)
            .scrollTop(target.offset().top - scrollOffset)
            .scrollLeft(target.offset().left);
    }
});

$(function() {
    // Change nav background color on scroll and on load.
    $(window).on("scroll", function() {
        //toggleNavInBody();
    });

    // Close nav bar on click (mobile)
    $(".nav-link").on("click", function() {
        $(".navbar-collapse").collapse("hide");
    });

    //Use smooth scrolling when clicking on navigation
    $(".navbar-nav a:not(.dropdown-toggle)").click(function() {
        if (
            this.hash.length > 0 && // Do we have hash in url
            location.pathname.replace(/^\//, "") ===
                this.pathname.replace(/^\//, "") &&
            location.hostname === this.hostname
        ) {
            let target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html,body").animate(
                    {
                        scrollTop: target.offset().top - scrollOffset
                    },
                    500
                );
                location.hash = this.hash;
                return false;
            }
        }
    });
});

import "slick-carousel";

$(document).ready(function() {
    $(".partners-slick").slick({
        rtl: true,
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $(".events-slick").slick({
        rtl: true,
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: true,
                    infinite: false,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: true,
                    dots: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: true
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});
