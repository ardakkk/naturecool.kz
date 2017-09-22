<template>
    <div class="page-main">
        <SectionKV/>
        <SectionGame/>
        <SectionTechnology/>
        <SectionMap/>
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
            SectionKV,
            SectionGame,
            SectionTechnology,
            SectionMap
        }
    }
</script>
