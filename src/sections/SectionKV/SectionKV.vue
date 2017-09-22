<script>
    import CButton from '../../components/Button/Button.vue'
    import "./sectionkv.scss"
    export default{
        components: {CButton},
        data(){
            return{
                isOpened: false,
                scrolled: 0,
            }
        },
        methods:{
            changeOpen(){
                this.isOpened=!this.isOpened;
            },
            handleScroll () {
                if (this.scrolled === 0) this.isOpened = true;
                this.scrolled = window.scrollY;

            }
        },
        created () {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed () {
            window.removeEventListener('scroll', this.handleScroll);
        }
    }
</script>
<template>
    <div id="kv" class="section-kv">
        <div class="images">
            <img class="bg" src="../../assets/BoschRabbit_2560x1440px_fon.jpg" alt="">
            <img @click="changeOpen()" class="fridge opened" src="../../assets/opened.png" alt="" v-show="isOpened">
            <img @click="changeOpen()" class="fridge closed" src="../../assets/closed.png" alt="" v-show="!isOpened">
        </div>
        <div class="key-block">
            <div class="t-title">
                Мир естественной свежести <br><strong>Nature</strong>Cool.
            </div>
            <div class="t-text">
                Bosch представляет новую линейку холодильников с технологией <strong>Nature</strong>Cool <br/>для сохранения естественной свежести, вкуса и аромата продуктов.
                <br><br>
                Пройдите игру и получите промокод на скидку на покупку Bosch <strong>Nature</strong>Cool прямо сейчас!
            </div>
            <Button v-scroll-to="'#game'" onclick="ga('send', 'event', 'button', 'kv_play');"><span>Играть</span></Button>
        </div>
    </div>
</template>

