import Supplier from "@/api/Supplier";
import router from "@/router/index";

export const submitSupplierFormData = ({ state, commit, rootGetters }) => {
  commit("general/LOADER", true, { root: true });
  if (state.form.id) {
    Supplier.update(
      state.form.id,
      state.form,
      rootGetters["user/requestHeaders"]
    )
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
  } else {
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
  }
};

export const loadSuppliers = ({ commit, rootGetters }, data) => {
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

export const editSupplier = ({ commit, rootGetters }, data) => {
  commit("general/LOADER", true, { root: true });

  Supplier.edit(data, rootGetters["user/requestHeaders"])
    .then(response => {
      commit("SET_SUPPLIER_FORM_DATA", response.data);

      router.push({ name: "SupplierEdit" });

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
          "Something went wrong while fetching categories. Please try again.",
          { root: true }
        );
      }

      commit("general/LOADER", false, { root: true });
    });
};

export const setOptionValues = ({ commit }, data) => {
  commit("SET_SUPPLIER_TABLE_OPTIONS", data);
};

export const createSupplier = ({ commit }, data = null) => {
  commit("RESET_SUPPLIER_FORM", data);
  router.push({ name: "SupplierCreate" });
};
