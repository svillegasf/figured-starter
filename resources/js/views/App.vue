<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Figured Blog
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="'Toggle navigation'">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <b-navbar-nav class="ml-auto">
                        <b-nav-item>
                            <router-link :to="{ name: 'home' }">Home</router-link>
                        </b-nav-item>
                        <b-nav-item v-if="!$auth.check()">
                            <router-link :to="{ name: 'login' }">Login</router-link>
                        </b-nav-item>
                        <b-nav-item v-if="!$auth.check()">
                            <router-link :to="{ name: 'register' }">Register</router-link>
                        </b-nav-item>
                        <b-nav-item v-if="$auth.check()" class="pull-right">
                            <a href="#" @click.prevent="$auth.logout()">Logout</a>
                        </b-nav-item>
                        <b-nav-form v-if="$auth.check()">
                            <b-button size="sm" class="my-2 my-sm-0" :to="{ name: 'post.new' }">Create New Post</b-button>
                        </b-nav-form>
                    </b-navbar-nav>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <b-container>
                <router-view></router-view>
            </b-container>
        </main>
    </div>
</template>
