<script>
    import Logo from '../Logo/Logo.vue'
    import "./footer.scss"
    import API from '../../api'
    import {required, minLength, alpha, numeric, email, maxLength} from 'vuelidate/lib/validators'

    const status={
        SUCCESS:'success',
        SUCCESS_CONFIRM:'success_confirmed'
    }
    export default{
        validations: {
            support: {
                email: {
                    required,
                    email
                }
            }
        },
        components: {Logo},
        methods: {
            open_popup: function () {
                this.openpopup_support = true
            },
            close_popup: function () {
                this.openpopup_support = false
            },
            onCallback(){
                if(!this.$v.support.$invalid){
                    API.user.callback(this.support).then(_ => {
                        this.state = status.SUCCESS_CONFIRM;
                        })
                }
            }

        },
        data(){
            return {
                state:status.SUCCESS,
                states: (_ => status)(),
                openpopup_support: false,
                currentUrl: window.location.href.toString().split(window.location.host)[1],
                support: {
                    email: '',
                    message: ''
                },

            }
        },
    }

</script>
<template v-if="this.currentUrl.search('/contest') < 0">

    <div class="Footer" v-if="this.currentUrl.search('/contest') < 0">
        <div class="popup-wrapper" v-if="openpopup_support">
            <div class="popup-table popup-table--support">
                <div class="popup-table__close" v-on:click="close_popup">
                </div>
                <div class="popup-table__body" v-if="state === states.SUCCESS" >
                    <div class="popup-table__title t-title">Написать нам <br/> письмо</div>
                    <div class="support__row">
                        <p class="support__label">Ваша эл.почта</p>
                        <div class="support__option">
                            <input type="email" placeholder="Эл. Почта*"
                                   :class="{ 'invalid': $v.support.email.$invalid && $v.support.email.$dirty,'support__input' : true}"
                                   v-model.trim="support.email"
                                   @input="$v.support.email.$touch()">

                        </div>
                    </div>

                    <div class="support__row">
                        <p class="support__label">Сообщение</p>
                        <div class="support__option">
                            <textarea type="text" class="support__textarea" @textarea="$v.support.message.$touch()" v-model.trim="support.message"></textarea>
                        </div>
                    </div>
                    <div class="support__row">
                        <p class="support__label"></p>
                        <div class="support__option">
                            <Button class="Button" v-on:click="onCallback">
                                <span>Отправить</span>
                            </Button>
                        </div>
                    </div>
                </div>
                <div class="popup-table__body success_message" v-if="state === states.SUCCESS_CONFIRM"><h1>Ваше сообщение было отправлено.</h1></div>
            </div>
        </div>
        <div class="first-row">
            <a title="Наш сайт" href="/">
                <Logo/>
            </a>
            <div class="socials">

                <span>Следуйте за кроликом</span>
                <a target="_blank" class="icon circled-icon-fb" href="https://www.facebook.com/BoschHomeKZ"
                   onclick="ga('send', 'event', 'social', 'fb');"></a>
                <a target="_blank" class="icon circled-icon-vk" href="https://www.vk.com/boschhomekazakhstan"
                   onclick="ga('send', 'event', 'social', 'vk');"></a>
                <a target="_blank" class="icon circled-icon-inst" href="https://www.instagram.com/BoschHome_kz"
                   onclick="ga('send', 'event', 'social', 'insta');"></a>
            </div>
        </div>
        <div class="second-row">
            <span>2017 © ТОО "BSH Home Appliances (БСХ Хоум Аплайансэс)"</span>
            <a href="/confidentiality" target="_blank" title="Конфиденциальность">Конфиденциальность</a>
            <a href="/rules" target="_blank" title="Правила">Правила</a>

            <!--<router-link :to="{name: 'confidentiality'}">Конфиденциальность</router-link>-->
            <a href="/contacts">Контакты</a>

            <!--<router-link :to="{name: 'qa'}">Вопросы и ответы</router-link>-->
            <div class="feedback">
                <!--<a href="mailto:support@naturecool.ru" class="feedback__link">Обратная связь</a>-->
                <span v-on:click="open_popup" class="feedback__link">Обратная связь</span>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
    .feedback__link {
        cursor: pointer;
    }

    .popup-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 10;
        padding-top: 50px;
        padding-bottom: 105px;
        @media (max-width: 720px) {
            padding: 0
        }
        @media (max-width:400px){
            max-width:400px;
            width: 100%;
            padding: 0;
        }
    }

    .popup-table__close {
        background-image: url(../../assets/closebtn.png);
        width: 16px;
        height: 16px;
        position: absolute;
        top: 44px;
        right: 44px;
        cursor: pointer;

    }
    .success_message{
        text-align: center;
        line-height:350px;
        @media (max-width: 400px){
            line-height:50px
        }
    }
    .popup-table {
        position: relative;

        margin-left: 80px;
        margin-right: 80px;
        height: 436px;
        @media (max-width: 720px) {
            margin: 0;
            height: 100%;

        }
        background-color: #fff;
        box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.16);
        padding-left: 35px;
        padding-right: 35px;
        padding-bottom: 48px;
        padding-top: 32px;
        font-size: 12px;
        line-height: 16px;
    }

    .popup-table--support {
        width: 622px;
        margin-left: auto;
        margin-right: auto;
        @media (max-width:400px){
            width: inherit;
        }
        .support__row {
            overflow: hidden;
            margin-top: 32px;
            padding-top: 2px;
            padding-bottom: 2px;
        }
        .support__row + .support__row {
            margin-top: 24px;
        }
        .support__option {
            width: 328px;
            float: left;
        }
        .support__input {
            outline-width: thin;
            border: none;
            border-bottom: 1px solid #BFC0C2;
            height: 40px;
            width: 100%;
            font-size: 20px;
            &.invalid{
                color: #df150d;
                border-color: #df150d;
            }
        }
        .support__textarea {
            outline-width: thin;
            border: none;
            border-bottom: 1px solid #BFC0C2;
            height: 96px;
            width: 100%;
            resize: none;
            outline: none;
            font-size: 20px;
            &.invalid{
                color: #df150d;
                border-color: #df150d;
            }
        }
        .support__label {
            float: left;
            width: 142px;
            padding: 0;
            margin-top: 0;
            margin-bottom: 0;
            margin-right: 24px;
            -ms-text-overflow: ellipsis;
            line-height: 40px;
            text-overflow: ellipsis;
            overflow: hidden;
            font-size: 20px;
            min-height: 1px;
        }
    }
</style>
