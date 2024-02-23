import axios from "axios";
export default {
    namespaced: true,
    state: {
        authenticated: false,
        user: {},
    },
    getters: {
        authenticated(state) {
            return state.authenticated;
        },
        user(state) {
            return state.user;
        },
    },
    mutations: {
        SET_AUTHENTICATED(state, value) {
            state.authenticated = value;
        },
        SET_USER(state, value) {
            state.user = value;
        },
    },
    actions: {
        async loginAction({ commit }, param) {
            console.log(param);

            commit("SET_USER", param);
            commit("SET_AUTHENTICATED", true);
                
            return;
        },
        setLoggedOut({ commit }) {
            commit("SET_USER", {});
            commit("SET_AUTHENTICATED", false);
        },
    },
};
