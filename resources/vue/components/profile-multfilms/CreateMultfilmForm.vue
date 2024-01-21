<template>
    <label class="label-name" for="">Добавить мультфильм</label>
    <form class="form-regg" method="post" @submit.prevent="createMultfilm" enctype="multipart/form-data">
        <div style="position: relative">
            <input class="inp" v-model="dataModel.title" type="text" placeholder="Название мультфильма"><br>
            <div v-if="!checkIsEmptyStringValue(errorList.title)"
                 style="position: absolute; color: #1B9DCF; margin-top: 5px; left: -120px">
                {{ errorList.title }}
            </div>
        </div>
        <div style="position: relative">
            <input class="inp" v-model="dataModel.premier" type="date" placeholder="Премьера мультфильма"><br>
            <div v-if="!checkIsEmptyStringValue(errorList.premier)"
                 style="position: absolute; color: #1B9DCF; margin-top: 5px; left: -120px">
                {{ errorList.premier }}
            </div>
        </div>
        <div style="position: relative">
            <label class="form-reginput-file" for="poster">
                <input type="file" id="poster" style="display: none">
                <span class="input-file-textt" style="margin-top: 35px">Выберите обложку мультильма</span>
                <span class="input-file-btn">Выбрать</span>
            </label>
            <div v-if="!checkIsEmptyStringValue(errorList.poster)"
                 style="position: absolute; color: #1B9DCF; margin-top: 5px; left: -120px">
                {{ errorList.poster }}
            </div>
        </div>
        <br>
        <br>
        <button class="bregg" id="create" style="cursor: pointer">
            <img v-if="load.value" :src="props.loader" style="width: 25px; height: 25px">
            Добавить
        </button>
    </form>
</template>

<script setup>
    import {onMounted, reactive} from "vue";
    import createArticleErrorListModel from "../../models/components/profile/createArticleErrorListModel.js";
    import createArticleDataModel from "../../models/components/profile/createArticleDataModel.js";
    import {checkIsEmptyStringValue, checkIsNullValue, checkUndefinedValue} from "../../../js/validation/validators.js";
    import {getBase64File} from "../../../js/actions/actions.js";
    import axios from "axios";

    const props = defineProps({
        actionCreate: String,
        loader: String
    })

    const emit = defineEmits(['updateMultList'])

    const errorList = reactive({createArticleErrorListModel})
    const dataModel = reactive(createArticleDataModel)
    const load = reactive({value: false})

    async function createMultfilm() {
        load.value = !load.value
        let button = document.getElementById('create');
        button.disabled = true

        if (dataModel.title.length < 4) {
            errorList.title = 'Название мультфильма не может быть короче 4 символов'
        }

        if (checkIsEmptyStringValue(dataModel.premier)) {
            errorList.premier = 'Дата не может быть пустой'
        }

        let file_input = document.getElementById('poster')
        let files = file_input.files

        if (files.length === 0) {
            errorList.poster = 'Загрузите пожалуйста фотографию'
        }

        if (
            !checkIsEmptyStringValue(errorList.title) &&
            !checkIsEmptyStringValue(errorList.premier) &&
            !checkIsEmptyStringValue(errorList.poster)
        ) {
            load.value = !load.value
            button.disabled = false
            return false
        }

        dataModel.poster = await getBase64File(files[0]).then( (data) => { return data })

        let result = await makeRequestCreate()
        if (!checkIsNullValue(result)) {
            emit('updateMultList', result)
        }

        load.value = !load.value
        button.disabled = false
        return false
    }

    onMounted(() => {
        setInterval(() => {
            errorList.title = ''
            errorList.premier = ''
            errorList.poster = ''
        }, 5000)
    })

    async function makeRequestCreate() {
        try {
            let response = await axios.post(props.actionCreate, dataModel, {
                withCredentials: true,
                headers: {
                    "Content-Type": "application/json"
                },
            })

            response = await response.data
            response = response.data

            if (!checkUndefinedValue(response.error_message)) {
                errorList.title = response.error_message
            }

            return response
        } catch (exception) {
            if (exception.response.status === 422) {
                let validationErrors = exception.response.data
                errorList.poster = validationErrors.poster === undefined ? validationErrors.poster[0] : ''
                errorList.premier = validationErrors.premier === undefined ? validationErrors.premier[0] : ''
                errorList.title = validationErrors.title  === undefined ? validationErrors.title[0] : ''
            }

            return null
        }
    }

</script>
