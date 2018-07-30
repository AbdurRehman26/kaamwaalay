
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
import BootstrapVue from 'bootstrap-vue'



Vue.use(VueRouter)
Vue.use(BootstrapVue);

// Route components
const navigation = { template: '<div>navigation</div>' }


// Define some routes
const routes = [
    { path: '/navigation', component: navigation }
]
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

// Create and mount the root instance.
const app = new Vue({
    router
}).$mount('#app')

