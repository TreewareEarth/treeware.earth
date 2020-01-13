require('./bootstrap');

window.Vue = require('vue');
Vue.component('package-add', require('./components/PackageAdd.vue').default);

const app = new Vue({
    el: '#app',
});


$("#add-your-package-btn").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#add-package-section").offset().top
    }, 500);
});
