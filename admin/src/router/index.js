import Vue from "vue";
import VueRouter from "vue-router";

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
      import(/* webpackChunkName: "Dashboard" */ "../views/Dashboard.vue")
  },
  {
    path: "/catalog/category",
    name: "catalogCategory",
    component: () =>
      import(/* webpackChunkName: "catalogCategory" */ "../views/Catalog/Category.vue")
  },
  {
    path: "/catalog/product",
    name: "catalogProduct",
    component: () =>
      import(
        /* webpackChunkName: "catalogProduct" */ "../views/Catalog/Product/Index.vue"
      )
  },
  {
    path: "/catalog/product/create",
    name: "catalogProductCreate",
    component: () =>
      import(
        /* webpackChunkName: "catalogProductCreate" */ "../views/Catalog/Product/Create.vue"
      )
  },
  {
    path: "/catalog/warehouse",
    name: "CatalogWarehouse",
    component: () =>
      import(/* webpackChunkName: "CatalogWarehouse" */ "../views/Catalog/Warehouse.vue")
  },
  {
    path: "/supplier/list",
    name: "SupplierList",
    component: () =>
      import(/* webpackChunkName: "SupplierList" */ "../views/Supplier/List.vue")
  },
  {
    path: "/supplier/create",
    name: "SupplierCreate",
    component: () =>
      import(/* webpackChunkName: "SupplierCreate" */ "../views/Supplier/Create.vue")
  },
  {
    path: "/supplier/edit",
    name: "SupplierEdit",
    component: () =>
      import(/* webpackChunkName: "SupplierEdit" */ "../views/Supplier/Edit.vue")
  },
  {
    path: "/supplier/purchase/list",
    name: "PurchaseList",
    component: () =>
      import(
        /* webpackChunkName: "PurchaseList" */ "../views/Supplier/Purchase/List.vue"
      )
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
