import Vue from 'vue'
import routes from "./routes";
import Router from 'vue-router'

Vue.use(Router);

Vue.prototype.$hostname = window.APP_URL

export default new Router({
  mode: 'history',
  fallback: false,
  scrollBehavior: () => ({ y: 0 }),
  routes
});