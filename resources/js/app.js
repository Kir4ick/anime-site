import './bootstrap';

import { createApp } from "vue/dist/vue.esm-bundler";
import SignIn from "../vue/components/Sign-in.vue";
import SignUp from "../vue/components/Sign-up.vue";
import Profile from "../vue/components/profile-multfilms/Profile.vue";
import MultfilmsList from "../vue/components/profile-multfilms/MultfilmsList.vue";
import CreateMultfilmForm from "../vue/components/profile-multfilms/CreateMultfilmForm.vue";

const app = createApp({})

/** Инициализация компонентов **/
app.component("sign-in", SignIn)
app.component("sign-up", SignUp)

/** Профиль **/
app.component("mult-list", MultfilmsList)
app.component("create-mult-form", CreateMultfilmForm)
app.component("profile", Profile)

app.mount("#app")
