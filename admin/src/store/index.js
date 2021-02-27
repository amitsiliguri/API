import Vue from "vue";
import Vuex from "vuex";
import user from "@/store/modules/user";
import general from "@/store/modules/general";
import catalogcategory from "@/store/modules/catalog/category";
import catalogproduct from "@/store/modules/catalog/product";
Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    user,
    general,
    catalogcategory,
    catalogproduct
  }
});
