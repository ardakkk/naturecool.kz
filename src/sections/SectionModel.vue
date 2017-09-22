<script>
    import CButton from '../components/Button/Button.vue'
    export default{
        methods: {
            check: function (index) {
                if (this.active == index) {
                    this.active = -1
                } else {
                    this.active = index;
                }
            },

            open_popup: function () {
                this.openpopup = true
            },
            close_popup: function () {
                this.openpopup = false
            },
            set_active_color: function (color_column, color_index) {
                this['activeColor_' + color_column] = color_index
            }


        },
        data: function () {
            return {
                activeFreez:0,
                possibleColors: [0, 1, 2],
                activeColor_0: 1,
                activeColor_1: 1,
                hover: true,
                openpopup: false,
                active: -1,
                labels: ['Series | 4 <br> Опция 1', 'Series | 4 <br> Опция 2'],
                list: [
                {
                    label: 'Зона свежести',
                    values: [{items: ['VitaFresh с регулировкой влажности']}, {items: ['VitaFresh с регулировкой влажности']}]
                },
                {
                    label: 'Объём и аксессуары',
                    values: [
                    {
                        items: ['До 351 литров', 'VarioXL', 'Отделение для молочных продуктов', 'Подвес на 2 бутылки']
                    },
                    {
                        items: ['До 351 литров', 'VarioXL', 'Подвесной ящик', 'Ящик на дверце',]
                    }
                    ]
                },
                {
                    label: 'Уровень шума',
                    values: [{
                        items: ['38 дБА']
                    }, {
                        items: ['38 дБА']
                    }]
                },
                {
                    label: 'Управление и электроника',
                    values: [
                    {
                        items: ['Внешний дисплей / Топ-панель Twin LED освещение']
                    },
                    {
                        items: ['Внешний дисплей / Топ-панель Twin LED освещение']
                    }
                    ],
                },

                {
                    label: 'Энергоэффективноть',
                    values: [{
                        items: ['A+']
                    }, {
                        items: ['A+']
                    }],
                },
                {
                    label: 'Идеальное расположение',
                    values: [{
                        items: ['PerfectFit', 'Без зазоров сбоку и сзади', 'Открытие двери на 90°']
                    }, {
                        items: ['PerfectFit', 'Без зазоров сбоку и сзади', 'Открытие двери на 90°']
                    }],
                }
                ]
            }
        },
        components: {CButton}
    }
</script>
<template>
    <div id="model" class="section-model">
        <div class="popup-wrapper" v-if="openpopup">
            <div class="popup-table">
                <div class="popup-table__close" v-on:click="close_popup">
                </div>
                <div class="popup-table__body">
                    <div class="popup-table__title t-title">Технические характеристики <br/>Bosch <strong>Nature</strong>Cool</div>
                    <div class="table table--pc">
                        <div class="table__row">
                            <div class="table__cell"></div>
                            <div class="table__cell" v-for="name in labels" v-html="name"></div>
                        </div>
                        <div class="table__row" v-for="item in list">
                            <div class="table__cell table__row-m" v-html="item.label"></div>
                            <div class="table__cell" v-for="val in item.values">
                                <div class="table__i" v-for="i in val.items">{{i}}</div>

                            </div>
                        </div>
                    </div>
                    <div class="table--mobile">
                        <template v-for="(item, item_index ) in list">
                            <div v-bind:class="{table__cell :true,table__chouser :true ,'table__chouser--active': active == item_index}"
                            v-on:click="check(item_index)" v-html="item.label">
                        </div>
                        <div class="table">
                            <div class="table__row" v-for="(label, index) in labels">
                                <div class="table__cell table__cell__m-label" v-html="label"></div>
                                <div class="table__cell">
                                    <div class="table__i" v-for="val in item.values[index].items">
                                        {{val}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>


                </div>
            </div>
        </div>
    </div>


    <div class="fridges-wrapper">
        <div class="fridges-bg">
            <div class="fridges-flower__wrap">
                <div class="fridges-flower"></div>
                <div class="fridges__content">
                    <div class="key-block models_container">
                        <div class="t-title">Модели</div>
                        <div class="t-text">Все модели наших серий холодильников Bosch <b>Nature</b>Cool с нижним расположением морозильной камеры объединяет один фактор: они – прекрасное место для сохранения естественной свежести продуктов.
                        </div>

                        <Button v-scroll-to="'#map'"><span>Где купить</span></Button>
                    </div>
                    <div class="models">
                        <div v-bind:class="{model: true, model__active: activeFreez==0}">
                            <div :class="['freez freez-s6 freez-s4-'+(activeColor_0+1)]"></div>
                            <div class="t-title">Bosch <strong>Nature</strong>Cool <br/>Serie | 4</div>
                            <div v-on:click="open_popup" class="model__link">
                                Технические характеристики
                            </div>
                            <div class="model__btn">
                                <div v-on:click="set_active_color(0,color)" v-for="color in possibleColors"
                                :class="['model__btn__i model__btn__i-'+color+(activeColor_0==color ? ' model__btn__i--active' : '')]">
                            </div>
                        </div>
                    </div>
                        <!-- <div v-bind:class="{model: true, model__active: activeFreez==1}">
                            <div :class="['freez freez-s6 freez-s6-'+(activeColor_1+1)]"></div>
                            <div class="t-title">Bosch <strong>Nature</strong>Cool <br/>Serie | 6</div>
                            <div v-on:click="open_popup" class="model__link">
                                Технические характеристики
                            </div>
                            <div class="model__btn">
                                <div v-on:click="set_active_color(1,color)" v-for="color in possibleColors"
                                     :class="['model__btn__i model__btn__i-'+color+(activeColor_1==color ? ' model__btn__i--active' : '')]">
                                </div>
                            </div>
                        </div> -->
                        <ul class="carousel__pagination carousel__pagination--mobile carousel__pagination--freeze">
                            <li v-on:click="activeFreez = 0" v-bind:class="{carousel__pagination__i: true,'carousel__pagination__i--active':activeFreez == 0}"></li>
                            <li v-on:click="activeFreez = 1" v-bind:class="{carousel__pagination__i: true,'carousel__pagination__i--active':activeFreez == 1}"></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!--<img class="fridges" src="../assets/models.png" alt="">-->
    </div>


</div>
</template>
<style lang="scss" scoped>
    @import "../styles/variables.scss";
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
    }
      .popup-table__close {
        background-image: url(../assets/closebtn.png);
        width: 16px;
        height: 16px;
        position: absolute;
        top: 65px;
        right: 30px;
        cursor: pointer;

    }
    .popup-table{
        background-color: #fff;
        box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.16);
        padding-left: 35px;
        padding-right: 35px;
        padding-bottom: 48px;
        padding-top: 32px;
        font-size: 12px;
        line-height: 16px;
    }
    Button{
        display: inline-block;
        background-color: $colorgreen;
        border-bottom: 2px solid $colorgreendark;
        padding: .7rem 2.2rem;
        color: $colorwhite;
        cursor: pointer;
        position: relative;
        white-space: nowrap;
        font-size: 1rem;
        border-top:none;
        border-right:none;
        border-left:none;
        span {
            position: relative;
            z-index: 2;
        }

        &::before {
            content: "";
            bottom: 0;
            position: absolute;
            width: 100%;
            left: 0;
            height: 0;
            z-index: 0;
            transition: 350ms all linear;
        }

        &:hover {
            border-bottom: 2px solid $colorgreenbutton;

            &::before {
              height: 100%;
              background: $colorgreenlight;
          }
      }

      &.disabled {
        color: $colorwhite;
        background-color: $colorgreybutton;
        border-bottom: 2px solid $colorgreyborder;

        &:hover {
          &::before {
            height: 0;
        }
    }
}
}
.fridges__content{
    padding: 8rem 10vw 0;
    white-space: nowrap;
    @media (max-width: 720px) {
        padding: 0rem;
        white-space: normal;
    }

}
.table {
    display: table;

    width: 100%;
    @media (min-width: 720px) {
        margin-top: 32px;
    }
}

.table__row {
    display: table-row;
}

.table__cell {
    display: table-cell;
    vertical-align: top;
    border-bottom: 1px solid #E6E6E6;
}

.table__cell__m-label {
    width: 40%;
}

.table__chouser {
    border-bottom: 1px solid #E6E6E6;
    display: block;
    position: relative;
    cursor: pointer;
}

.table__cell + .table__cell {
    border-left: 1px solid #E6E6E6;
}

.table__cell {
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 12px;
    padding-right: 12px;
}

.table__cell:first-child {
    padding-left: 12px;
}

.table__cell:last-child {
    padding-right: 12px;
}



.table__i + .table__i {
    margin-top: 10px;
}

.table--red {
    color: #E20015;
}

.popup-table__body {
    height: 100%;
    overflow: auto;
    overflow-x: hidden;
    width: 100%;
}

.section-model {
    padding: 5rem 0 4rem;
    .key-block {
        display: inline-block;
        .t-text {
            max-width: 280px;
            @media (max-width: 720px) {
                max-width: 100%;
            }
        }
    }
    .fridges-wrapper {
        width: 100%;
        overflow: hidden;
    }
    .fridges {
        width: 100%;
        margin-top: -20%;
    }
    .freez {
        width: 38%;
        height: 30vw;
        position: relative;
        right: 3vw;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 70px;
        min-width: 125px;
        min-height: 470px;
        -webkit-background-size:;
        background-size: contain;
        background-position: bottom;
        background-repeat: no-repeat;
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
        -webkit-transition-property: background;
        -moz-transition-property: background;
        -o-transition-property: background;
        -ms-transition-property: background;
        transition-property: background;
        @media (max-width: 720px) {
            right: 0;
        }
    }
    .freez-s4-1 {
        background-image: url('../assets/s4-3.png');

    }
    .freez-s4-2 {
        background-image: url('../assets/s4-2.jpg');
    }
    .freez-s4-3 {
        background-image: url('../assets/s4-1.jpg');
    }
    .freez-s6-1 {
        background-image: url('../assets/s6-3.jpg');
    }
    .freez-s6-2 {
        background-image: url('../assets/s6-1.jpg');
    }
    .freez-s6-3 {
        /*background-image: url('../assets/s6-1.jpg');*/
        background-image: url('../assets/s6-2.png');


    }
    .models {

        margin-top: -40px;
        display: inline-block;
        z-index: 2;
        vertical-align: top;
        box-sizing: border-box;
        position: relative;
        text-align: right;
        padding-right: 15px;
        width: 100%;
        @media (max-width: 720px) {
            margin-top: 55px;
            width: 100%;
        }

        .t-title {
            font-size: 1.5rem;
            margin-right:60px;

            @media (max-width: 720px) {
                margin-right: 0;
            }
        }
        .model {
            text-align: center;
            display: inline-block;
            width: 100%;
            position: relative;
            padding: 1%;
            box-sizing: border-box;

            @media (max-width: 720px) {
                width: 100%;
                padding:2rem 1rem 0;
                display: none;
            }
        }
        .model__active{
            @media (max-width: 720px) {
                display: block;
            }
        }
    }
    .table--pc {
        @media (max-width: 720px) {

            display: none;
        }
    }
    .table--mobile {
        @media (min-width: 720px) {
            display: none;
        }
    }
    .table__chouser:before {
        content: '';
        width: 15px;
        height: 1px;
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        margin-top: auto;
        margin-bottom: auto;
        background-color: #000000;
    }
    .table__chouser:after {
        content: '';
        width: 1px;
        height: 15px;
        position: absolute;
        right: 7px;
        top: 0;
        bottom: 0;
        margin-top: auto;
        margin-bottom: auto;
        background-color: #000000;
    }
    .table__chouser--active:after {
        display: none;
    }

    .table__chouser + .table {
        display: none;
    }
    .table__chouser--active + .table {
        display: table;
    }
    @media (max-width: 720px) {

        padding: 4rem 0 0;

        .key-block {
            padding: 2rem 1rem 0;
            position: relative;
            display: inline-block;
            vertical-align: top;
        }
        .fridges {
            width: 200%;
            margin-left: -75%;
        }
        .models {
            
            /*flex-wrap: wrap;*/
            .model {
                flex-basis: 100%;
            }
        }

    }
    .fridges-bg {
        background-image: url('../assets/models_bg.png');
        background-repeat: no-repeat;
        margin-left: auto;
        margin-right: auto;
        background-position: 50% bottom;
        -webkit-background-size:;
        background-size: contain;
        min-height: 51vw;
        position: relative;
        &:before{
            @media (max-width: 720px) {
                content: '';
                height: 55%;
                width: 100%;
                position: absolute;
                bottom: 7%;
                left: 0;
                right: 0;
                background-image: url('../assets/models_bg_mobile.png');
                background-size: cover;
            }
            @media (max-width: 500px) {
                height: 50%;
                bottom: 7%;
            }
            @media (max-width: 500px) {
                height: 40%;
                bottom: 10%;
            }

        }
        @media (max-width: 720px) {
            background-image: none!important;
            background: none;
        }
    }
    .fridges-flower__wrap {
        width: 100%;
        position: relative;
        height: 100%;
    }
    .fridges-flower {
        background-image: url('../assets/models_flower.png');
        width: 30%;
        height: 45%;
        -webkit-background-size:;
        background-size: contain;
        position: absolute;
        left: -4%;
        bottom: 30%;
        background-repeat: no-repeat;
        @media (max-width: 720px) {
            display: none;
        }
    }
    .models_container {
        z-index: 3;
        position: relative;
        margin-top: 3rem;
        white-space: normal;
        @media (max-width: 720px) {
            width: 100%;
        }
    }
    .model__btn {
        position: absolute;
        top: 5rem;
        right: 40%;
        @media (max-width: 720px) {
            right: 15vw;
        }
    }
    .model__btn__i {
        border: 1px solid transparent;
        padding: 4px;
        position: relative;
        cursor: pointer;
        margin-bottom: 8px;
        width: 32px;
        height: 32px;
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
        -webkit-transition-property: border;
        -moz-transition-property: border;
        -o-transition-property: border;
        -ms-transition-property: border;
        transition-property: border;
    }
    .model__btn__i:hover {
        border-color: #C6C7C9;
    }
    .model__btn__i--active {
        border-color: #C6C7C9;
        cursor: pointer;
    }
    .model__btn__i:before {
        content: '';
        width: 24px;
        height: 24px;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
    }
    .model__btn__i-0:before {
        background-image: url('../assets/box-3.png');
    }
    .model__btn__i-1:before {
        background-image: url('../assets/box-1.png');
    }
    .model__btn__i-2:before {
        background-image: url('../assets/box-2.png');
    }
    .model__link {
        color: #78BE20;
        cursor: pointer;
        display: inline-block;
        margin-right:60px;
        @media (max-width: 720px) {
            margin: 0;
        }
    }
}
</style>
