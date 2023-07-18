export function setUser(state, user) {
    state.user.data = user;
    localStorage.setItem('USER_DATA', JSON.stringify(user));


}

export  function setToken(state, token) {
    state.user.token = token;
    //console.log('in mutation token',token);

    if (token) {
        sessionStorage.setItem('TOKEN', token);

    } else {
        sessionStorage.removeItem('TOKEN');
    }
}
