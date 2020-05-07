import 'jquery';

import 'responsive-nav';

window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('./components/mobileMenu');
require('./components/updateQuantity');
require('./components/admin');
require('./components/images');