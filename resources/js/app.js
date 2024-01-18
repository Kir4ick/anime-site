import './bootstrap';

import { createApp } from "vue/dist/vue.esm-bundler";
import SignIn from "../vue/components/Sign-in.vue";

const app = createApp({})

/** Инициализация компонентов **/
app.component("sign-in", SignIn)

app.mount("#app")
