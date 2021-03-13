import Product from "@/api/Catalog/Product";
import router from "@/router/index";

export const loadProducts = ({ commit, rootGetters }, data) => {
  commit("PRODUCT_TABLE_LOADING");
  Product.get(data.page, data.itemsPerPage, rootGetters["user/requestHeaders"])
    .then(response => {
      commit("SET_PRODUCTS", response.data);
      commit("PRODUCT_TABLE_LOADING");
    })
    .catch(err => {
      if (err.response) {
        if (err.response.status == 422 || err.response.status == 401) {
          commit("general/SHOW_NOTIFICATIONS", err.response.data.message, {
            root: true
          });
        }
      } else {
        commit(
          "general/SHOW_NOTIFICATIONS",
          "Something went wrong while fetching categories. Please try again.",
          { root: true }
        );
      }
      commit("PRODUCT_TABLE_LOADING");
    });
};

export const setOptionValues = ({ commit }, data) => {
  commit("SET_PRODUCT_TABLE_OPTIONS", data);
};

// data = category array
export const submitProductFormData = ({ state, commit, rootGetters }, data) => {
  commit("general/LOADER", true, { root: true });
  if (data.length > 0) {
    let ids = [];
    data.forEach(item => {
      ids.push(item.id);
    });
    commit("SET_SELECTED_CATEGORIES", ids);
  }
  if (!state.form.status) {
    state.form.status = false;
  }
  if (!state.form.id) {
    Product.store(state.form, rootGetters["user/requestHeaders"])
      .then(response => {
        if (response.data.success) {
          router.push({ name: "catalogProduct" });
        }
        commit("general/LOADER", false, { root: true });
      })
      .catch(err => {
        if (err.response) {
          if (err.response.status == 422 || err.response.status == 401) {
            commit("general/SHOW_NOTIFICATIONS", err.response.data.message, {
              root: true
            });
          }
        } else {
          commit(
            "general/SHOW_NOTIFICATIONS",
            "Something went wrong while creating a new category",
            { root: true }
          );
        }
        commit("general/LOADER", false, { root: true });
      });
  }
};
