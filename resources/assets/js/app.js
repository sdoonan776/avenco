import 'jquery';

import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

require('../../../node_modules/@fortawesome/fontawesome-free/js/all');
window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('./components/updateQuantity');
require('./components/mobileMenu');
require('./components/close');