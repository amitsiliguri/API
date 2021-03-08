export const CREATE_TREE = (state, data) => {
  state.list = data;
};

export const UPDATE_CATEGORY_FORM_DATA = (state, data) => {
  state.form.id = data.id;
  if (data.status == 1) {
    state.form.status = true;
  } else {
    state.form.status = false;
  }
  data.status;
  state.form.title = data.title;
  state.form.short_description = data.short_description;
  state.form.banner = data.banner;
  state.form.slug = data.slug;
  state.form.meta_title = data.meta_title;
  state.form.meta_description = data.meta_description;
  state.form.meta_banner = data.meta_banner;
};

export const PUSH_CATEGORY_TO_TREE = (state, data) => {
  data.data.children = [];
  state.list.push(data.data);
};

export const RESET_CATEGORY_FORM_DATA = state => {
  state.resetForm = !state.resetForm;
};

// export const UPDATE_ITEM_IN_TREE = (state, data) => {
//     state.resetForm = !state.resetForm;
// }
