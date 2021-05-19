require('./bootstrap');
require('./fontawesome');

import  Vue from  'vue';

import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
import Authorization from './authorization/authorize';

Vue.use(VueIziToast);
Vue.use(Authorization);



Vue.component('user-info', require('./components/UserInfo.vue').default);
Vue.component('answer', require('./components/Answer.vue').default);
Vue.component('favorite',require('./components/Favorite.vue').default);
Vue.component('accept',require('./components/Accept.vue').default);
Vue.component('vote',require('./components/Vote.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
