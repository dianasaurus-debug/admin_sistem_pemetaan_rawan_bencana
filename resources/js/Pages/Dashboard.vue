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
                    <div class="flex justify-between mb-2">
                        <div><h5 class="font-bold my-3">Peta Bojonegoro</h5></div>
                        <div>
                            <!--                                                <div v-if="$page.errors.kec_nama" class="text-red-500">{{ $page.errors.kec_nama[0] }}</div>-->
<!--                            <Multiselect-->
<!--                                        v-model="peta"-->
<!--                                         :searchable="true"-->
<!--                                         :options="dataJenisPeta"-->
<!--                                         placeholder="Pilih Peta yang Ditampilkan" @change="setupLeafletMap"/>-->
                            <select v-model="peta" @change="setupLeafletMap">
                                <option v-for="data in jenis_peta" :value="data.id" >{{data.label}}</option>
                            </select>
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
    import axios from 'axios';
    export default {
        data() {
            return {
                jenis_peta : [
                    {
                        'id' : 1,
                        'label' : 'Peta Kecamatan',
                    },
                    {
                        'id' : 2,
                        'label' : 'Peta Desa',
                    },
                    {
                        'id' : 3,
                        'label' : 'Peta Rawan Longsor',
                    },
                    {
                        'id' : 4,
                        'label' : 'Peta Riwayat Longsor',
                    },
                    {
                        'id' : 5,
                        'label' : 'Peta Riwayat Longsor 2015',
                    },
                    {
                        'id' : 7,
                        'label' : 'Peta Riwayat Longsor 2016',
                    },
                    {
                        'id' : 8,
                        'label' : 'Peta Riwayat Longsor 2017',
                    },
                    {
                        'id' : 9,
                        'label' : 'Peta Riwayat Longsor 2018',
                    },
                    {
                        'id' : 10,
                        'label' : 'Peta Riwayat Longsor 2019',
                    },
                    {
                        'id' : 11,
                        'label' : 'Peta Riwayat Longsor 2020',
                    },
                ],
                dataJenisPeta : [],
                peta : 1,
                center: [-7.1524786, 111.8869293],
                costumIcon : L.icon({
                    iconUrl: '/images/vendor/leaflet/dist/marker-icon.png',
                }),
                mapDiv : null,
                riwayat_bencana : []
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
            data_peta(){
                let peta_array = [];
                if(this.peta==1){
                    this.kecamatan.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.kec_latitude,
                            'longitude' : data.kec_longitude,
                            'label' : data.kec_nama
                        })
                    })
                } else if(this.peta==2){
                    this.desa.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.kel_latitude,
                            'longitude' : data.kel_longitude,
                            'label' : data.kel_nama
                        })
                    })
                } else if(this.peta==4){
                    this.riwayat_bencana.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.kecamatan
                        })
                    })
                }
                return peta_array;
            },
          chosen_peta(){
              return this.peta;
          }
        },
        created() {
            this.getAllRiwayat();
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
            getAllRiwayat(){
                axios.get('/api/riwayat-bencana/longsor').then(result=>{
                    this.riwayat_bencana = result.data.riwayat_bencana;
                })
            },
            setupLeafletMap: function () {
                if(this.mapDiv){
                    this.mapDiv.remove();
                    this.mapDiv = new L.map("mapContainer").setView([parseFloat(this.center[0]), parseFloat(this.center[1])], 13);
                } else {
                    this.mapDiv = new L.map("mapContainer").setView([parseFloat(this.center[0]), parseFloat(this.center[1])], 13);
                }
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(this.mapDiv);
                this.data_peta.forEach(data=>{
                    L.marker([parseFloat(data.latitude), parseFloat(data.longitude)], {icon : this.costumIcon}).bindPopup(`${data.label}`).addTo(this.mapDiv)
                })
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

