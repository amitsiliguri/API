import Vue from "vue";
import Vuex from "vuex";

import user from "@/store/modules/user";
import general from "@/store/modules/general";
import catalogCategory from "@/store/modules/catalog/category";
import catalogProduct from "@/store/modules/catalog/product";
import supplier from "@/store/modules/supplier";
import supplierAddress from "@/store/modules/supplier/address";
import supplierContactPeople from "@/store/modules/supplier/contactPeople";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    user,
    general,
    catalogCategory,
    catalogProduct,
    supplier,
    supplierAddress,
    supplierContactPeople
  }
});
