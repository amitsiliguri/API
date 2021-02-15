export const SHOW_NOTIFICATIONS = (state, data) => {
    state.snackbar_text = data;
    state.snackbar = true;
}

export const HIDE_NOTIFICATIONS = (state, data) => {
    state.snackbar = data;
    state.snackbar_text = '';
}

export const LOADER = (state, data) => {
    state.loader = data;
}