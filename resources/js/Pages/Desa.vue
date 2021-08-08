<template>
    <inertia-head>
        <title>Data Desa/Kelurahan</title>
    </inertia-head>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Desa/Kelurahan
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex justify-between ...">
                        <div>
                            <button @click="openModal()"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Tambah Data
                            </button>
                        </div>
                        <div>
                            <button @click="clearSearch" v-if="isSearching"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">
                                Clear Search
                            </button>
                        </div>
                        <div>
                            <div class="pt-2 relative mx-auto text-gray-600">

                                <form @submit.prevent="searchData()">
                                    <input
                                        class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                        type="search" name="cari" placeholder="Search" v-model="query">
                                    <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                        <svg class="text-gray-600 h-4 w-4 fill-current"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                             x="0px" y="0px"
                                             viewBox="0 0 56.966 56.966"
                                             style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                             width="512px" height="512px">
                                        <path
                                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                                      </svg>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div v-if="desa.data.length>0">
                        <table class="table-fixed w-full">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Nama Kecamatan</th>
                                <th class="px-4 py-2">Nama Desa/Kelurahan</th>
                                <th class="px-4 py-2">Latitude</th>
                                <th class="px-4 py-2">Longitude</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(row, index) in desa.data">
                                <td class="border px-4 py-2">{{ index + 1 }}</td>
                                <td class="border px-4 py-2">{{ row.kecamatan.kec_nama }}</td>
                                <td class="border px-4 py-2">{{ row.kel_nama }}</td>
                                <td class="border px-4 py-2">{{ row.kel_longitude }}</td>
                                <td class="border px-4 py-2">{{ row.kel_latitude }}</td>
                                <td class="border px-4 py-2">
                                    <button @click="edit(row)"
                                            class="bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button @click="deleteRow(row)"
                                            class="bg-red-500 mr-2 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button @click="getStatusBencanaData(row.id)"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">
                                        Status
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination class="mt-6" :links="desa.links"/>
                    </div>
                    <div v-else>
                        <h5 class="text-gray-400 font-medium font-bold text-center"> Belum ada data</h5>
                    </div>

                    <div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                            <div class="fixed inset-0 transition-opacity">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <form>
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="">
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Nama
                                                    Kecamatan:</label>
                                                <!--                                                <div v-if="$page.errors.kec_nama" class="text-red-500">{{ $page.errors.kec_nama[0] }}</div>-->
                                                <Multiselect v-model="form.id_kecamatan"
                                                             :searchable="true"
                                                             :options="dataKecamatan"
                                                             placeholder="Pilih Kecamatan"/>
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Nama
                                                    Desas:</label>
                                                <input type="text"
                                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                       id="exampleFormControlInput1"
                                                       placeholder="Masukkan Nama Desa/Kelurahan"
                                                       v-model="form.kel_nama">
                                                <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Longitude:</label>
                                                <input type="text"
                                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                       id="exampleFormControlInput1"
                                                       placeholder="Masukkan koordinat longitude"
                                                       v-model="form.kel_longitude">
                                                <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput2"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Latitude:</label>
                                                <input
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput2" v-model="form.kel_latitude"
                                                    placeholder="Masukkan koordinat latitude">
                                                <!--                                                <div v-if="$page.errors.kec_latitude" class="text-red-500">{{ $page.errors.kec_latitude[0] }}</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <button wire:click.prevent="store()" type="button"
                                      class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                      v-show="!editMode" @click="save(form)">
                                Simpan
                              </button>
                            </span>
                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <button wire:click.prevent="store()" type="button"
                                      class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                      v-show="editMode" @click="update(form)">
                                Update
                              </button>
                            </span>
                                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                              <button @click="closeModal()" type="button"
                                      class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                              </button>
                            </span>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpenView">
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                            <div class="fixed inset-0 transition-opacity">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="mb-4">
                                        <h4>Data Status Kerawanan Bencana</h4>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="font-bold">Banjir :
                                            <span v-if="rawan_bencana.banjir==0" class="text-green-600">Rendah</span>
                                            <span v-if="rawan_bencana.banjir==1" class="text-yellow-600">Sedang</span>
                                            <span v-else-if="rawan_bencana.banjir==2" class="text-red-500">Tinggi</span>
                                        </h5>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="font-bold">Longsor :
                                            <span v-if="rawan_bencana.longsor==0" class="text-green-600">Rendah</span>
                                            <span v-else-if="rawan_bencana.longsor==1"
                                                  class="text-yellow-600">Sedang</span>
                                            <span v-else-if="rawan_bencana.longsor==2"
                                                  class="text-red-500">Tinggi</span>
                                        </h5>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="font-bold">Kekeringan :
                                            <span v-if="rawan_bencana.kekeringan==0"
                                                  class="text-green-600">Rendah</span>
                                            <span v-else-if="rawan_bencana.kekeringan==1"
                                                  class="text-yellow-600">Sedang</span>
                                            <span v-else-if="rawan_bencana.kekeringan==2"
                                                  class="text-red-500">Tinggi</span>
                                        </h5>
                                    </div>
                                    <div class="mb-2">
                                        <h5 class="font-bold">Puting Beliung :
                                            <span v-if="rawan_bencana.puting_beliung==0"
                                                  class="text-green-600">Rendah</span>
                                            <span v-else-if="rawan_bencana.puting_beliung==1" class="text-yellow-600">Sedang</span>
                                            <span v-else-if="rawan_bencana.puting_beliung==2" class="text-red-500">Tinggi</span>
                                        </h5>
                                    </div>

                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                              <button @click="closeViewModal()" type="button"
                                      class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Tutup
                              </button>
                            </span>
                                </div>
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
import Input from "@/Jetstream/Input";
import Pagination from '@/Components/Pagination'
import Multiselect from '@vueform/multiselect'
import axios from 'axios';

export default {
    name: "Desa",
    components: {
        Input,
        AppLayout,
        Pagination,
        Multiselect
    },
    props: ['desa', 'kecamatan', 'errors'],
    data() {
        return {
            editMode: false,
            isOpen: false,
            isOpenView: false,
            form: {
                id_kecamatan: null,
                kel_nama: null,
                kel_latitude: null,
                kel_longitude: null,
            },
            dataKecamatan: [],
            query: '',
            isSearching: false,
            rawan_bencana: {
                banjir: '',
                longsor: '',
                kekeringan: '',
                puting_beliung: ''
            }
        }
    },
    created() {
        this.kecamatan.forEach(kecamatan => {
            this.dataKecamatan.push({
                value: kecamatan.id,
                label: kecamatan.kec_nama
            })
        });
        this.isSearching = !!new URLSearchParams(window.location.search).get('cari');
    },
    methods: {
        searchData: function () {
            this.$inertia.get(`/kelurahan?cari=${this.query}`)
        },
        getStatusBencanaData: function (id) {
            axios.get('/api/lokasi-rawan/banjir/' + id).then(data => {
                this.rawan_bencana.banjir = data.data.status;
            })
            axios.get('/api/lokasi-rawan/longsor/' + id).then(data => {
                this.rawan_bencana.longsor = data.data.status;
            })
            axios.get('/api/lokasi-rawan/kekeringan/' + id).then(data => {
                this.rawan_bencana.kekeringan = data.data.status;
            })
            axios.get('/api/lokasi-rawan/puting-beliung/' + id).then(data => {
                this.rawan_bencana.puting_beliung = data.data.status;
            })
            this.isOpenView = true;
        },
        clearSearch: function () {
            this.query = '';
            this.$inertia.get(`/kelurahan`)
        },
        openModal: function () {
            this.isOpen = true;
        },
        closeModal: function () {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
        },
        closeViewModal: function () {
            this.isOpenView = false;
            this.rawan_bencana.banjir = '';
            this.rawan_bencana.longsor = '';
            this.rawan_bencana.kekeringan = '';
            this.rawan_bencana.puting_beliung = '';
        },
        reset: function () {
            this.form = {
                id_kecamatan: null,
                kel_nama: null,
                kel_latitude: null,
                kel_longitude: null,
            }
        },
        save: function (data) {
            this.$inertia.post('/kelurahan', data)
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function (data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function (data) {
            this.$inertia.post('/kelurahan/' + data.id, {
                    id_kecamatan: data.id_kecamatan,
                    kel_nama: data.kel_nama,
                    kel_latitude: data.kel_latitude,
                    kel_longitude: data.kel_longitude,
                    _method: 'PUT'
                }
            )
            this.reset();
            this.closeModal();
        },
        deleteRow: function (data) {
            if (!confirm('Are you sure want to remove?')) return;
            data._method = 'DELETE';
            this.$inertia.post('/kelurahan/' + data.id, data)
            this.reset();
            this.closeModal();
        }
    }
}
</script>
<style src="@vueform/multiselect/themes/default.css"></style>

