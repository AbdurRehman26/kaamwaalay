// Adding components
Vue.component('login', require('./components/front/auth/Login.vue'));
Vue.component('forgot', require('./components/front/auth/Forgot.vue'));
Vue.component('reset-password', require('./components/front/auth/ResetPassword.vue'));
Vue.component('create-password', require('./components/front/auth/CreatePassword.vue'));



// 404 Component
Vue.component('not-found-panel', require('./components/404/404Panel.vue'));


//****************front components******************//

// Common Component Tags
Vue.component('logo', require('./components/admin/common-components/Logo.vue'));
Vue.component('no-record-found', require('./components/admin/common-components/NoRecords.vue'));
Vue.component('search', require('./components/admin/common-components/Search.vue'));
Vue.component('loader', require('./components/admin/common-components/Loader.vue'));
Vue.component('alert', require('./components/front/common-components/Alert.vue'));
Vue.component('change-password-popup', require('./components/admin/common-components/ChangePassPopup.vue'));
Vue.component('testmonial-sec',require('./components/front/common-components/TestmonialSec.vue'));
Vue.component('category-popup',require('./components/front/common-components/CateogyPopup.vue'));

//header
Vue.component('front-header',require('./components/front/common-components/header.vue'));

// Footer
Vue.component('front-footer',require('./components/front/common-components/footer.vue'));

// landing
Vue.component('featuredCategories', require('./components/front/landing/FeaturedCategories.vue'));
Vue.component('popularservices', require('./components/front/landing/PopularServices.vue'));
Vue.component('appstore', require('./components/front/landing/AppStore.vue'));
Vue.component('explorenow', require('./components/front/landing/ExploreNow.vue'));

//join as pro
Vue.component('getstarted', require('./components/front/join-as-pro/GetStarted.vue'));


