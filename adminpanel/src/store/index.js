import { createStore } from "vuex";
import * as actions from './actions.js';
import * as mutations from './mutations.js'

const store =createStore(
    {
        state:{
            user:{
                token: sessionStorage.getItem('TOKEN') || '',
                data:JSON.parse(localStorage.getItem('USER_DATA'))||'',
            }
        },
        mutations,
        actions,
        getters: {
            userName: (state) => state.user.data.name,
            userToken: (state) => state.user.token
          },
    }
);

export default store;