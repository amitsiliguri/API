import Vue from "vue";
import VueRouter from "vue-router";
// import store from '@/store/index';


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
      import(/* webpackChunkName: "about" */ "../views/Catalog/Product/Index.vue")
  },
  {
    path: "/catalog/product/create",
    name: "CatalogProductCreate", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Catalog/Product/Create.vue")
  },
  {
    path: "/catalog/warehouse",
    name: "CatalogWarehouse", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Catalog/Warehouse.vue")
  },
  {
    path: "/vendor/list",
    name: "VendorList", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Vendor/List.vue")
  },
  {
    path: "/vendor/create",
    name: "VendorCreate", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Vendor/Create.vue")
  },
  {
    path: "/purchase/list",
    name: "purchaseList", 
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Vendor/Purchase/List.vue")
  },
];




const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
