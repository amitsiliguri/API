export const SET_USER = (state, data) => {
    state.user = data.user;
    state.token = data.token;
    state.login.email = '';
    state.login.password = '';
    
}


export const LOGING_FORM_PROCESS = (state) => {
    state.login_form_processing = ! state.login_form_processing;
}


