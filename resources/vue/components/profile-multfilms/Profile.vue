<template>
    <section class="general">
        <div class="forms">
            <create-multfilm-form
                :action-create="props.actionCreate"
                :loader="props.loader"
                @updateMultList="unshiftToList"
            ></create-multfilm-form>
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
    import axios from "axios";

    const props = defineProps({
        actionCreate: String,
        hrefPatch: String,
        hrefImage: String,
        loader: String,
        actionList: String
    })

    const ProfileModel = reactive({
        list: []
    })

    async function getMultfilmList() {

        let response = {data: []}

        try {
            response = await axios.get(props.actionList)
            response = response.data
        } catch (exception) {}

        return response.data
    }

    function unshiftToList(element) {
        ProfileModel.list.unshift(element)
    }

    onBeforeMount(async () => {
        ProfileModel.list = await getMultfilmList()
    })
</script>
