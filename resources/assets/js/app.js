require('../../../node_modules/@fortawesome/fontawesome-free/js/all.js');

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
