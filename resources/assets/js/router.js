import Vue from 'vue'

import VueRouter from 'vue-router'

import axios from 'axios'

import VueAxios from 'vue-axios'

import Home from './components/home.vue'

import Hostel from './components/hostel.vue'

import Contact from './components/contact.vue'

import Register from './components/register.vue'

import Login from './components/Login.vue'


// import VueAuth from '@websanova/vue-auth'

Vue.use(VueRouter)

Vue.use(VueAxios, axios)

const router = new VueRouter({
	routes: [
		{
			path: "/home",
			component : Home,
			meta: {
            auth: false
        	}
		},
		{	
			path: '/contact',
			component : Contact,
			meta: {
            auth: false
        	}
		},
		{	
			path: '/hostel',
			component : Hostel,
			meta: {
            auth: true
        	}
		},
		{	
			path: '/register',
			component : Register,
			meta: {
            auth: false
        	}
		},
		{	
			path: '/login',
			component : Login,
			meta: {
            auth: false
        	}
		}
	],

	mode: 'history'
});

// Vue.router = router;

// Vue.use(require('@websanova/vue-auth'), {

//    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),

//    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),

//    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
// });


export default router