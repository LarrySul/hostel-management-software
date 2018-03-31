// require('./bootstrap');

// Vue.http.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken; 
// app.js
import Vue from 'vue'

import App from './App.vue'

import VueRouter from 'vue-router'

import Router from './router.js'

import VeeValidate from 'vee-validate'

Vue.use(VeeValidate)

Vue.use(VueRouter)


new Vue({
  el: '#app',
  render: h => h(App), 
  router:Router
})
 