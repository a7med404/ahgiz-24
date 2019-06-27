
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
Vue.config.productionTip = false;
const compiler = require('vue-template-compiler');

let axios = require('axios');
Vue.use(require('vue-moment'));
axios.default.URL = "http://127.0.0.1:8000/";

import Vuex from "vuex";
// import VueReouter from "vue-router";
// import routes from "./store/modules/master/_route/navigation";

import store from "./store/index";
Vue.use(Vuex);
// Vue.use(VueReouter);

// const router = new VueReouter({
//     base: '/',
//     mode: "history",
//     linkActiveClass: 'active',
//     routes: routes,
// });
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


// import navigation from './store/modules/master/_components/Navigation';
import App from './store/App';
import AddUserForm from './store/modules/user/_components/AddUserForm';
import UserTable from './store/modules/user/_components/UserTable';

import search from './store/modules/website/_components/Search';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // router,
    store,
    components: {
      AddUserForm,
      UserTable,
      search
    },
});
