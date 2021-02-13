export const UPDATE_TREE = (state, data) => {
    console.log(data);
    state.list = data;
}


export const UPDATE_CATEGORY_FORM_DATA = (data) => {
    console.log(data);
}


export const PUSH_CATEGORY_TO_TREE = (state, data) => {
    data.data.children = [];
    state.list.push(data.data);
    console.log(state.list);
}


export const RESET_CATEGORY_FORM_DATA = (state) => {
    state.form.status = true;
    state.form.title= '';
    state.form.short_description = '';
    state.form.banner = null;
    state.form.slug = '';
    state.form.meta_title = '';
    state.form.meta_description = '';
    state.form.meta_banner = null;
}