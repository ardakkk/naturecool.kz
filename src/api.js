import axios from 'axios'

let base = '';
if (
    !~window.location.href.indexOf('naturecool.kz') &&
    !~window.location.href.indexOf('localhost')){
    base = 'http://naturecool.kz';
}
export default {
    shops:{
        area({ne,sw} = {}){
            if (!ne || !sw) return Promise.resolve([]);
            let lat_min = sw.lat,
                lon_min = sw.lng,
                lat_max = ne.lat,
                lon_max = ne.lng;
            if (lat_min === lat_max ||
                lon_min === lon_max) return;
            return axios.get(`${base}/api/map/shops_in_area?lat_min=${lat_min}&lon_min=${lon_min}&lat_max=${lat_max}&lon_max=${lon_max}`)
                .then(result => result.data)
        },
        closest({lat, lng, query} = {}){
            if (lat && lng){
                return axios.get(`${base}/api/map/closest_shops?lat=${lat}&lon=${lng}${query&&`&query=${query}`||''}`)
                    .then(result => result.data)
            }
            return Promise.resolve();

        },
        names(){
            return axios.get('/api/map/shop_names')
                .then(result => result.data)
        }
    },
    user: {
        create({email,name,phoneNumber}){
            phoneNumber = phoneNumber.replace(/ |\(|\)|-|\+/gi, "");
            return axios.get(`${base}/api/user/create?email=${email}&fullname=${name}&phone_number=${phoneNumber}`)
                .then(result => result.data)
        },
         callback({email,message}){
            return axios.get(`${base}/api/user/callback?email=${email}&message=${message}`)
                .then(result => result.data)
        },

    }
}
