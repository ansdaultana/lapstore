import axiosClient from "../axios";

export function login({commit},data)
{
    return axiosClient.post('/login',data)
    .then(({data})=>{
        commit('setUser',data.user);
        commit('setToken',data.token);
        return data;
    });
}


export function logout({commit})
{
    return axiosClient.post('/logout')
    .then((respone)=>
    {
        commit('setToken',null)
        return respone;
    })
}

export function getUser({commit},data)
{
    return axiosClient.get('/getUser')
            .then(({data})=>
            {   
            commit('setUser', data);
            return data;

            })            
}