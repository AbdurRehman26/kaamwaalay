    // Route components
import VueRouter from 'vue-router'

const routes = [

    /* Dashboard */

    {
        name: 'dashboard',
        path: '/admin/dashboard',
        meta: {
            title: 'Dashboard',
            bodyClass: 'dashboard-page',
            pagetitle:'Dashboard',
            icon:'icon-speedometer',
            requiresAuth: true,
            forAdmin :true,
        },
        component: require('./components/admin/dashboard/main.vue'),
    },


    /* Login page */

    {
        name: 'login',
        path: '/admin',
        meta: {
            title: 'Login',
            bodyClass: 'login-page',
            noHeader: true
        },
        component: require('./components/auth/main.vue'),
    },



    /* Login page */

    {
        name: 'createpassword',
        path: '/admin/create-password',
        meta: {
            title: 'Create Password',
            bodyClass: 'login-page',
            noHeader: true,
            forAdmin :true,

        },
        component: require('./components/auth/CreatePassword.vue'),
    },
    {
            path: '/password/set/:token/:email',
            component: require('./components/auth/CreatePassword.vue'),
             meta: {
                title: 'Create Password',
                bodyClass: 'login-page',
                noHeader: true,
                forAdmin :true,
            },
    },

    /* Service Type */

    {
        name: 'servicetype',
        path: '/admin/service-type',
        component: require('./components/admin/service-type/main.vue'),
        meta: {
            title: 'Service Type',
            pagetitle:'Services / Sub Services',
            icon:'icon-tools-2',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    /* Customer Panel */

    {
        name: 'customer',
        path: '/admin/customer',
        component: require('./components/admin/customer/main.vue'),
        meta: {
            title: 'Customer Panel' ,
            pagetitle:'Customers',
            icon:'icon-users',
            requiresAuth: true,
            forAdmin :true,
        }

    },
    {
        name: 'customerdetail',
        path: '/admin/customer/customer_detail/:id',
        component: require('./components/admin/customer/CustomerDetails.vue'),
        meta: {
            title: 'Customer Detail' ,
            pagetitle:'Customers Detail',
            icon:'icon-users',
            requiresAuth: true,
            forAdmin :true,
        }

    },
    {
        name: 'customerjobdetail',
        path: '/admin/customer/viewjobdetail/:id',
        component: require('./components/admin/customer/ViewJobDetail.vue'),
        meta: {
            title: 'View Job Detail',
            pagetitle:'Customer Job detail Section',
            icon:'icon-users',
            requiresAuth: true,
            forAdmin :true,
        },
    },

    /* Service Provider */

    {
        name: 'serviceprovider',
        path: '/admin/service-provider',
        component: require('./components/admin/service-provide/main.vue'),
        meta: {
            title: 'Service Provider',
            pagetitle:'Service Providers',
            icon:'icon-handshake-o',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    {
        name: 'viewservicejobdetail',
        path: '/admin/service-provider/viewjobdetail/:id',
        component: require('./components/admin/service-provide/ViewJobDetail.vue'),
        meta: {
            title: 'View Jobs',
            pagetitle:'Service Jobs Detail',
            icon:'icon-handshake-o',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    /* Job */

    {
        name: 'jobdetail',
        path: '/admin/jobs',
        component: require('./components/admin/job/Main.vue'),
        meta: {
            title: 'Create Job',
            pagetitle:'Jobs',
            icon:'icon-briefcase',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    // Job detail Section

    {
        name: 'mainjobdetail',
        path: '/admin/jobs/viewjobdetail/:id',
        component: require('./components/admin/job/JobDetails.vue'),
        meta: {
            title: 'Job Details',
            pagetitle:'Job Details',
            icon:'icon-briefcase',
            requiresAuth: true,
            forAdmin :true,
        },

    },

    {
        name: 'BiddingDetails',
        path: '/admin/jobs/biddingdetails/:jobId',
        component: require('./components/admin/job/BiddingDetails.vue'),
        meta: {
            title: 'Bidding Details',
            pagetitle:'Bidding Details',
            icon:'icon-briefcase',
            requiresAuth: true,
            forAdmin :true,
        },
    },



    // Service provider review


    {
        name: 'Service_Provider_Review',
        path: '/admin/service-provider-review',
        component: require('./components/admin/service-provider-review/main.vue'),
        meta: {
            title: 'Service provider review',
            pagetitle:'Service Providers Review',
            icon:'icon-star_border',
            requiresAuth: true,
            forReviewer :true,
        }
    },

    {
        name: 'Service_Detail_Review',
        path: '/admin/service-provider-review/detail-review/:id',
        component: require('./components/admin/service-provider-review/DetailReview.vue'),
        meta: {
            title: 'Service provider review',
            pagetitle:'Service Provider Detail Review',
            icon:'icon-search',
            requiresAuth: true,
            forReviewer :true,
        }
    },

    // Service provider detail

    {
        name: 'Service_Provider_Detail',
        path: '/admin/service-provider/service-provider-detail/:id',
        component: require('./components/admin/service-provide/providerdetails.vue'),
        meta: {
            title: 'Service provider details',
            pagetitle:'Service Provider Details',
            icon:'icon-briefcase',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    // General Setting

    {
        name: 'General_Setting',
        path: '/admin/general-setting',
        component: require('./components/admin/general-setting/main.vue'),
        meta: {
            title: 'General Setting',
            pagetitle:'General Settings',
            icon:'icon-settings',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    // Payment

    {
        name: 'Payment',
        path: '/admin/payment',
        component: require('./components/admin/payment/main.vue'),
        meta: {
            title: 'Payment',
            pagetitle:'Payment Activities',
            icon:'icon-credit-card',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    // Support

    {
        name: 'Support',
        path: '/admin/support',
        component: require('./components/admin/support/main.vue'),
        meta: {
            title: 'Support',
            pagetitle:'Support',
            icon:'icon-help_outline',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    /*404 Page*/

    {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue'),
        meta: {
            title: '404 Not Found',
            noHeader: true,
            bodyClass: 'not-found-page',
            requiresAuth: true,
            forAdmin :true,
        },
    },

    /* Admin Panel */

    {
        name: 'User Listed',
        path: '/admin/admin-listing',
        meta: {
            title: 'Admin Listed',
            bodyClass: 'Admin-listed',
            pagetitle:'Admins',
            icon:'icon-lock_outline',
            requiresAuth: true,
            forAdmin :true,

        },
        component: require('./components/admin/Main.vue'),
    },
]


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`
    app,
})
const admin = 1;
const reviewer = 4;
const title = document.title
router.beforeEach((to, from, next) => {
    let user;
    if(router.app.$store.getters.getAuthUser != 'undefined'){
      user = JSON.parse(router.app.$store.getters.getAuthUser);
    }
    document.title = (title + ' | ' + to.meta.title)
    if (to.matched.some(record => record.meta.requiresAuth) && !router.app.$auth.isAuthenticated()) {
        next({name: 'login'});
    } else if (!to.matched.some(record => record.meta.requiresAuth) && router.app.$auth.isAuthenticated()) {
        if(user  && user.role_id == admin){
          next({name: 'dashboard'});
        } else if(user  && user.role_id == reviewer){
          next({name: 'Service_Provider_Review'});
        }
    } else {
        next();
    }
    if (to.matched.some(record => record.meta.forAdmin) && router.app.$auth.isAuthenticated()) {
        if(user  && user.role_id == admin){
            next();
        } 
        else{
            next({name: 'login'});
        }
    }
    if (to.matched.some(record => record.meta.forReviewer) && router.app.$auth.isAuthenticated()) {
        if(user  && (user.role_id == reviewer ||user.role_id == admin)){
            next();
        } 
        else{
            next({name: 'login'});
        }
    }
})

export default router
