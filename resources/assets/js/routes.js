    // Route components
import VueRouter from 'vue-router'

const routes = [

    /* Dashboard */

    {
        name: 'dashboard',
        path: '/dashboard',
        meta: {
            title: 'PSM | Dashboard',
            bodyClass: 'dashboard-page',
            pagetitle:'Dashboard',
            icon:'icon-pie-chart'
        },
        component: require('./components/dashboard/main.vue'),
    },


    /* Login page */

    {
        name: 'login',
        path: '/',
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
            noHeader: true,

        },
        component: require('./components/auth/main.vue'),
    },

    /* Admin Users */

    {
        name: 'user',
        path: '/admin',
        title:'Admin',
        component: require('./components/admin/Main.vue'),
        meta: {
            title: 'PSM | User',
            pagetitle:'Admin',
            icon:'icon-user-icon-resue'
        }
    },

    /* Login page */

    {
        name: 'login',
        path: '/create-password',
        meta: {
            title: 'PSM | Create Password',
            bodyClass: 'login-page',
            noHeader: true,

        },
        component: require('./components/auth/CreatePassword.vue'),
    },


    /* Service Type */

    {
        path: '/service-type',
        component: require('./components/service-type-user/main.vue'),
        meta: {
            title: 'PSM | Service Type',
            pagetitle:'Service Types',
            icon:'icon-workspace'
        }
    },

    /* Customer Panel */

    {
        path: '/customer',
        component: require('./components/customer/Main.vue'),
        meta: {
            title: 'PSM | Customer Panel' ,
            pagetitle:'Customers',
            icon:'icon-users'
        }

    },


    /* Service Provider */

    {
        path: '/service-provider',
        component: require('./components/service-provide/Main.vue'),
        meta: {
            title: 'PSM | Service Provider',
            pagetitle:'Service Providers',
            icon:'icon-handshake-o'
        }
    },

    /* Job */

    {
        path: '/jobs',
        component: require('./components/job/Main.vue'),
        meta: {
            title: 'PSM | Create Job',
            pagetitle:'Jobs',
            icon:'icon-briefcase'
        }
    },

    {
        path: '/jobs/viewjobdetail',
        component: require('./components/job/JobDetails.vue'),
        meta: {
            title: 'Job Details',
            pagetitle:'Customer Job detail Section',
        },
    },


    //service provider review
    {
        path: '/service-provider-review',
        component: require('./components/service-provider-review/main.vue'),
        meta: {
            title: 'PSM | Service provider review',
            pagetitle:'Service Provider Review',
            icon:'icon-search'
        }
    },

    //service provider detail
    {
        path: '/service-provider/service-provider-detail',
        component: require('./components/service-provide/providerdetails.vue'),
        meta: {
            title: 'PSM | Service provider details',
            pagetitle:'Service Provider Details',
            icon:'icon-briefcase'
        }
    },

    /*404 Page*/

    {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue'),
        meta: {
            title: '404 Not Found'
        },
    },

]


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
