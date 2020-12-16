/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import routes from './routes';

Vue.use(VueRouter);

Vue.component('guest-navbar', require('./layouts/navbars/GuestNavbar.vue').default);
Vue.component('auth-navbar', require('./layouts/navbars/AuthNavbar.vue').default);


let auth_user = null;
let auth_check = false;

axios.get('/api/auth')
        .then((res) => {
            console.log(res.data)
            if(res.data == 1)
            {
                axios.get('/api/user')
                .then((response) => {
                    auth_check = true;
                    auth_user = response.data;
                    const app = new Vue({
                        el: '#app',
                        data:{auth_user, auth_check},
                        router: new VueRouter(routes)
                    });
                    
                })
                .catch((error) => {
                    console.log(error);
                });
            }
            else 
            {
                const app = new Vue({
                    el: '#app',
                    data:{auth_user, auth_check},
                    router: new VueRouter(routes)
                });
            }
            
            
        })
        .catch((error) => {
            const app = new Vue({
                el: '#app',
                data:{auth_user, auth_check},
                router: new VueRouter(routes)
            });
        })

        

