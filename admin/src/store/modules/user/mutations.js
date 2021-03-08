export const SET_USER = (state, data) => {
  state.user = data.user;
  state.token = data.token;
  state.login.email = "";
  state.login.password = "";
  state.login.emai_error = "";
};

export const LOGGING_FORM_PROCESS = state => {
  state.login.processing = !state.login.processing;
};

export const LOGGING_FORM_ERROR = (state, data) => {
  state.login.email_error = data.email[0];
};
