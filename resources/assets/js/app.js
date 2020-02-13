import Slideshow from './components/Slideshow.vue';

require('../../../node_modules/@fortawesome/fontawesome-free/js/all');
require('../../../node_modules/bootstrap/dist/js/bootstrap.min.js');

require('./bootstrap');

require('./main');

require('popper.js');

require('jquery');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: {
    	Slideshow
    }
});
