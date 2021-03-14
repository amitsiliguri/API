import SupplierAddress from "@/api/Supplier/Address";

export const toggleModal = ({ commit }, data) => {
  commit("TOGGLE_SUPPLIER_ADDRESS_FORM_MODAL", data);
};

export const setOptionValues = ({ commit }, data) => {
  commit("SET_SUPPLIER_ADDRESS_TABLE_OPTIONS", data);
};

export const setSupplierId = ({ commit }, data) => {
  commit("SET_SUPPLIER_ID_TO_FORM", data);
};

export const editSupplierAddress = ({ commit }, data) => {
  commit("SET_SUPPLIER_ADDRESS_FORM_DATA", data);
  commit("TOGGLE_SUPPLIER_ADDRESS_FORM_MODAL", true);
};

export const loadSuppliersAddress = ({ state, commit, rootGetters }, data) => {
  commit("SUPPLIER_ADDRESS_TABLE_LOADING");
  let parametr = "?page=" + data.page + "&itemsPerPage=" + data.itemsPerPage;
  SupplierAddress.get(state.form.id, parametr, rootGetters["user/requestHeaders"])
    .then(response => {
      commit("SET_SUPPLIER_ADDRESS", response.data);
      commit("SUPPLIER_ADDRESS_TABLE_LOADING");
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
      commit("SUPPLIER_ADDRESS_TABLE_LOADING");
    });
};

export const submitSupplierFormData = ({ state, commit, rootGetters }) => {
  commit("general/LOADER", true, { root: true });
  if (state.form.id) {
    SupplierAddress.update(
      state.form.id,
      state.form,
      rootGetters["user/requestHeaders"]
    )
      .then(response => {
        commit("UPDATE_SUPPLIER_ADDRESS_LIST", response.data);
        commit("TOGGLE_SUPPLIER_ADDRESS_FORM_MODAL", false);
        commit("general/LOADER", false, { root: true });
        commit("RESET_SUPPLIER_ADDRESS_FORM", null);
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
    SupplierAddress.store(state.form, rootGetters["user/requestHeaders"])
      .then(response => {
        commit("UPDATE_SUPPLIER_ADDRESS_LIST", response.data);
        commit("TOGGLE_SUPPLIER_ADDRESS_FORM_MODAL", false);
        commit("general/LOADER", false, { root: true });
        commit("RESET_SUPPLIER_ADDRESS_FORM", null);
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
