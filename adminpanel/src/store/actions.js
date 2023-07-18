import axiosClient from "../axios";
import axios from "axios";
import router from "../router";
export async function login({ commit }, user) {

    try {
        await axios.get('http://localhost:8000/sanctum/csrf-cookie');
        const response = await axios.post('http://localhost:8000/login',
            {
                email: user.value.email,
                password: user.value.password,
                remember: user.value.remember
            });
        if (response.data && response.data.token) {
            commit('setUser', response.data.user);
            commit('setToken', response.data.token);

            router.push({ name: 'app.dashboard' });
        }
        return response.data;

    } catch (error) {

    }


}



export function logout({ commit }) {
    return axiosClient.post('/logout')
        .then((respone) => {
            commit('setToken', null)
            return respone;
        })
}

export function getUser({ commit }, data) {
    return axiosClient.get('/getUser')
        .then(({ data }) => {
            commit('setUser', data);
            return data;

        })
}