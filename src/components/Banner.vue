<template>
    <div v-if="currentUrl.search('/contest') < 0" class="Banner" onclick="ga('send', 'event', 'button', 'banner');">
        <div class="text">
            Найти ближайший магазин Bosch
        </div>
        <div class="icon-close-white" @click="$emit('close')"></div>
    </div>
</template>
<script>
    export default{

        data(){return{
            currentUrl : window.location.href.toString().split(window.location.host)[1]
        }},
    }

</script>
<style lang="scss" scoped>
    .Banner{
        color: white;
        font-weight: bold;
        padding: 1rem 2rem;
        background-image: linear-gradient(315deg, #78BE20 0%, #006249 100%);
        display: flex;
        cursor: pointer;
        justify-content: space-between;

        .icon-close-white{
            cursor: pointer;
            width: 1.5rem;
            height: 1.5rem;
            background-size: 60%;
            transition: 200ms all linear;

            &:hover {
                transform: rotate(90deg);
             }
        }
    }
</style>
