<script>
    export default{
        methods: {
            set_active_image: function (i, j) {

                this.$set(this, 'active_image_index', i);
                if (document.getElementsByClassName('besure__img-cont--active') && document.getElementsByClassName('besure__img-cont--active')[0]) {
                    document.getElementsByClassName('besure__img-cont--active')[0].classList.toggle('besure__img-cont--active');
                }
                document.getElementsByClassName('besure__img-cont')[j].classList.toggle('besure__img-cont--active');

                if (document.getElementsByClassName('besure__cell--active') && document.getElementsByClassName('besure__cell--active')[0]) {
                    document.getElementsByClassName('besure__cell--active')[0].classList.toggle('besure__cell--active');
                }
                if (i == 0) {
                    document.getElementsByClassName('besure__cell--green')[0].classList.toggle('besure__cell--active');
                }
                if (i == 1) {
                    document.getElementsByClassName('besure__cell--green')[1].classList.toggle('besure__cell--active');
                }
                if (i == 2) {
                    document.getElementsByClassName('besure__cell--green')[2].classList.toggle('besure__cell--active');
                }
                if (i == 3) {

                }

//                this.$nextTick()
            }
        },
        data: function () {
            return {
                active_image_index: 0,
                active_slide_index: 0,
                classObject1: 'besure__cell besure__cell--green',
                slides: [
                    {
                        img: '../assets/sect-2.jpg',
                        text: 'Яркое и равномерное освещение холодильной камеры.'
                    },
                    {
                        img: '../assets/sect-1.jpg',
                        text: 'Не образуется лед. Внутри морозильной камеры нет металлических элементов, а испаритель встроен в стенки камеры. Теплый и влажный воздух не контактирует с испарителем.'
                    },
                    {
                        img: '../assets/sect-3.jpg',
                        text: 'Сохранение естественной влажности на уровне 70%. Это создает оптимальные  условия для сохранения сохранение свежести продуктов и предохраняет от высушивания.'
                    }
                ]
            }
        }
    }
</script>
<template>
    <div id="besure" class="section-beshure">
        <div class="besure__col">
            <div class="besure__cell">
                <div class="t-title">Свойства</div>
            </div>
            <div class="besure__cell besure__cell--green besure__cell--small besure__cell--active">
                Яркое и равномерное освещение холодильной камеры.
            </div>

            <div class="besure__cell besure__cell--small">
                <div class="besure__img-cont">
                    <img class="besure__img" src="../assets/sect-2.jpg" alt="" @click="set_active_image(1,0)"/>
                </div>
            </div>
            <div class="besure__cell besure__cell--green">
                Не образуется лед. Внутри морозильной камеры нет металлических элементов, а испаритель встроен в стенки камеры. Теплый и влажный воздух не контактирует с испарителем.
            </div>

        </div>
        <div class="besure__col besure__col--center">
            <div class="besure__cell">
                <div class="besure__img-cont besure__img-cont--active">
                    <img class="besure__img" src="../assets/sect-1.jpg" alt="" @click="set_active_image(0,1)"/>
                </div>
            </div>
            <div class="besure__cell">
                <div class="besure__img-cont">
                    <img class="besure__img" src="../assets/sect-3.jpg" alt="" @click="set_active_image(1,2)"/>
                </div>
            </div>
        </div>
        <div class="besure__col">
            <div class="besure__cell besure__cell--green">
                Сохранение естественной влажности на уровне 70%. Это создает оптимальные  условия для сохранения сохранение свежести продуктов и предохраняет от высушивания.
            </div>
            <div class="besure__cell">
                <div class="besure__img-cont">
                    <img class="besure__img" src="../assets/sect-5.jpg" alt="" @click="set_active_image(2,3)"/>
                </div>

            </div>
            <div class="besure__cell">
                <div class="besure__img-cont">
                    <img class="besure__img" src="../assets/sect-4.jpg" alt="" @click="set_active_image(2,4)"/>
                </div>
                <div class="besure__croll"  alt=""></div>

            </div>
        </div>
        <div class="besure__slide">
            <div class="t-title">Свойства.</div>
            <div class="besure__slide__i">
                <div :class="['besure__slide__img besure__slide__img-'+active_slide_index]"></div>
                <div class="besure__slide__text">{{slides[active_slide_index].text}}</div>
            </div>
        </div>
        <div class="carousel__mobile">
            <svg v-on:click="active_slide_index = (active_slide_index - 1 >= 0 ? active_slide_index - 1 : slides.length - 1)"
                 class="carousel__mobile__arrow carousel__mobile__i" width="11px" height="18px" viewBox="0 0 11 18"
                 version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <image id="icons8-left_4" x="-5" y="-3" width="24" height="24"
                           xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABGdBTUEAA1teXP8meAAAANZJREFUaAXtmUEOwjAMBCuOFb/jJ/ygAolf8BMufAwcwV56c4gpKyZSlEvi7o59cJppYkAAAhD4NwKHMLxzNX0O4Y+YV0cTl7f4ZqDNY0ybIfISfw/lexf1iN8qU5CHfAcByqYD2pAjkB+CsSMI5DugDTliTX7dVd4CyTwEyxeCLPENdZRt3byrtL0ZfZIs6xKS8dOvlZKEZVZMZGhV7iUTlXQzsclEhlblXjJRSTcTm0xkaFXuJROVdDOx112s1e91GVU5WT5wyIT1E5NMsEIAAhB4EXgC6q6Juc4U3+IAAAAASUVORK5CYII="></image>
                </g>
            </svg>
            <span class="carousel__mobile__text">{{active_slide_index + 1}} / {{slides.length}}</span>
            <svg v-on:click="active_slide_index = (active_slide_index + 1 < slides.length ? active_slide_index + 1 : 0)"
                 class="carousel__mobile__arrow carousel__mobile__i" width="11px" height="18px" viewBox="0 0 11 18"
                 version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g id="Mobile" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="mobile/second" transform="translate(-210.000000, -3280.000000)">
                        <image id="icons8-right_4" x="202" y="3277" width="24" height="24"
                               xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABGdBTUEAA1teXP8meAAAAMxJREFUaAXtmTEOgzAMRaFjr9eb9AadGMrey8DZWltKJIQ6FMdC/dGL5IHBxv99RwpkGFgQgAAEeiFwMSE3VTGjNf6yeFvMiiLupXkX4DGpibhaw0tpvoqQcwIR/zJ2OIETiQQYp0SYTaVwoglfYjJOJMJsKtWNE6thqIe/bk6xjyPe+lcUK0jA94HsCH3bxM8giNPTaP505OWFkId8gABjE4CWkgL5FIyBIpAPQEtJkSbvBOR/r28vOGROlfvZk75i2ovhGQIQgMBvBD7y6YmxTdGfhQAAAABJRU5ErkJggg=="></image>
                    </g>
                </g>
            </svg>
        </div>
    </div>
</template>
<style lang="scss" scoped>
    .besure__img-cont {
        opacity: 0.6;
        -webkit-transition-timing-function: ease-in-out;
        -moz-transition-timing-function: ease-in-out;
        -o-transition-timing-function: ease-in-out;
        -ms-transition-timing-function: ease-in-out;
        transition-timing-function: ease-in-out;
        -webkit-transition-duration: .3s;
        -moz-transition-duration: .3s;
        -o-transition-duration: .3s;
        -ms-transition-duration: .3s;
        transition-duration: .3s;
        -webkit-transition-property: opacity;
        -moz-transition-property: opacity;
        -o-transition-property: opacity;
        -ms-transition-property: opacity;
        transition-property: opacity;
        cursor: pointer;
    }

    .besure__img {
        overflow: hidden;
        width: 100%;
    }

    .besure__img-cont:hover {
        opacity: 1;
        max-width: 100%;
    }

    .besure__img-cont--active {
        opacity: 1;
        cursor: default;
    }

    .besure__croll {
        width: 12vw;
        height:12vw;
        /*max-width: 120px;*/
        position: absolute;
        -webkit-background-size:contain;
        background-size:contain;
        right: -7vw;
        position: absolute;
        bottom: -12vw;
        background-image: url(../assets/croll.png);
    }

    .besure__col {
        width: 35%;
        padding-left: 8px;
        padding-right: 8px;
        display: inline-block;
        vertical-align: top;
        padding-bottom: 12vw;
        @media (max-width: 720px) {
            display: none;
        }
    }

    .besure__slide {
        display: none;
        @media (max-width: 720px) {
            display: block;
        }
    }

    .besure__slide__img {
        width: 100%;
        height: 65vw;
        background-size: cover;
        background-repeat: no-repeat;

    }

    .besure__slide__text {
        margin-left: 16px;
        margin-right: 16px;
        padding: 24px;
        color: #fff;
        position: relative;
        top: -16px;
        background-color: #78BE20;
    }

    .besure__slide__img-0 {
        background-image: url('../assets/sect-2.jpg');

    }

    .besure__slide__img-1 {
        background-image: url('../assets/sect-1.jpg');

    }

    .besure__slide__img-2 {
        background-image: url('../assets/sect-3.jpg');

    }

    .besure__col--center {
        width: 21%;
    }

    .besure__cell {
        margin-bottom: 16px;
        position: relative;

    }

    .besure__cell--small {
        margin-left: 30%;
    }

    .besure__cell--green {
        background-color: #78BE20;
        padding: 12px;
        color: #ffffff;
        opacity: 0;
        -webkit-transition-timing-function: ease-in-out;
        -moz-transition-timing-function: ease-in-out;
        -o-transition-timing-function: ease-in-out;
        -ms-transition-timing-function: ease-in-out;
        transition-timing-function: ease-in-out;
        -webkit-transition-duration: .3s;
        -moz-transition-duration: .3s;
        -o-transition-duration: .3s;
        -ms-transition-duration: .3s;
        transition-duration: .3s;
        -webkit-transition-property: opacity;
        -moz-transition-property: opacity;
        -o-transition-property: opacity;
        -ms-transition-property: opacity;
        transition-property: opacity;
    }

    .besure__cell--active {
        opacity: 1;
    }

    .section-beshure {
        padding: 8rem 10vw 0;

        @media (max-width: 720px) {
            padding: 2rem 1rem 0;
        }
    }
</style>