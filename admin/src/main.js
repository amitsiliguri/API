import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";
import "roboto-fontface/css/roboto/roboto-fontface.css";
import "@mdi/font/css/materialdesignicons.css";

Vue.config.productionTip = false;

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

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
