require('../../../node_modules/@fortawesome/fontawesome-free/js/all');
require('../../../node_modules/bootstrap/dist/js/bootstrap.min.js');

require('./bootstrap');
require('./main');
require('./owl.carousel.min.js');
require('./mixitup.min.js');
require('popper.js');
require('jquery');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
});
