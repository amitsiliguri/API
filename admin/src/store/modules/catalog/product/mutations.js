export const SET_PRODUCTS = (state, data) => {
    state.data = data.data;
}

export const SET_PRODUCT_TABLE_OPTIONS = (state, data) => {
    state.options.page = data.page;
    state.options.itemsPerPage = data.itemsPerPage;
}

export const PRODUCT_TABLE_LOADING = (state) => {
    state.loading = !state.loading;
}