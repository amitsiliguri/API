import Vue from "vue";
import VueRouter from "vue-router";
import store from '@/store/index';


import Home from "@/views/Home.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home
  },
  {
    path: "/about",
    name: "About",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited. 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/About.vue")
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited. 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Dashboard.vue")
  },
];




const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});


router.beforeEach((to, from, next) => {
  if (to.fullPath === '/') {
    if (store.state.user.token) {
      next('/about');
    }
  } else {
    if (! store.state.user.token) {
      next('/');
    }
  }
  next();
});


export default router;
