<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b">
            <div class="mt-6 text-gray-500" id="mapContainer">
            </div>
        </div>
    </div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";

export default {
    name: "Map",
    data(){
        return{
            center: [-6.9, 112.06]
        }
    },
    methods: {
        setupLeafletMap: function () {
            const mapDiv = L.map("mapContainer").setView([parseFloat(this.center[0]), parseFloat(this.center[1])], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mapDiv);
        },
    },
    mounted() {
        this.setupLeafletMap();
    },
}
</script>
<style scoped>
#mapContainer {
    width: 50vw;
    height: 80vh;
}
</style>
