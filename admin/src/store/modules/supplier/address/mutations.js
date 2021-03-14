export const TOGGLE_SUPPLIER_ADDRESS_FORM_MODAL = (state, data) => {
  state.dialog = data;
  if (data == false) {
    state.form = Object.assign({}, state.defaultForm);
    state.editedIndex = -1;
  }
};

export const SUPPLIER_ADDRESS_TABLE_LOADING = state => {
  state.loading = !state.loading;
};

export const SET_SUPPLIER_ID_TO_FORM = (state, data) => {
  state.form.supplier_id = data;
};

export const SET_SUPPLIER_ADDRESS = (state, data) => {
  state.data = data.data;
};

export const SET_SUPPLIER_ADDRESS_TABLE_OPTIONS = (state, data) => {
  state.options.page = data.page;
  state.options.itemsPerPage = data.itemsPerPage;
};

export const RESET_SUPPLIER_ADDRESS_FORM = state => {
  state.form = Object.assign({}, state.defaultForm);
};

export const SET_SUPPLIER_ADDRESS_FORM_DATA = (state, data) => {
  state.editedIndex = state.data.indexOf(data);
  state.form = Object.assign({}, data);
};

export const UPDATE_SUPPLIER_ADDRESS_LIST = (state, data) => {
  if (state.editedIndex > -1) {
    Object.assign(state.data[state.editedIndex], data);
  } else {
    state.data.push(data);
  }
};
