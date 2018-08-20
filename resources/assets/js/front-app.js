/*Front Main vue js*/

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import vbclass from 'vue-body-class';
import router from './front-routes';
import BootstrapVue from 'bootstrap-vue';
import fancyBox from 'vue-fancybox';

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use( vbclass, router );

// Require components tags
require('./front-components-tags');

Vue.mixin({
 data: function() {
   return {
    globalReadOnlyProperty() {
        return  'testinggfsd';
     }
   }
 }
});

const app = new Vue({
    el: '#app',
    router,
    methods:{
        browserfunction() {
            if ((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1) {
                jQuery('body').addClass('opera-browser')
            } else if (navigator.userAgent.indexOf("Chrome") != -1) {
                jQuery('body').addClass('chrome-browser')
            } else if (navigator.userAgent.indexOf("Safari") != -1) {
                jQuery('body').addClass('safari-browser')
            } else if (navigator.userAgent.indexOf("Firefox") != -1) {
                jQuery('body').addClass('firefox-browser')
            } else if ((navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) //IF IE > 10
            {
                jQuery('body').addClass('IE-browser')
            } else {
                jQuery('body').addClass('New-browser')
            }
        }
    },
    mounted(){
        this.browserfunction();
    },
});




/*const app = new Vue({
    router
}).$mount('#app')*/

