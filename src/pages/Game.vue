<template>
    <div class="page-main">
        <SectionGame/>
    </div>
</template>
<script>
    import {
            SectionKV,
            SectionGame,
            SectionTechnology,
            SectionMap
    } from '../sections'
    export default{
        components: {
            SectionGame,
        }
    }
</script>
