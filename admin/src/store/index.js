import Vue from "vue";
import Vuex from "vuex";
import user from "@/store/modules/user";
import general from "@/store/modules/general";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    user,
    general
  }
});
