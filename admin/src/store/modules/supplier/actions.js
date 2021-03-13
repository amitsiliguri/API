import Supplier from "@/api/Supplier";
import router from "@/router/index";


// data = category array
export const submitSupplierFormData = ({ state, commit, rootGetters }) => {
    commit("general/LOADER", true, { root: true });
    Supplier.store(state.form, rootGetters["user/requestHeaders"])
        .then(response => {
            if (response.data.success) {
                router.push({ name: "SupplierList" });
            }
            commit("general/LOADER", false, { root: true });
            commit("RESET_SUPPLIER_FORM", null);
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
};


export const loadProducts = ({ commit, rootGetters }, data) => {
    commit("SUPPLIER_TABLE_LOADING");
    Supplier.get(data.page, data.itemsPerPage, rootGetters["user/requestHeaders"])
      .then(response => {
        commit("SET_SUPPLIER", response.data);
        commit("SUPPLIER_TABLE_LOADING");
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
        commit("SUPPLIER_TABLE_LOADING");
    });
};