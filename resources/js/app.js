/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios';
import { Model } from 'vue-api-query'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import CKEditor from '@ckeditor/ckeditor5-vue';
import moment from 'moment'

Vue.prototype.moment = moment
Vue.use(CKEditor);
Vue.use(BootstrapVue)
// inject global axios instance as http client to Model
Vue.use(VueAxios, axios);
Model.$http = axios
axios.defaults.baseURL = 'http://localhost:8080/api';

Vue.use(VueRouter)

window.Vue = require('vue');

import App from './views/App.vue'
import Home from './components/Home/Index.vue'
import Post from './components/Post/Edit.vue'
import PostIndex from './components/Post/Index.vue'
import Register from './components/Register.vue';
import Login from './components/Login.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                auth: false
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: '/post',
            name: 'post.new',
            component: Post,
            meta: {
                auth: true
            }
        },
        {
            path: '/post/:id',
            name: 'post.view',
            component: PostIndex,
        },
        {
            path: '/post/:id/edit',
            name: 'post.edit',
            component: Post,
            meta: {
                auth: true
            }
        },
    ],
});

Vue.router = router
Vue.use(require('@websanova/vue-auth'), {
   auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
   http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
   router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});
App.router = Vue.router

new Vue(App).$mount('#app');
