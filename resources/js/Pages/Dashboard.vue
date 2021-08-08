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
                        'label' : 'Peta Rawan Longsor',
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
                        'label' : 'Peta Riwayat Longsor 2016',
                    },
                    {
                        'id' : 6,
                        'label' : 'Peta Riwayat Longsor 2017',
                    },
                    {
                        'id' : 7,
                        'label' : 'Peta Riwayat Longsor 2018',
                    },
                    {
                        'id' : 8,
                        'label' : 'Peta Riwayat Longsor 2019',
                    },
                    {
                        'id' : 9,
                        'label' : 'Peta Riwayat Longsor 2020',
                    },
                    {
                        'id' : 10,
                        'label' : 'Peta Riwayat Longsor 2021',
                    },
                ],
                dataJenisPeta : [],
                peta : 1,
                center: [-7.1524786, 111.8869293],
                costumIcon : L.icon({
                    iconUrl: '/images/vendor/leaflet/dist/marker-icon.png',
                }),
                dangerIcon : L.icon({
                    iconUrl: '/images/vendor/leaflet/dist/red-marker.png',
                    iconSize : [30,30]

                }),
                modIcon : L.icon({
                    iconUrl: '/images/vendor/leaflet/dist/orange-marker.png',
                    iconSize : [30,30]

                }),
                lowIcon : L.icon({
                    iconUrl: '/images/vendor/leaflet/dist/green-marker.png',
                    iconSize : [30,30]
                }),
                mapDiv : null,
                riwayat_bencana : [],
                    tahun2016 : [],
                    tahun2017 : [],
                    tahun2018 : [],
                    tahun2019 : [],
                    tahun2020 : [],
                    tahun2021 : [],
                rawan_longsor : [],
                data_gjson : null,

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
                }
                else if(this.peta==3){
                    this.rawan_longsor.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.desa,
                            'status' : data.status
                        })
                    })
                }
                else if(this.peta==4){
                    this.riwayat_bencana.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.desa
                        })
                    })
                }
                else if(this.peta==5){
                    this.tahun2016.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.desa
                        })
                    })
                }
                else if(this.peta==6){
                    this.tahun2017.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.desa
                        })
                    })
                }
                else if(this.peta==7){
                    this.tahun2018.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.desa
                        })
                    })
                }
                else if(this.peta==8){
                    this.tahun2019.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.desa
                        })
                    })
                }
                else if(this.peta==9){
                    this.tahun2020.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.desa
                        })
                    })
                }
                else if(this.peta==10){
                    this.tahun2021.forEach(data=>{
                        peta_array.push({
                            'latitude' : data.latitude,
                            'longitude' : data.longitude,
                            'label' : data.desa
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
            this.getAllRiwayatTahun();
            this.getAllRiwayat();
            this.getAllRawan();
            var k = 1;
            this.jenis_peta.forEach(jenis_peta => {
                this.dataJenisPeta.push({
                    value: k,
                    label: jenis_peta
                })
                k++;
            })

        },
        methods : {
            getAllRiwayat(){
                axios.get('/api/riwayat-bencana/longsor').then(result=>{
                    this.riwayat_bencana = result.data.riwayat_bencana;
                })
            },
            getAllRawan(){
                axios.get('/api/lokasi-rawan/longsor').then(result=>{
                    this.rawan_longsor = result.data.bencana_rawan;
                })
            },
            getAllRiwayatTahun(){
                axios.get(`/api/riwayat-bencana/2016/2`).then(result=>{
                    this.tahun2016 = result.data.riwayat_bencana;

                })
                axios.get(`/api/riwayat-bencana/2017/2`).then(result=>{
                    this.tahun2017 = result.data.riwayat_bencana;

                })
                axios.get(`/api/riwayat-bencana/2018/2`).then(result=>{
                    this.tahun2018 = result.data.riwayat_bencana;

                })
                axios.get(`/api/riwayat-bencana/2019/2`).then(result=>{
                    this.tahun2019 = result.data.riwayat_bencana;

                })
                axios.get(`/api/riwayat-bencana/2020/2`).then(result=>{
                    this.tahun2020 = result.data.riwayat_bencana;

                })
                axios.get(`/api/riwayat-bencana/2021/2`).then(result=>{
                    this.tahun2021 = result.data.riwayat_bencana;
                })
            },
            setupLeafletMap: function () {
                if(this.mapDiv){
                    this.mapDiv.remove();
                    this.mapDiv = new L.map("mapContainer").setView([parseFloat(this.center[0]), parseFloat(this.center[1])], 13);
                } else {
                    this.mapDiv = new L.map("mapContainer").setView([parseFloat(this.center[0]), parseFloat(this.center[1])], 13);
                }
                const data_daerah = [
                    {
                        daerah : "Mojodelik",
                        status : 1
                    },
                    {
                        daerah : "Gadon",
                        status : 2
                    },
                    {
                        daerah : "Ngloram",
                        status : 1
                    },
                    {
                        daerah : "Payaman",
                        status : 2
                    },
                    {
                        daerah : "Bendonglateng",
                        status : 1
                    },
                    {
                        daerah : "Jamprong",
                        status : 2
                    },
                    {
                        daerah : "Bancer",
                        status : 1
                    }
                ];
                /*Legend specific*/
                var legend = L.control({ position: "bottomleft" });

                legend.onAdd = function(map) {
                    var div = L.DomUtil.create("div", "legend");
                    div.innerHTML += "<h4>Tingkat Kerawanan Bencana</h4>";
                    div.innerHTML += '<i style="background: red"></i><span>Tinggi</span><br>';
                    div.innerHTML += '<i style="background: yellow"></i><span>Sedang</span><br>';
                    div.innerHTML += '<i style="background: green"></i><span>Rendah</span><br>';
                    return div;
                };
                L.geoJSON(this.data_gjson, {
                    style : {fillColor: 'green',
                        weight: 2,
                        opacity: 1,
                        color: 'white',  //Outline color
                        fillOpacity: 0.7},
                    onEachFeature: function(feature, layer) {
                        // layer.bindTooltip(feature.properties.NAMOBJ, {permanent:true,direction:'center', className: 'countryLabel',sticky: true});
                            data_daerah.forEach(data=>{
                                if(feature.properties.NAMOBJ==data.daerah){
                                    if(data.status==1){
                                        layer.setStyle({fillColor: 'yellow'})
                                        layer.bindPopup('<h3>Desa : '+feature.properties.NAMOBJ+'</h3><p>Status: <b class="text-warning">Sedang</b></p>');
                                    } else if(data.status==2){
                                        layer.setStyle({fillColor: 'red'})
                                        layer.bindPopup('<h3>Desa : '+feature.properties.NAMOBJ+'</h3><p>Status: <b>Tinggi</b></p>');
                                    } else {
                                        layer.bindPopup('<h3>Desa : '+feature.properties.NAMOBJ+'</h3><p>Status: <b>Rendah</b></p>');
                                    }
                                }
                        });
                    }
                }).addTo(this.mapDiv);
                legend.addTo(this.mapDiv);
                // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                // }).addTo(this.mapDiv);
                //
                // this.data_peta.forEach(data=>{
                //     if (data.status!=null) {
                //         if(data.status==0){
                //             L.marker([parseFloat(data.latitude), parseFloat(data.longitude)], {icon : this.lowIcon}).bindPopup(`${data.label} | Status Kerawanan Rendah`).addTo(this.mapDiv)
                //         } else if(data.status==1){
                //             L.marker([parseFloat(data.latitude), parseFloat(data.longitude)], {icon : this.modIcon}).bindPopup(`${data.label} | Status Kerawanan Sedang`).addTo(this.mapDiv)
                //         } else if(data.status==2){
                //             L.marker([parseFloat(data.latitude), parseFloat(data.longitude)], {icon : this.dangerIcon}).bindPopup(`${data.label} | Status Kerawanan Tinggi`).addTo(this.mapDiv)
                //         }
                //     } else {
                //         L.marker([parseFloat(data.latitude), parseFloat(data.longitude)], {icon : this.costumIcon}).bindPopup(`${data.label}`).addTo(this.mapDiv)
                //
                //     }
                // })
            },
        },
        async mounted() {
            const response = await fetch(window.location.origin+'/maps/wilayah_bojonegoro.json');
            this.data_gjson = await response.json();
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

/*Legend specific*/


</style>

