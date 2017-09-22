<template>
    <div class="page-main tech-page">
        <SectionTechnology/>
        <SectionModel/>
        <SectionBeSure/>
        <SectionMap/>
    </div>
</template>
<script>
    import {
        SectionTechnology,
        SectionModel,
        SectionBeSure,
        SectionMap
    } from '../sections'
    export default{
        components: {
            SectionTechnology,
            SectionModel,
            SectionBeSure,
            SectionMap
        }
    }

</script>
<style lang="scss" scoped>
</style>
