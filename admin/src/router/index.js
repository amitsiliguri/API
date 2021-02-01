import Vue from "vue";
import VueRouter from "vue-router";
import store from '@/store/index';


import Home from "@/views/Home.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home //login page
  },
  {
    path: "/about",
    name: "About",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/About.vue")
  },
  {
    path: "/dashboard",
    name: "Dashboard", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Dashboard.vue")
  },
  {
    path: "/catalog/category",
    name: "CatalogCategory", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Catalog/Category.vue")
  },
  {
    path: "/catalog/product",
    name: "CatalogProduct", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Catalog/Product.vue")
  },
  {
    path: "/catalog/warehouse",
    name: "CatalogWarehouse", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Catalog/Warehouse.vue")
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
