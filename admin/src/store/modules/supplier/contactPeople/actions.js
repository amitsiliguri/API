import SupplierContactPerson from "@/api/Supplier/ContactPerson";

export const toggleModal = ({ commit }, data) => {
  commit("TOGGLE_SUPPLIER_CONTACT_PEOPLE_FORM_MODAL", data);
};

export const setOptionValues = ({ commit }, data) => {
  commit("SET_SUPPLIER_CONTACT_PEOPLE_TABLE_OPTIONS", data);
};

export const setSupplierId = ({ commit }, data) => {
  commit("SET_SUPPLIER_ID_TO_FORM", data);
};

export const editsupplierContactPeople = ({ commit }, data) => {
  commit("SET_SUPPLIER_CONTACT_PEOPLE_FORM_DATA", data);
  commit("TOGGLE_SUPPLIER_CONTACT_PEOPLE_FORM_MODAL", true);
};

export const loadSuppliersAddress = ({ commit, rootGetters }, data) => {
  commit("SUPPLIER_CONTACT_PEOPLE_TABLE_LOADING");
  let parametr = "?page=" + data.page + "&itemsPerPage=" + data.itemsPerPage;
  SupplierContactPerson.get(data.id, parametr, rootGetters["user/requestHeaders"])
    .then(response => {
      commit("SET_SUPPLIER_CONTACT_PEOPLE", response.data);
      commit("SUPPLIER_CONTACT_PEOPLE_TABLE_LOADING");
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
      commit("SUPPLIER_CONTACT_PEOPLE_TABLE_LOADING");
    });
};

export const submitSupplierFormData = ({ state, commit, rootGetters }) => {
  commit("general/LOADER", true, { root: true });
  if (state.form.id) {
    SupplierContactPerson.update(
      state.form.id,
      state.form,
      rootGetters["user/requestHeaders"]
    )
      .then(response => {
        commit("UPDATE_SUPPLIER_CONTACT_PEOPLE_LIST", response.data);
        commit("TOGGLE_SUPPLIER_CONTACT_PEOPLE_FORM_MODAL", false);
        commit("general/LOADER", false, { root: true });
        commit("RESET_SUPPLIER_CONTACT_PEOPLE_FORM", null);
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
    SupplierContactPerson.store(state.form, rootGetters["user/requestHeaders"])
      .then(response => {
        commit("UPDATE_SUPPLIER_CONTACT_PEOPLE_LIST", response.data);
        commit("TOGGLE_SUPPLIER_CONTACT_PEOPLE_FORM_MODAL", false);
        commit("general/LOADER", false, { root: true });
        commit("RESET_SUPPLIER_CONTACT_PEOPLE_FORM", null);
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
