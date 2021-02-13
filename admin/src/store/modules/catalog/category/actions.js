import Category from "@/api/Catalog/Category";
// import router from '@/router/index'

export const updateTree = ({commit, data}) => {
    commit('UPDATE_TREE', data);
}

export const updateFormData = ({commit, data}) => {
    commit('UPDATE_CATEGORY_FORM_DATA', data);
}

export const submitFormData = ({state, commit, rootGetters}) => {
    Category.store(state.form, rootGetters['user/requestHeaders']).then(response => {
        commit('PUSH_CATEGORY_TO_TREE', response.data);
        commit('RESET_CATEGORY_FORM_DATA');
    }).catch(err => {
        if (err.response) {
            if (err.response.status == 422 || err.response.status == 401) {
                commit('general/SHOW_NOTIFICATIONS', err.response.data.message, { root: true });
            }
        } else if (err.request) {
            console.log('console request');
        } else {
            console.log("something else");
        }
    });
    
}
