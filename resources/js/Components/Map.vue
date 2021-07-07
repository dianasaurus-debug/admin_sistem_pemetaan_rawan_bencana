<template>
    <div>
        <div class="w-full" id="mapContainer">
        </div>
    </div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
export default {
    name: "Map",
    props : ['desa','kecamatan', 'chosen_peta'],
    data(){
        return{
            center: [-7.1524786, 111.8869293],
            costumIcon : L.icon({
                iconUrl: '/images/vendor/leaflet/dist/marker-icon.png',
            })
        }
    },
    methods: {
        setupLeafletMap: function () {
            const mapDiv = L.map("mapContainer").setView([parseFloat(this.center[0]), parseFloat(this.center[1])], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mapDiv);
            if(this.chosen_peta==''||this.chosen_peta==null||this.chosen_peta==1){
                this.kecamatan.forEach(kecamatan=>{
                    L.marker([parseFloat(kecamatan.kec_latitude), parseFloat(kecamatan.kec_longitude)], {icon : this.costumIcon}).addTo(mapDiv)
                        .bindPopup(`${kecamatan.kec_nama}`);

                })
            } else if(this.chosen_peta==2){
                this.desa.forEach(desa=>{
                    L.marker([parseFloat(desa.kel_latitude), parseFloat(desa.kel_longitude)], {icon : this.costumIcon}).addTo(mapDiv)
                        .bindPopup(`${desa.kel_nama}`);

                })
            }

        },
    },
    mounted() {
        this.setupLeafletMap();
    },
}
</script>
<style scoped>
#mapContainer {
    width: 75vw;
    height: 80vh;
    z-index: 10;
}
</style>
