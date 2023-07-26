import { createStore } from "vuex";
import * as actions from './actions.js';
import * as mutations from './mutations.js'

const store =createStore(
    {
        state:{
            user:{
                token: sessionStorage.getItem('TOKEN') || '',
                data:JSON.parse(localStorage.getItem('USER_DATA'))||'',
            },
            Products:{

            },
            Product:{}
        },

        mutations,
        actions,
        getters: {
            userName: (state) => state.user.data.name,
            userToken: (state) => state.user.token,
            Products:(state)=>state.Products,
            Product:(state)=>state.Product

          },
    }
);

export default store;