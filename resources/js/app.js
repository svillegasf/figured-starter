/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'

Vue.use(VueRouter)
Vue.use(VueResource)

window.Vue = require('vue');

import App from './views/App.vue'
import Home from './components/Home/Index.vue'
import Post from './components/Post/Edit.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/post',
            name: 'post.new',
            component: Post,
        },
        {
            path: '/post/:id',
            name: 'post.edit',
            component: Post,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App, Home, Post },
    router,
});
