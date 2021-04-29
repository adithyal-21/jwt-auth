import Vuex from "vuex";
import Vue from "vue";
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        token: localStorage.getItem("auth") || ""
    },
    mutations: {
        settoken(state, token) {
            localStorage.setItem("auth", token);
            state.token = token;
        },
        cleartoken(state) {
            localStorage.removeItem("auth");
            state.token = "";
        }
    }
});
