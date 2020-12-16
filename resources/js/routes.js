import Welcome from './pages/Welcome.vue';
import Register from './pages/Register.vue';
import Login from './pages/Login.vue';
import NotFound from './pages/NotFound.vue';
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Axios from 'axios';

export default
{
    mode:'history',
    routes: [
        {
            path:'*',
            component: NotFound
        },
        {
            path:'/',
            component: Welcome,
            name: 'Welcome'
        },
        {
            path:'/home',
            component: Home,
            name: 'Dashboard',
            beforeEnter: (to, from, next) => {
                axios.get('/api/auth')
                .then((res) => {
                    next();
                })
                .catch((error) => {
                    return next({name: 'Login'})
                })
            }
        },
        {
            path:'/about',
            component: About
        },
        {
            path: '/register',
            component : Register
        },
        {
            path: '/login',
            component : Login,
            name: 'Login'
        }
    ]
}