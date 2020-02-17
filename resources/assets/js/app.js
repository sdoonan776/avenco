require('../../../node_modules/@fortawesome/fontawesome-free/js/all');
require('../../../node_modules/bootstrap/dist/js/bootstrap.min.js');

require('jquery');
require('./bootstrap');
require('./main');
require('popper.js');
require('./owl.carousel.min.js'); 
require('./mixitup.min.js');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
});
