/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$(function () {
    const scrollOffset = 100; //variable for menu height

    // Change nav background color on scroll and on load.
    $(window).on('scroll load', function () {

        console.log('WINDOW EVENT');

        if ($(this).scrollTop() > 60) {
            $('.site-nav').addClass('inbody')
        } else {
            $('.site-nav').removeClass('inbody')
        }
    });

    // Close nav bar on click (mobile)
    $('.nav-link').on('click', function () {
        $('.navbar-collapse').collapse('hide');
    });

    //Use smooth scrolling when clicking on navigation
    $('.navbar-nav a:not(.dropdown-toggle)').click(
        function () {

            if (
                location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname
            ) {
                let target = $(this.hash);
                target = target.length
                    ? target
                    : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate(
                        {
                            scrollTop: target.offset().top - scrollOffset
                        },
                        500
                    );
                    return false;
                } //target.length
            } //click function
        }
    ); //smooth scrolling
}); // Make sure Document loaded
