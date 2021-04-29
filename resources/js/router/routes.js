import Login from "../components/Login";
import Currency from "../components/Currency";
import NotFound from "../components/NotFound";
import Register from "../components/Register";
import History from "../components/History";
import Cabinet from "../components/Cabinet";
import Documentation from "../components/Documentation";

import middleware from './middleware';

export default [
    {
        path: '/login',
        name: 'Login',
        component: Login,
        beforeEnter: middleware.guest,
    },
    {
        path: '/currencies',
        alias: '/',
        name: 'Currencies',
        component: Currency,
    },
    {
        path: '/history',
        name: 'History',
        component: History,
    },
    {
        path: '/cabinet',
        name: 'Cabinet',
        component: Cabinet,
        beforeEnter: middleware.user
    },
    {
        path: '*',
        component: NotFound
    },
    {
        path: '/register',
        component: Register,
        name: 'Register',
    },
    {
        path: '/documentation',
        component: Documentation,
        name: 'Documentation',
    },
];