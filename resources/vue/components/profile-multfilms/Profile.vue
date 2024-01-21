<template>
    <section class="general">
        <div class="forms">
            <create-multfilm-form :action-create="props.actionCreate"></create-multfilm-form>
        </div>
        <div class="prof-grids">
            <mult-list
                :multfilm-list="ProfileModel.list"
                :href-image="props.hrefImage"
                :href-patch="props.hrefPatch"
            ></mult-list>
        </div>
    </section>
</template>

<script setup>
import {onBeforeMount, reactive} from "vue";
import CreateMultfilmForm from "./CreateMultfilmForm.vue";

    const props = defineProps({
        actionCreate: String,
        hrefPatch: String,
        hrefImage: String
    })

    const ProfileModel = reactive({})

    async function getMultfilmList() {
        return [{
            image: 'http://sc.ru/img/Rectangle%2031.png',
            created: '20 ноября 2004',
            title: 'Ветер крепчает'
        }]
    }

    onBeforeMount(async () => {
        ProfileModel.list = await getMultfilmList()
    })
</script>
