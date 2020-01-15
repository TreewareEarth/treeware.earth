require('./bootstrap');

window.Vue = require('vue');
import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);


Vue.component('package-add', require('./components/PackageAdd.vue').default);
Vue.component('package-search', require('./components/PackaseSearch.vue').default);

const app = new Vue({
    el: '#app',
});


$("#add-your-package-btn, #add-package-link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#add-package-section").offset().top
    }, 500);

    if($('.ff-nav').hasClass('active')) {
        $('.ff-nav').removeClass('active');
        $('.hamburger').toggleClass('is-active');
    }
});

$("#how-it-work-link").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#how-it-work-section").offset().top
    }, 500);

    if($('.ff-nav').hasClass('active')) {
        $('.ff-nav').removeClass('active');
        $('.hamburger').toggleClass('is-active');
    }
});


var elem = $(window.location.hash);
if(elem.length) {
    $([document.documentElement, document.body]).animate({
        scrollTop: elem.offset().top
    }, 500);

    window.location.hash = '';
}


$('.hamburger').on('click', function() {
   $(this).toggleClass('is-active');
   $(this).parent('.ff-nav').toggleClass('active');
});
