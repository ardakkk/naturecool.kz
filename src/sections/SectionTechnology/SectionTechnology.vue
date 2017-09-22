<script>
    import InfoTip from '../../components/InfoTip/InfoTip.vue';
    import CButton from '../../components/Button/Button.vue'
    import VueScrollTo from 'vue-scrollto';
    import "./sectionTechnology.scss";
    export default {
        components: {
            InfoTip,
            CButton,
        },
        data(){return{
            slides: [
                {
                    id: 0,
                    title: `Естественная свежесть.`,
                    text: `Охлаждение в холодильниках NatureCool осуществляется без принудительной циркуляции воздуха, напрямую от испарителя, который находится за пределами холодильной и морозильной камер.<br>Это сохраняет естественную влажность внутри холодильника, что, в свою очередь, создает оптимальные условия для сохранения свежести продуктов и предохраняет их от высушивания.<br>Внутри морозильного отделения нет металлических элементов, а испаритель встроен в стенки камеры. Теплый и влажный воздух не контактирует с испарителем, поэтому на внутренних поверхностях не образуется лед*.`,
                    footer: `* При соблюдении рекомендаций производителя в инструкции по эксплуатации.`
                },{
                    id: 1,
                    title: `Самый большой объем.`,
                    text: `Холодильники NatureCool обладают самым большим холодильным отделением (257 л) среди двухметровый метровых холодильников с морозильным отделением свыше 90 литров. Это позволяет сохранить свежими еще большее количество продуктов! <br/>В холодильном отделении имеется ящик для овощей и фруктов с регулятором влажности VitaFresh объемом 26 литров. <br/>Больше 2-х ведер овощей и фруктов свободно поместятся  в этом специализированном отделении и останутся свежими и сочными! <br/>
`,
                },{
                    id: 2,
                    title: `Оптимальная организация пространства.`,
                    text: `Благодаря системе VarioXL, разработанной специально для России, в холодильниках NatureCool вы всегда сможете оптимальным образом организовать пространство:<br>- Расположение полок оптимально подобрано с учетом размеров упаковок продуктов, популярных в России; полки легко переставляются по высоте.<br>- Дополнительные аксессуары увеличивают полезную площадь холодильника и дают возможность размещения большого количества продуктов.<br>- Специальные скользящие вставки на дне отделения VitaFresh обеспечивают его легкое выдвижение и удобный доступ к овощам и фруктам, даже при полной загрузке.<br>`,
                },{
                    id: 3,
                    title: `Немецкие стандарты качества.`,
                    text: `Холодильники NatureCool разработаны в Германии, производятся в соответствии с немецкими стандартами качества и поддерживаются дополнительной 10-летней гарантией на компрессор. В процессе производства холодильники NatureCool проходят целый ряд испытаний и тестов в заводских лабораториях. Срок службы холодильника составляет 10 лет.`,
                },{
                    id: 4,
                    title: `Тишина в доме: с холодильниками NatureCool это легко.`,
                    text: `Холодильники NatureCool наиболее тихие в своем ценовом сегменте: их уровень шума составляет всего 38 дБ, что сравнимо с уровнем шепота. Холодильники NatureCool не нарушат тишину и комфорт вашего дома.`,
                },{
                    id: 5,
                    title: `Продукты в ярком свете.`,
                    text: ` Холодильники NatureCool оснащены современной системой освещения TwinLED: в каждом источнике освещения встроены 2 светодиодные лампы, поэтому холодильное  отделение освещается ярко и равномерно.`,
                },{
                    id: 6,
                    title: `Идеальное расположение в кухонном пространстве: PerfectFit.`,
                    text: `Дверца холодильника открывается на 90 градусов, не требуя дополнительного пространства, при этом все ящики, находящиеся внутри, легко вынимаются.<br>Система идеального расположения PerfectFit сохраняет драгоценное место на небольших кухнях. Например, дополнительные 10 см могут оказаться тем самым пространством, которого не хватало для установки целой секции шириной 45 или 60 см.<br>`,
                },
            ],
            features: [
//                {
//                id: 1,
//                top: 22,
//                left: 30,
//                icon: 'silence',
//                title: 'Самый большой объем.',
//                text: `Холодильники NatureCool обладают самым большим холодильным отделением (257 л) среди 2-х метровых холодильников с морозильным отделением свыше 90 литров. Это позволяет сохранить свежими еще большее количество продуктов!
//                В холодильном отделении имеется ящик для овощей и фруктов с регулятором влажности VitaFresh объемом 26 литров.
//                    Больше 2-х ведер овощей и фруктов свободно поместятся  в этом специализированном отделении и останутся свежими и сочными!
//                    `
//            },
             {
                id: 3,
                top: 26,
                heightPopup: 128,
                left: 15,
                icon: require('../../assets/t-light.png'),
                title: 'Продукты в ярком свете',
                text: `Яркое и равномерное освещение холодильной камеры в течение всего срока службы прибора благодаря двум светодиодам TWIN LED.`
            }, {
                id: 4,
                top: 40,
                left: 20,
                icon: require('../../assets/t-optimal.png'),
                title: 'Оптимальная организация пространства',
                text: `Больше места в холодильнике благодаря системе VarioXL: регулируемое по высоте расположение полок и дополнительные аксессуары позволят оптимально разместить и хранить продукты.`
            }, {
                id: 5,
                top: 48,
                left: 26.5,
                icon: require('../../assets/t-standards.png'),
                title: 'Немецкие стандарты качества',
                text: `Немецкие стандарты качества: надежные холодильники NatureCool, разработанные в Германии, имеют  дополнительную гарантию на компрессор сроком 10 лет*.`
            },{
                id: 6,
                top: 54,
                left: 15,
                icon: require('../../assets/t-fresh.png'),
                title: 'Естественная свежесть',
                text: `Естественная свежесть продуктов: технология NatureCool поддерживает оптимальный уровень влажности в холодильнике, сохраняя натуральную свежесть продуктов.`
            },{
                id: 7,
                top: 71,
                left: 19,
                icon: require('../../assets/t-silence.png'),
                title: 'Тишина в доме',
                text: 'Сохранение тишины в доме: благодаря отсутствию принудительной вентиляции и разморозки, холодильник с технологией NatureCool работает тихо.'
            },{
                id: 8,
                top: 75,
                left: 7,
                icon: require('../../assets/t-placement.png'),
                title: 'PerfectFit',
                text: `PerfectFit позволяет идеально расположить холодильник в вашем кухонном пространстве благодаря следующим особенностям:
                    </br>
                    <ol>
                        <li> возможность установки на кухне вплотную к мебели, без зазоров сзади и сбоку;</li>
                        <li>двери холодильника открываются на 90 градусов, не требуя дополнительного пространства.</li>

                     </ol>`
            },{
                id: 9,
                top: 26,
                heightPopup: 128,
                left: 30,
                icon: require('../../assets/t-displaypng.png'),
                title: 'Внешний дисплей',
                text: `Удобное управление настройками холодильной и морозильной камер без необходимости открывать холодильник`
            }],
            activePopup: false,
            activeSlide: true,
            active_slide_index : 0
        }},
        methods:{
            goModels(){
                this.$router.push('/technology#model');
            },
            setPopupActive(id){
                this.activePopup = this.features.find(feature => feature.id === id);
            },
            closePopup(){
                this.activePopup = false
            },
            navToModels(destination = 'model'){
                if (document.getElementById(destination)){
                    VueScrollTo.scrollTo(document.getElementById(destination));
                }else{
                    this.$router.push({name: 'technology'});
                    console.log(destination);
                    if (!~destination.indexOf('Page')) setTimeout(_=>VueScrollTo.scrollTo(document.getElementById(destination)),100)
                }
            },
            handleClickOutside (e) {
                if (this.activePopup === false) return false;
                const specifiedElement = document.getElementsByClassName("popup");

                if (!specifiedElement[0].contains(event.target) && !event.target.classList.contains("feature")) {
                    this.closePopup();
                }
            },
        },
        created () {
            window.addEventListener('click', this.handleClickOutside);
        },
        destroyed () {
            window.removeEventListener('click', this.handleClickOutside);
        }
    }
</script>
<template>
    <div id="technology" class="section-technology">
        <div class="key-block">
            <div class="t-title">Технология <b>Nature</b>Cool.</div>
            <div class="t-text">Технология <b>Nature</b>Cool сохраняет естественную свежесть, вкус и аромат продуктов благодаря оптимальному уровню влажности.</div>

           <div class="carousel">
                <div class="carousel__block" >
                    <div class="carousel__block__arrow carousel__block__arrow--left" v-on:click="active_slide_index = (active_slide_index - 1 >= 0 ? active_slide_index - 1 : slides.length - 1)">
                        <svg width="11px" height="18px" viewBox="0 0 11 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <image id="icons8-left_4" x="-5" y="-3" width="24" height="24" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABGdBTUEAA1teXP8meAAAANZJREFUaAXtmUEOwjAMBCuOFb/jJ/ygAolf8BMufAwcwV56c4gpKyZSlEvi7o59cJppYkAAAhD4NwKHMLxzNX0O4Y+YV0cTl7f4ZqDNY0ybIfISfw/lexf1iN8qU5CHfAcByqYD2pAjkB+CsSMI5DugDTliTX7dVd4CyTwEyxeCLPENdZRt3byrtL0ZfZIs6xKS8dOvlZKEZVZMZGhV7iUTlXQzsclEhlblXjJRSTcTm0xkaFXuJROVdDOx112s1e91GVU5WT5wyIT1E5NMsEIAAhB4EXgC6q6Juc4U3+IAAAAASUVORK5CYII="></image>
                            </g>
                        </svg>
                    </div>
                    <div v-on:click="active_slide_index = (active_slide_index + 1 < slides.length ? active_slide_index + 1 : 0)" class="carousel__block__arrow carousel__block__arrow--right">
                        <svg width="11px" height="18px" viewBox="0 0 11 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs></defs>
                            <g id="Mobile" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="mobile/second" transform="translate(-210.000000, -3280.000000)">
                                    <image id="icons8-right_4" x="202" y="3277" width="24" height="24" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABGdBTUEAA1teXP8meAAAAMxJREFUaAXtmTEOgzAMRaFjr9eb9AadGMrey8DZWltKJIQ6FMdC/dGL5IHBxv99RwpkGFgQgAAEeiFwMSE3VTGjNf6yeFvMiiLupXkX4DGpibhaw0tpvoqQcwIR/zJ2OIETiQQYp0SYTaVwoglfYjJOJMJsKtWNE6thqIe/bk6xjyPe+lcUK0jA94HsCH3bxM8giNPTaP505OWFkId8gABjE4CWkgL5FIyBIpAPQEtJkSbvBOR/r28vOGROlfvZk75i2ovhGQIQgMBvBD7y6YmxTdGfhQAAAABJRU5ErkJggg=="></image>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="carousel__content">
                        <div class="carousel__content__i" v-for="slide in slides" v-bind:style="{left: (-1*active_slide_index*100+'%')}">

                            <h2 >{{slide.title}}</h2>
                            <p v-html="slide.text"></p>
                            <p v-if="slide.footer" class="slide__footer">{{slide.footer}}</p>
                        </div>
                    <!--<h2 >{{slides[active_slide_index].title}}</h2>-->
                    <!--<p v-html="slides[active_slide_index].text"></p>-->
                    </div>
                </div>
               <div class="carousel__mobile">
                   <svg v-on:click="active_slide_index = (active_slide_index - 1 >= 0 ? active_slide_index - 1 : slides.length - 1)" class="carousel__mobile__arrow carousel__mobile__i" width="11px" height="18px" viewBox="0 0 11 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                       <defs></defs>
                       <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <image id="icons8-left_4" x="-5" y="-3" width="24" height="24" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABGdBTUEAA1teXP8meAAAANZJREFUaAXtmUEOwjAMBCuOFb/jJ/ygAolf8BMufAwcwV56c4gpKyZSlEvi7o59cJppYkAAAhD4NwKHMLxzNX0O4Y+YV0cTl7f4ZqDNY0ybIfISfw/lexf1iN8qU5CHfAcByqYD2pAjkB+CsSMI5DugDTliTX7dVd4CyTwEyxeCLPENdZRt3byrtL0ZfZIs6xKS8dOvlZKEZVZMZGhV7iUTlXQzsclEhlblXjJRSTcTm0xkaFXuJROVdDOx112s1e91GVU5WT5wyIT1E5NMsEIAAhB4EXgC6q6Juc4U3+IAAAAASUVORK5CYII="></image>
                       </g>
                   </svg>
                    <span class="carousel__mobile__text">{{active_slide_index+1}} / {{slides.length}}</span>
                   <svg v-on:click="active_slide_index = (active_slide_index + 1 < slides.length ? active_slide_index + 1 : 0)" class="carousel__mobile__arrow carousel__mobile__i" width="11px" height="18px" viewBox="0 0 11 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                       <defs></defs>
                       <g id="Mobile" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <g id="mobile/second" transform="translate(-210.000000, -3280.000000)">
                               <image id="icons8-right_4" x="202" y="3277" width="24" height="24" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABGdBTUEAA1teXP8meAAAAMxJREFUaAXtmTEOgzAMRaFjr9eb9AadGMrey8DZWltKJIQ6FMdC/dGL5IHBxv99RwpkGFgQgAAEeiFwMSE3VTGjNf6yeFvMiiLupXkX4DGpibhaw0tpvoqQcwIR/zJ2OIETiQQYp0SYTaVwoglfYjJOJMJsKtWNE6thqIe/bk6xjyPe+lcUK0jA94HsCH3bxM8giNPTaP505OWFkId8gABjE4CWkgL5FIyBIpAPQEtJkSbvBOR/r28vOGROlfvZk75i2ovhGQIQgMBvBD7y6YmxTdGfhQAAAABJRU5ErkJggg=="></image>
                           </g>
                       </g>
                   </svg>
               </div>
                <ul class="carousel__pagination" >
                    <li v-bind:class="{carousel__pagination__i: true,'carousel__pagination__i--active':active_slide_index == index}" v-for="(slide,index) in slides" v-on:click="active_slide_index = index"></li>
                </ul>
               <div class="t-text">Узнайте о всех преимуществах новой линейки холодильников Bosch <b>Nature</b>Cool.</div>
               <button v-on:click="goModels"><span>Модели</span></button>
            </div>
        </div>
        <div class="interactive">
            <img class="bg" src="../../assets/technology_bg.jpg" alt="">
            <div class="feature" v-for="feature in features"
                 :class="{'active': feature.id === activePopup.id}"
                 @click="setPopupActive(feature.id)"
                 :style="{top: feature.top + '%', left: feature.left + '%'}"></div>
            <div class="popup" v-if="activePopup"
                 :style="{top: ((activePopup.heightPopup) ? 'calc(' + activePopup.top + '% + ' + activePopup.heightPopup + 'px)' : activePopup.top + '%'), left: (activePopup.left) + '%'}">
                <div class="icon" :class="`tech-icon-`" :style="{backgroundImage: `url(${activePopup.icon})`}"></div>
                <div class="content">
                    <div class="title">{{activePopup.title}}</div>
                    <div class="text" v-html="activePopup.text"></div>
                </div>
                <div class="close icon-close" @click="closePopup"></div>
            </div>
        </div>
        <InfoTip @click.native="navToModels()" v-show="$route.name !== 'technology'">Технические характеристики и модели</InfoTip>
    </div>
</template>
