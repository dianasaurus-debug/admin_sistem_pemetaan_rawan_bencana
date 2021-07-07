<template>
    <inertia-head>
        <title>Dashboard</title>
    </inertia-head>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex mb-2">
                        <div class="flex-auto"><h5 class="font-bold my-3">Peta Bojonegoro</h5></div>
                        <div class="flex-auto">
                            <!--                                                <div v-if="$page.errors.kec_nama" class="text-red-500">{{ $page.errors.kec_nama[0] }}</div>-->
                            <Multiselect

                                        v-model="peta"
                                         :searchable="true"
                                         :options="dataJenisPeta"
                                         placeholder="Pilih Peta yang Ditampilkan" @change="setupLeafletMap"/>
                        </div>
                    </div>
                    <div class="w-full" id="mapContainer">
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import Welcome from '@/Jetstream/Welcome'
    import Map from '@/Components/Map'
    import Multiselect from '@vueform/multiselect'
    import AppLayout from "@/Layouts/AppLayout";
    import "leaflet/dist/leaflet.css";
    import L from "leaflet";
    export default {
        data() {
            return {
                jenis_peta : [
                    'Peta Kecamatan',
                    'Peta Desa',
                    'Peta Rawan Longsor',
                    'Peta Riwayat Longsor',
                    'Peta Riwayat Longsor 2015',
                    'Peta Riwayat Longsor 2016',
                    'Peta Riwayat Longsor 2018',
                    'Peta Riwayat Longsor 2019',
                    'Peta Riwayat Longsor 2020',
                ],
                dataJenisPeta : [],
                peta : 1,
                center: [-7.1524786, 111.8869293],
                costumIcon : L.icon({
                    iconUrl: '/images/vendor/leaflet/dist/marker-icon.png',
                }),
                mapDiv : ''
            }
        },
        props: ['kecamatan', 'desa', 'errors'],
        components: {
            Multiselect,
            AppLayout,
            Welcome,
            Map
        },
        computed : {
          chosen_peta(){
              return this.peta;
          }
        },
        created() {
            var k = 1;
            this.jenis_peta.forEach(jenis_peta => {
                this.dataJenisPeta.push({
                    value: k,
                    label: jenis_peta
                })
                k++;
            })
            console.log(this.jenis_peta);
        },
        methods : {
            setupLeafletMap: function () {
                if(this.mapDiv){
                    this.mapDiv.off();
                    this.mapDiv.remove();
                    this.mapDiv = new L.map("mapContainer").setView([parseFloat(this.center[0]), parseFloat(this.center[1])], 13);
                } else {
                    this.mapDiv = new L.map("mapContainer").setView([parseFloat(this.center[0]), parseFloat(this.center[1])], 13);
                }
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(this.mapDiv);
                if(this.chosen_peta==''||this.chosen_peta==null||this.chosen_peta==1){
                    this.kecamatan.forEach(kecamatan=>{
                        L.marker([parseFloat(kecamatan.kec_latitude), parseFloat(kecamatan.kec_longitude)], {icon : this.costumIcon}).addTo(this.mapDiv)
                            .bindPopup(`${kecamatan.kec_nama}`);

                    })
                } else if(this.chosen_peta==2){
                    this.desa.forEach(desa=>{
                        L.marker([parseFloat(desa.kel_latitude), parseFloat(desa.kel_longitude)], {icon : this.costumIcon}).addTo(this.mapDiv)
                            .bindPopup(`${desa.kel_nama}`);

                    })
                }

            },
        },
        mounted() {
            this.setupLeafletMap();
        }
    }
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style scoped>
#mapContainer {
    width: 75vw;
    height: 80vh;
    z-index: 10;
}
</style>

