import './bootstrap';

import { createApp } from "vue/dist/vue.esm-bundler";
import SignIn from "../vue/components/Sign-in.vue";
import SignUp from "../vue/components/Sign-up.vue";

const app = createApp({})

/** Инициализация компонентов **/
app.component("sign-in", SignIn)
app.component("sign-up", SignUp)

app.mount("#app")
