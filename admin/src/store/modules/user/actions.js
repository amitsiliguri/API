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
            console.log('console response');
        } else if (err.request) {
            console.log('console request');
        } else {
            console.log("something else");
        }
        commit('LOGING_FORM_PROCESS');
    });
}