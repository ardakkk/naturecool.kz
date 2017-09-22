<template>
    <div id="game" class="section-game">
        <template>
            <p class="t-title t-title--space-zero">Играйте в игру и получите<br><strong>промокод на скидку <span class="nowr">5 %</span>.</strong></p>
        </template>

        <div v-bind:class="{'game-layout':true,'game-layout--frame':this.currentUrl.search('/contest')>=0}">
            <div class="info-block">
                <div class="t-text">Станьте настоящим экспертом свежести: играйте в игру “Найди пару” от Bosch и получайте промокод на скидку при покупке холодильника Bosch <strong>Nature</strong>Cool.</div>
                <InfoTip type="question" :to="{name: 'rules'}">Подробнее о правилах</InfoTip>
                <div v-if="this.currentUrl.search('/contest') < 0" class="t-text">
                    <br/>
                   <!--  <a href="http://www.eldorado.ru/promo/prm-bosch-naturecool/" target="_blank">
                    <img src="../../assets/logo_eldorado.png" alt="Эльдорадо"/>
                    </a> -->
                    <a href="https://www.sulpak.kz/Stocks/Action/1811/novaya_linejka_holodilnikov_bosch_naturecool?cityName=almaty" target="_blank"><img class="sulpak" src="../../assets/logo-sulpak.png" alt="sulpak"></a>
                    <a href="https://www.technodom.kz/naturecool" target="_blank"><img class="technodom" src="../../assets/technodom_logo.png" alt="technodom"></a>
                </div>
                <div class="instruction">
                    <div class="t-title">Для получения бонусов</div>
                    <div class="rules">
                        <div class="rule">
                            <div class="rule-icon circled-icon-eye"></div>
                            <div class="rule-text">Запомните расположение всех парных карт</div>
                        </div>
                        <div class="rule">
                            <div class="rule-icon circled-icon-refresh"></div>
                            <div class="rule-text">Переворачивайте карточки и находите пары</div>
                        </div>
                        <div class="rule">
                            <div class="rule-icon circled-icon-puzzle"></div>
                            <div class="rule-text">Найдите все пары за 30 секунд и получите промокод</div>
                        </div>
                    </div>
                </div>
            </div>
            <Game ref="game"/>
        </div>
    </div>
</template>
<script>
    import Game from '../../components/Game/Game.vue';
    import CButton from '../../components/Button/Button.vue';
    import InfoTip from '../../components/InfoTip/InfoTip.vue';
    import "./sectiongame.scss";
    export default{
        components: {
            Game,
            CButton,
            InfoTip,
        },
        data(){return {
            currentUrl: window.location.href.toString().split(window.location.host)[1],
        }},

        methods:{
            startGame(){
                this.$refs.game.startGame();
            }
        }
    }
</script>
