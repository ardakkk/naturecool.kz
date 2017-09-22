<script>
    import API from '../api'
    const GoogleMapKey = 'AIzaSyAsN6-Ls6gxrDhZLupi7T1Np8TddoVjAYA';
    let Geocoder = {};
    function onMapLoaded() {
        Geocoder = new google.maps.Geocoder();
        this.map = new google.maps.Map(document.getElementById('map-container'), {
            center: {lat: 43.2371616, lng: 76.8911731},
            zoom: 14,
            disableDefaultUI: true,
            scrollwheel:  false,
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            styles: [
                {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [
                        { visibility: "off" }
                    ]
                }
            ]
        });
        let askGeoOnce = true,
            handleAsk = _=>{
                if (askGeoOnce){
                    askGeoOnce = false;
                    askGeo(pos=>{
                        this.map.setCenter(pos)
                    });
                }
            };
        this.map.addListener('click', handleAsk);
        this.map.addListener('drag', handleAsk);
        this.map.addListener('bounds_changed', e => {
            let bounds = this.map.getBounds(), ne = bounds.getNorthEast(), sw = bounds.getSouthWest(),
                center = this.map.getCenter();
            this.center = {lat: center.lat(), lng: center.lng()};
            this.bounds = {
                ne: {lat: ne.lat(), lng: ne.lng()},
                sw: {lat: sw.lat(), lng: sw.lng()}
            };

            this.updateShopsInArea()
        });

        this.infowindow = new google.maps.InfoWindow({
            content: '',
            pixelOffset: {width: 160, height: 60}
        });

    }
    let firstShopsRequest = true;
    function initShop(shop){
        shop.marker = new google.maps.Marker({
            position: {lat: shop.geometry.coordinates[1], lng: shop.geometry.coordinates[0]},
            map: this.map,
            title: shop.name,
            id: shop.id,
            icon: {
                size: new google.maps.Size(25,25),
                url: require('../assets/marker2.png')
            }
        });
        shop.marker.addListener('click', _ => {
            this.infowindow.setContent(`<div class="marker-popup">
                            <div class="marker-popup__title">${shop.name}</div>
                            <div class="marker-popup__text">${shop.street}</div>
                            <div class="marker-popup__text">${shop.tel}</div>
                            <a target="_blank" class="marker-popup__url" href="${shop.url_real}">${shop.url}</a>
                        </div>`);
            this.infowindow.open(this.map, shop.marker);
            let iw = document.getElementsByClassName('gm-style-iw');
            if (iw.length){
                let childNodes = iw[0].parentElement.childNodes;
                for (let i = 0; i < childNodes.length; i++){
                    if (!childNodes[i].classList.length) {
                        childNodes[i].remove();
                    }
                }
            }
            this.infowindow.setOptions({
                pixelOffset: {width: (iw[0].clientWidth) / 2, height: 48}
            })
        });
    }
    function requestShopsInArea(){
        API.shops.area(this.bounds).then(data => {
            data.forEach(item => item.id = item.geometry.coordinates.join(','));
            let ids = this.shops.map(shop => shop.id),
                newShops = data.filter(item => !~ids.indexOf(item.id));

            newShops.forEach(initShop);
            this.shops = this.shops.concat(newShops);
            if(firstShopsRequest){
                firstShopsRequest = false;
                let rndShop = Math.floor(Math.random()*this.shops.length);
                google.maps.event.trigger(this.shops[rndShop].marker, 'click');
            }
        });
    }
    function debouncify(fnc, timeout = 500){
        let timeoutId = 0;
        return (...params) => {
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            timeoutId = setTimeout(_ => {
                timeoutId = 0;
                fnc(...params)
            }, timeout);
        }
    }
    function askGeo(callback){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                callback({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                });
            }, function() {
                console.log('geolocation access is not confirmed')
            });
        } else {
            console.log('geolocation is not supported')
        }
    }
    function requestShopsByNameOrAddress(){
        if (this.searchValue.length < 3) return;

        this.checkIfShop(this.searchValue)
            .then(
                isShop => {
                    let {lat, lng} = this.center;
                    API.shops.closest({lat,lng,query: this.searchValue}).then(data => {
                        if (data.length) travelToShop(data[0])
                    });
                },
                isNotShop => {
                    Geocoder.geocode({address: this.searchValue}, function(res){
                        if (res.length){
                            let {location} = res[0].geometry,
                                lat = location.lat(),
                                lng = location.lng();
                            API.shops.closest({lat,lng}).then(data => {
                                if (data.length) travelToShop(data[0])
                            });
                        }
                    })
                });


        let travelToShop = shop => {
            console.warn('pan to shop:', shop);
            let {coordinates} = shop.geometry;
            this.map.panTo({lat: coordinates[1], lng: coordinates[0]});
            initShop(shop);
            google.maps.event.trigger(shop.marker, 'click');
        }
    }
    export default {
        data(){return{
            map: false,
            bounds: {},
            center: {},
            shops: [],
            infoWindow: {},
            searchValue: '',
            shopNames: []
        }},
        watch: {
            searchValue(){
                this.requestShopsByNameOrAddress();
            }
        },
        methods: {
            updateShopsInArea(){},
            requestShopsByNameOrAddress(){},
            checkIfShop(name){
                let findShop = name =>
                    name.length < 3 ?
                        Promise.reject() :
                        (_=>{
                            let shopName = this.shopNames.find(shopName => ~shopName.indexOf(name.toLowerCase()));
                            return shopName ? Promise.resolve(shopName) : Promise.reject()
                        })();

                if (!this.shopNames.length)
                    return API.shops.names()
                        .then(data => this.shopNames = data)
                        .then(_ => findShop(name));
                else return Promise.resolve(findShop(name));
            }
        },
        mounted(){
            initShop = initShop.bind(this);
            this.updateShopsInArea = debouncify(requestShopsInArea.bind(this));
            this.requestShopsByNameOrAddress = debouncify(requestShopsByNameOrAddress.bind(this),1000);
            window.onMapLoaded = onMapLoaded.bind(this);
            if (!document.querySelector('script[src^="https://maps.googleapis.com/maps/api/js"]'))
                setTimeout(_=>{
                    let script = document.createElement('script');
                    script.src = `https://maps.googleapis.com/maps/api/js?key=${GoogleMapKey}&callback=onMapLoaded`;
                    document.body.appendChild(script);
                }, 1000);
            else{
                window.onMapLoaded();
            }
        }
    }
</script>
<template>
    <div id="map" class="section-map">
        <div id="map-container"></div>
        <div class="map-ui">
            <div class="t-title">Где купить</div>
            <div class="search">
                <input type="text" placeholder="Найти по названию или адресу" v-model="searchValue">
                <div class="icon icon-search"></div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
    .section-map{
        position: relative;
        height: 90vh;
        min-height: 560px;
        overflow: hidden;

        #map-container{
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: -25px;
        }
        .map-ui{
            position: absolute;
            left: 0;
            top: 0;
            padding: 3rem 0 0 10vw;
            .search{
                display: flex;
                width: 330px;
                max-width: 90vw;
                background: white;
                align-items: center;
                input{
                    flex-grow: 1;
                    padding: 1rem;
                    /*box-shadow: 3px 2px 16px 3px rgba(0,0,0,.16);*/

                    &::-webkit-input-placeholder{
                        color: #BFC0C2;
                        font-weight: 100;
                    }
                }
                .icon{
                    width: 1rem;
                    height: 1rem;
                    margin: 1rem;
                }
            }
        }
        @media (max-width: 720px){
            .map-ui{
                padding: 2rem 0 0 1rem;
            }
            input{
                font-size: .85rem;
            }
        }
    }
</style>
