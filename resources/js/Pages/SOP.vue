<template>
    <inertia-head>
        <title>Data SOP Bencana {{ jenisBencana.judul}}</title>
    </inertia-head>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                SOP Bencana {{ jenisBencana.judul}}
            </h2>
        </template>
        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <select class="w-1/3 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4" v-model="chosenBencana">
                        <option class="py-1" v-for="bencana in dataJenisBencana"  v-bind:value="bencana.idBencana">{{bencana.judulBencana}}</option>
                    </select>
                    <div class="grid grid-cols-3 gap-4">
                    <div>
                        <p class="flex">
                            <a @click="showCollapsePra=!showCollapsePra" class="text-gray-200 hover:text-black cursor-pointer" style="color : #eab543">
                                Pra Bencana <i class="fas fa-caret-down"></i>
                            </a>
                        </p>
                        <div v-show="showCollapsePra" v-for="detail_sop in jenisBencana.dataBencana[0].detail_sop">
                            <div class="border-b py-2 text-gray-700">{{detail_sop.tindakan}}</div>
                        </div>
                    </div>
                    <div>
                        <p class="flex">
                            <a @click="showCollapseSaat=!showCollapseSaat" class="text-gray-200 hover:text-black cursor-pointer" style="color : #eab543">
                                Saat Bencana <i class="fas fa-caret-down"></i>
                            </a>
                        </p>
                        <div v-show="showCollapseSaat" v-for="detail_sop in jenisBencana.dataBencana[1].detail_sop">
                            <div class="border-b py-2 text-gray-700">{{detail_sop.tindakan}}</div>
                        </div>
                    </div>
                    <div>
                        <p class="flex">
                            <a @click="showCollapsePasca=!showCollapsePasca" class="text-gray-200 hover:text-black cursor-pointer" style="color : #eab543">
                                Pasca Bencana <i class="fas fa-caret-down"></i>
                            </a>
                        </p>
                        <div v-show="showCollapsePasca" v-for="detail_sop in jenisBencana.dataBencana[2].detail_sop">
                            <div class="border-b py-2 text-gray-700">{{detail_sop.tindakan}}</div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '../Layouts/AppLayout'

export default {
    name  : "SOP",
    components: {
        AppLayout,
    },
    props: ['sopbencana_banjir', 'sopbencana_longsor', 'sopbencana_kekeringan', 'sopbencana_puting_beliung', 'errors'],
    data() {
        return  {
            showCollapsePra : true,
            showCollapseSaat : true,
            showCollapsePasca : true,
            chosenJudulBencana : 'Banjir',
            dataJenisBencana :[
                {
                    idBencana: 0,
                    judulBencana: 'Banjir'
                },
                {
                    idBencana: 1,
                    judulBencana: 'Kekeringan'
                },
                {
                    idBencana: 2,
                    judulBencana: 'Tanah Longsor'
                },
                {
                    idBencana: 3,
                    judulBencana: 'Puting Beliung'
                },

            ],
            chosenBencana : 0
        }
    },
    computed : {
      jenisBencana(){
          if(this.chosenBencana==0){
              return {
                  judul : 'Banjir',
                  dataBencana : this.sopbencana_banjir
              };
          } else if(this.chosenBencana==1){
              return {
                  judul : 'Kekeringan',
                  dataBencana : this.sopbencana_kekeringan
              };
          } else if(this.chosenBencana==2){
              return {
                  judul : 'Tanah Longsor',
                  dataBencana : this.sopbencana_longsor
              };
          } else if(this.chosenBencana==3){
              return {
                  judul : 'Puting Beliung',
                  dataBencana : this.sopbencana_puting_beliung
              };
          }
      },

    },
}
</script>
