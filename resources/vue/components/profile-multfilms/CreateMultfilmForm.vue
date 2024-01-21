<template>
    <label class="label-name" for="">Добавить мультфильм</label>
    <form class="form-regg" action="" method="post" enctype="multipart/form-data">
        <input class="inp" type="email" placeholder="Название мультфильма"><br>
        <input class="inp" type="text" placeholder="Премьера мультфильма"><br>
        <label class="form-reginput-file">
            <span class="input-file-textt">Выберите обложку мультильма</span>
            <span class="input-file-btn">Выбрать</span>
        </label>
        <br>
        <br>
        <button class="bregg">Добавить</button>
    </form>
</template>

<script setup>
    const props = defineProps({
        actionCreate: String
    })
</script>

<style scoped>

</style>
