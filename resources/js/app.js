require('./bootstrap');
require('./fontawesome');

import  Vue from  'vue'
Vue.component('user-info', require('./components/UserInfo.vue').default);
Vue.component('answer', require('./components/Answer.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
