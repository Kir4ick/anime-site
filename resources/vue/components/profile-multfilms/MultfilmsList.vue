<template>
    <div class="lab">
        <label class="label-name2" for="">Мультфильмы</label>
    </div>
    <div class="colums">
        <div v-for="item of props.multfilmList">
            <div class="wth72l">
                <img class="imgava2l" :src="item.image" alt="">
                <a :href=" hrefPatch + '/' + item.id ">
                    <img class="imgpdp72l" :src="props.hrefImage" alt="">
                </a>
                <p class="ppp">{{ item.created }}</p>
                <p class="ppp2">« {{ item.title }} »</p>
            </div>
        </div>
    </div>
</template>

<script setup>

    const props = defineProps({
        multfilmList: Array,
        hrefPatch: String,
        hrefImage: String
    })

</script>

