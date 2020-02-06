import Slideshow from './components/Slideshow.vue';

require('../../../node_modules/@fortawesome/fontawesome-free/js/all');
require('../../../node_modules/bootstrap/dist/js/bootstrap.min.js');

require('./bootstrap');

require('./main');

window.require('popper');

window.require('jquery');

window.Vue = require('vue');

const app = new Vue({
	components: {
		Slideshow
	},
    el: '#app',
});
