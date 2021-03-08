import Category from "@/api/Catalog/Category";

export const resetForm = ({ commit }) => {
  commit("RESET_CATEGORY_FORM_DATA");
};

export const submitFormData = ({ state, commit, rootGetters }) => {
  commit("general/LOADER", true, { root: true });
  if (!state.form.status) {
    state.form.status = false;
  }
  if (state.form.id) {
    Category.update(
      state.form.id,
      state.form,
      rootGetters["user/requestHeaders"]
    )
      .then(response => {
        // commit('UPDATE_ITEM_IN_TREE', response.data);
        console.log(response.data);
        commit("RESET_CATEGORY_FORM_DATA");
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
            "Something went wrong while updating category",
            { root: true }
          );
        }
        commit("general/LOADER", false, { root: true });
      });
  } else {
    Category.store(state.form, rootGetters["user/requestHeaders"])
      .then(response => {
        commit("PUSH_CATEGORY_TO_TREE", response.data);
        commit("RESET_CATEGORY_FORM_DATA");
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

export const loadTree = ({ commit, rootGetters }) => {
  Category.tree(rootGetters["user/requestHeaders"])
    .then(response => {
      commit("CREATE_TREE", response.data);
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
    });
};

export const editList = ({ commit, rootGetters }, data) => {
  Category.get(data, rootGetters["user/requestHeaders"])
    .then(response => {
      commit("UPDATE_CATEGORY_FORM_DATA", response.data);
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
          "Something went wrong while fetching category. Please try again.",
          { root: true }
        );
      }
    });
};

export const saveReorder = ({ commit, state, rootGetters }) => {
  commit("general/LOADER", true, { root: true });
  Category.reorder(state.list, rootGetters["user/requestHeaders"])
    .then(response => {
      console.log(response.data);
      commit(
        "general/SHOW_NOTIFICATIONS",
        "Categories re-ordered Successfully.",
        { root: true }
      );
      commit("general/LOADER", false, { root: true });
    })
    .catch(err => {
      commit("general/LOADER", false, { root: true });
      if (err.response) {
        if (err.response.status == 422 || err.response.status == 401) {
          commit("general/SHOW_NOTIFICATIONS", err.response.data.message, {
            root: true
          });
        }
      } else {
        commit(
          "general/SHOW_NOTIFICATIONS",
          "Something went wrong while re-ordering categories.",
          { root: true }
        );
      }
    });
};
