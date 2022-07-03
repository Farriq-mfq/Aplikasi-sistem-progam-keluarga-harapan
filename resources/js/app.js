require("./bootstrap");
import Vue from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue";
Vue.prototype.$route = route;
import { InertiaProgress } from "@inertiajs/progress";
InertiaProgress.init({
    delay: 250,
    color: "#808080",
});
createInertiaApp({
    title: (title) => `${title} - sipkh`,
    resolve: (name) => require(`./src/Views/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin);

        new Vue({
            render: (h) => h(App, props),
        }).$mount(el);
    },
});
