import { tns } from 'tiny-slider';

require('../../../node_modules/@fortawesome/fontawesome-free/js/all');
window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('./components/updateQuantity');
require('./components/mobileMenu');
require('./components/carousel');
require('./components/close');