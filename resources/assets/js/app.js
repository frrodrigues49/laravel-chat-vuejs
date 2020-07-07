
require('./bootstrap');

window.Vue = require('vue');

import store from './store/store'

Vue.component('chat', require('./components/chat/Chat'))
Vue.component('users', require('./components/chat/Users'))
Vue.component('messages', require('./components/chat/Messages'))
Vue.component('message', require('./components/chat/Message'))

const app = new Vue({
    store,
    el: '#app',       
});
