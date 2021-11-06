    // Route components
    import VueRouter from 'vue-router'

    const routes = [

    // Login page

    {
        name: 'login',
        path: '/login',
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
            noHeader: true,
            navigation: 'main-nav',
        },
        component: require('./components/front/auth/main.vue').default,
    },
    {
        name: 'password.reset',
        path: '/password/reset/:token/:email',
        meta: {
            title: 'PSM | reset-password',
            bodyClass: 'reset-password-page',
            noHeader: true,
            navigation: 'main-nav',
        },
        component: require('./components/front/auth/ResetPassword.vue').default,
    },
    {
        path: '/user/activate',
        component: require('./components/front/auth/main.vue').default,
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
            noHeader: true,
            navigation: 'main-nav',
        },
    },
    // Home

    {
        name: 'main-page',
        path: '/',
        meta: {
            title: 'PSM | Home',
            bodyClass: 'home_body',
            navigation: 'main-nav',
        },
        component: require('./components/front/explore/main.vue').default,
    },

    // Explore

    {
        name: 'Explore',
        path: '/explore',
        meta: {
            title: 'PSM | Explore',
            bodyClass: 'explore_page',
            navigation: 'main-nav',
            forAll: true,
        },
        component: require('./components/front/explore/main.vue').default,
    },
    {
        name: 'Explore_Detail',
        path: '/services/:serviceName/:childServiceName?/:cityArea?',
        props: true,
        meta: {
            title: 'PSM | Category Detail',
            bodyClass: 'explore_detail_page',
            navigation: 'main-nav',
            forAll: true,
        },
        component: require('./components/front/explore/service-provider.vue').default,
    },

    {
        name: 'service-provider-detail.view',
        path: '/explore/service-provider/service-provider_detail/:id',
        props: true,
        meta: {
            title: 'PSM | Service Provider Detail',
            bodyClass: 'service_provider_detail_page',
            navigation: 'main-nav',
            forAll: true,
        },
        component: require('./components/front/explore/service-provider-detail.vue').default,
    },

    // Sign Up

    {
        name: 'sign-up',
        path: '/sign-up/:isPro?',
        props: true,
        meta: {
            title: 'PSM | Sign Up',
            bodyClass: 'signup-page',
            navigation: 'main-nav',
        },
        component: require('./components/front/sign-up/main.vue').default,
    },
    // Profile

    {
        name: 'customer_profile',
        path: '/profile',
        meta: {
            title: 'PSM | Profile',
            bodyClass: 'profile-page',
            navigation: 'customer-nav',
            requiresAuth: true,
            forCustomer: true,
        },
        component: require('./components/front/profile/main.vue').default,
    },
    {
        name: 'provider_profile',
        path: '/apply-for-review',
        meta: {
            title: 'PSM | Apply for Review',
            bodyClass: 'apply-for-review-page',
            navigation: 'provider-nav',
            requiresAuth : true,
            forServiceProvider : true,
        },
        component: require('./components/front/profile/ApplyForReview.vue').default,
    },


    // Job Post

    {
        name: 'job.create',
        path: '/job-post',
        meta: {
            title: 'PSM | Job Post',
            bodyClass: 'job-post-page',
            navigation: 'customer-nav',
            requiresAuth: true,
            forCustomer: true,
        },
        component: require('./components/front/job-post/main.vue').default,
    },

    // Job Post

    {
        name: 'job.view',
        path: '/job-post/:id',
        meta: {
            title: 'PSM| Job Post',
            bodyClass: 'job-post-page',
            navigation: 'customer-nav',
            requiresAuth: true,
        },
        component: require('./components/front/job-post/main.vue').default,
    },

    //jobs pages

    {
        name: 'my.jobs',
        path: '/my-jobs',
        meta: {
            title: 'PSM | My Jobs',
            bodyClass: 'my-job-post-page',
            navigation: 'customer-nav',
            requiresAuth: true,
            forCustomer: true,
        },
        component: require('./components/front/jobs/my-jobs.vue').default,
    },


    {
        name: 'explore-jobs',
        path: '/explore-jobs',
        meta: {
            title: 'PSM | My Jobs',
            bodyClass: 'my-explore-job-page',
            navigation: 'provider-nav',
            requiresAuth: true,
            forServiceProvider: true,
        },
        component: require('./components/front/jobs/explore-jobs.vue').default,
    },


    {
        name: 'job.details',
        path: '/job-details/:id/:jobBidId?',
        meta: {
            title: 'PSM | Job Details',
            bodyClass: 'job-detail-page',
            navigation: 'customer-nav',
            requiresAuth: true,
        },
        component: require('./components/front/jobs/job-detail.vue').default,
    },

    // Advice Center

    {
        name: 'Advice_Center',
        path: '/advice-center/:type?',
        props: true,
        meta: {
            title: 'PSM | Advice Center',
            bodyClass: 'advice-center-page',
            navigation: 'provider-nav',
            requiresAuth: true,
        },
        component: require('./components/front/advice-center/main.vue').default,
    },


    //bidding page
    {
        name: 'my.bids',
        path: '/my-bids',
        meta: {
            title: 'PSM | My Bids',
            bodyClass: 'my-bids-page',
            navigation: 'provider-nav',
            requiresAuth: true,
            forServiceProvider: true,
        },
        component: require('./components/front/bids/main.vue').default,
    },

    // Static Pages
    {
        name: 'terms-condition',
        path: '/terms-condition',
        meta: {
            title: 'PSM | Terms Condition',
            bodyClass: 'terms-condition-page',
            navigation: 'main-nav',
        },
        component: require('./components/front/static-pages/TermsCondition.vue').default,
    },

    {
        name: 'privacy-policy',
        path: '/privacy-policy',
        meta: {
            title: 'PSM | Privacy Policy',
            bodyClass: 'privacy-policy-page',
            navigation: 'main-nav',
        },
        component: require('./components/front/static-pages/PrivacyPolicy.vue').default,
    },

    /*404*/

    {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue').default,
        meta: {
            title: 'PSM | 404',
            noHeader: true,
            bodyClass: 'not-found-page',
        },
    },
    ]


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`
    app,
})
const serviceProvider = 2;
const customer = 3;
const title = document.title
router.beforeEach((to, from, next) => {
 let user;
 if(to.name != 'login'){
     router.app.$store.commit('setRedirectUrl',to.name);
 }
 if(!router.app.$auth.isAuthenticated()){
        router.app.$store.commit('setAuthUser', '')
        next();
 }
 if(router.app.$store.getters.getAuthUser != 'undefined'){
    user = JSON.parse(router.app.$store.getters.getAuthUser);
 }

if (to.matched.some(record => record.meta.forAll) && !router.app.$auth.isAuthenticated()) {
    next();
}
if (to.matched.some(record => record.meta.requiresAuth) && !router.app.$auth.isAuthenticated()) {
    localStorage.removeItem('user');
    router.app.$store.commit('setAuthUser' , '');
    next({name: 'login'});
}else if (!to.matched.some(record => record.meta.requiresAuth) && router.app.$auth.isAuthenticated()) {
    if(user  && user.role_id == customer){
        if(!to.matched.some(record => record.meta.forAll) && to.name != '404') {
            if(user.is_profile_completed == 0 ){
                next({name: "customer_profile"});
            }else{
                next({name: "my.jobs"});
            }
        }else {
            next();
        }
    }
    if(user  && user.role_id == serviceProvider && to.name != '404'){
        if(user.is_profile_completed == 0 ){
            next({name: "provider_profile"});
        }else{
            next({name: "my.bids"});
        }
    }else {
            next();
    }
} else {
    next();
}

if (to.matched.some(record => record.meta.forCustomer) && router.app.$auth.isAuthenticated()) {
    if(user && user.role_id == customer){
        next();
    }
    else{
        next({name: 'login'});
    }
}
if (to.matched.some(record => record.meta.forServiceProvider) && router.app.$auth.isAuthenticated()) {
    if(user  && (user.role_id == serviceProvider)){
        next();
    }
    else{
        next({name: 'login'});
    }
}
})

router.beforeEach((to, from, next) => {
    document.title = (to.meta.title)
    next()
})


export default router
