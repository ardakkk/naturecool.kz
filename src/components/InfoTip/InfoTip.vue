<script>
    import "./infotip.scss"
    export default {
        props:{
            'type':{
                default: 'info'
            },
            'to':{
                default: false
            }
        },
        methods:{
            onClick(){
                if (this.to){
                    if (this.to.name === 'confidentiality')
                        window.open('https://naturecool.ru/confidentiality','_blank');
                    else this.$router.push(this.to);
                }
            }
        }
    }
</script>
<template>
    <div class="InfoTip" @click="onClick">
        <slot/><span class="icon" :class="type"></span>
    </div>
</template>
