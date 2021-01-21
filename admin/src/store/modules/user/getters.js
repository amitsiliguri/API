export const token = (state) => {
    return state.token;
}

export const requestHeaders = (state) => {
    let config ={
        headers: {
            "Content-Type" : "application/json",
            "Accept" : "application/json",
            "Authorization" : `Bearer ${state.token}`
        }
      }
    return config ;
}