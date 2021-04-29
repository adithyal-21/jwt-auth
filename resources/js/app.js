require("./bootstrap");
import Vue from "vue";
import App from "./app/component/App";
import { routes } from "./app/component/Route";
import VueRouter from "vue-router";
import store from "./app/component/store";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: routes,
    mode: "history"
});
const app = new Vue({
    el: "#app",
    router: router,
    store: store,
    render: app => app(App)
});
