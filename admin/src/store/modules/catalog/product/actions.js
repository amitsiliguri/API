import Product from "@/api/Catalog/Product";

export const loadProducts = ({commit, rootGetters}, data) => {
    commit('PRODUCT_TABLE_LOADING');
    Product.get(data.page, data.itemsPerPage, rootGetters['user/requestHeaders']).then(response => {
        commit('SET_PRODUCTS', response.data);
        commit('PRODUCT_TABLE_LOADING');
    }).catch(err => {
        if (err.response) {
            if (err.response.status == 422 || err.response.status == 401) {
                commit('general/SHOW_NOTIFICATIONS', err.response.data.message, { root: true });
            }
        } else {
            commit('general/SHOW_NOTIFICATIONS', 'Something went wrong while fetching categories. Please try again.', { root: true });
        }
        commit('PRODUCT_TABLE_LOADING');
    });
}

export const setOptionValues = ({commit}, data) => {
    commit('SET_PRODUCT_TABLE_OPTIONS', data);
}
