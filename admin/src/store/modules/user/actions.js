import User from "@/api/User";
import router from '@/router/index'


export const requestToken = ({commit, state}) => {
    commit('LOGING_FORM_PROCESS');
    User.requestToken(state.login)
    .then(response => {
        commit('SET_USER', response.data);
        commit('LOGING_FORM_PROCESS');
        router.push({
            name:'About'
        })
    }).catch(err => {
        if (err.response) {
            if (err.response.status == 422) {
                commit('general/SHOW_NOTIFICATIONS', err.response.data.message, { root: true });
                commit('LOGING_FORM_ERROR', err.response.data.errors);
            }
        } else {
            commit('general/SHOW_NOTIFICATIONS', 'Something went wrong while loggingIn. Please try again.', { root: true });
        }
        commit('LOGING_FORM_PROCESS');
    });
}

// export const getCurrentUserData = ({commit, getters}) => {
//     User.getCurrentUserDetails(getters.requestHeaders).then(response => {
//         console.log(response.data);
//         // commit('SET_USER', response.data);
//     }).catch(err => {
//         if (err.response) {
//             if (err.response.status == 422 || err.response.status == 401) {
//                 commit('general/SHOW_NOTIFICATIONS', err.response.data.message, { root: true });
//             }
//         } else if (err.request) {
//             console.log('console request');
//         } else {
//             console.log("something else");
//         }
//     });
// }