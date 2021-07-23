<template>
    <inertia-head>
        <title>Data Kepadatan Penduduk</title>
    </inertia-head>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Kepadatan Penduduk
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
                    <div v-if="kepadatan_penduduk.data.length>0">
                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Nama Desa</th>
                            <th class="px-4 py-2">Kepadatan Penduduk (Jiwa/Km²)</th>
                            <th class="px-4 py-2">Jumlah Penduduk</th>
                            <th class="px-4 py-2">Tahun Kepadatan</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="row in kepadatan_penduduk.data">
                            <td class="border px-4 py-2">{{ row.id }}</td>
                            <td class="border px-4 py-2">{{ row.desa.kel_nama }}</td>
                            <td class="border px-4 py-2">{{ row.kepadatan_penduduk }}</td>
                            <td class="border px-4 py-2">{{ row.jumlah_penduduk }}</td>
                            <td class="border px-4 py-2">{{ row.kepadatan_tahun }}</td>
                            <td class="border px-4 py-2">
                                <button @click="edit(row)"
                                        class="bg-blue-500 hover:bg-blue-700 text-white text-sm mr-2 font-bold p-1 rounded">
                                    Ubah Data
                                </button>
                                <button @click="deleteRow(row)"
                                        class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold p-1 rounded">Hapus
                                    Data
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <pagination class="mt-6" :links="kepadatan_penduduk.links"/>
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
                                                             placeholder="Pilih Kecamatan" @change="getDataDesa"/>
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Nama
                                                    Desa:</label>
                                                <!--                                                <div v-if="$page.errors.kec_nama" class="text-red-500">{{ $page.errors.kec_nama[0] }}</div>-->
                                                <Multiselect v-model="form.id_kelurahan"
                                                             :searchable="true"
                                                             :options="dataDesa"
                                                             placeholder="Pilih Desa/Kelurahan"
                                                             :disabled="form.id_kecamatan==null"/>
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Kepadatan
                                                    Penduduk:</label>
                                                <input type="text"
                                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                       id="exampleFormControlInput1"
                                                       placeholder="Masukkan Kepadatan Penduduk"
                                                       v-model="form.kepadatan_penduduk">
                                                <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Jumlah
                                                    Penduduk:</label>
                                                <input type="text"
                                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                       id="exampleFormControlInput1"
                                                       placeholder="Masukkan Jumlah Penduduk"
                                                       v-model="form.jumlah_penduduk">
                                                <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Tahun
                                                    Kepadatan
                                                    Penduduk:</label>
                                                <input type="text"
                                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                       id="exampleFormControlInput1"
                                                       placeholder="Masukkan Kepadatan Jumlah Penduduk"
                                                       v-model="form.kepadatan_tahun">
                                                <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
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

export default {
    name: "KepadatanPenduduk",
    components: {
        Input,
        AppLayout,
        Pagination,
        Multiselect
    },
    props: ['kepadatan_penduduk', 'kecamatan', 'errors'],
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                id_kecamatan: null,
                id_kelurahan: null,
                kepadatan_penduduk: null,
                kepadatan_tahun: null,
                jumlah_penduduk: null
            },
            dataKecamatan: [],
            dataDesa: [],
            query: '',
            isSearching: false
        }
    },
    created() {
        this.isSearching = !!new URLSearchParams(window.location.search).get('cari');
        this.kecamatan.forEach(kecamatan => {
            this.dataKecamatan.push({
                value: kecamatan.id,
                label: kecamatan.kec_nama
            })
            kecamatan.desa.forEach(desa => {
                this.dataDesa.push({
                    value: desa.id,
                    label: this.capitalize(desa.kel_nama)
                })
            })
        })

    },
    methods: {
        searchData: function () {
            this.$inertia.get(`/kepadatan-penduduk?cari=${this.query}`)
        },
        clearSearch: function () {
            this.query = '';
            this.$inertia.get(`/kepadatan-penduduk`)
        },
        capitalize(word) {
            const lower = word.toLowerCase();
            return word.charAt(0).toUpperCase() + lower.slice(1);
        },
        getDataDesa(id) {
            this.form.id_kelurahan = null;
            this.dataDesa = [];
            this.kecamatan.forEach(kecamatan => {
                if (kecamatan.id == id) {
                    kecamatan.desa.forEach(desa => {
                        this.dataDesa.push({
                            value: desa.id,
                            label: this.capitalize(desa.kel_nama)
                        })
                    })
                }

            })
        },
        openModal: function () {
            this.isOpen = true;
        },
        closeModal: function () {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
        },
        reset: function () {
            this.form = {
                id_kecamatan: null,
                id_kelurahan: null,
                kepadatan_penduduk: null,
                kepadatan_tahun: null,
                jumlah_penduduk: null
            };
        },
        save: function (data) {
            this.$inertia.post('/kepadatan-penduduk', data)
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
            this.$inertia.post('/kepadatan-penduduk/' + data.id, {
                id_kelurahan: data.id_kelurahan,
                jumlah_penduduk: data.jumlah_penduduk,
                id_kecamatan: data.id_kecamatan,
                kepadatan_tahun: data.kepadatan_tahun,
                kepadatan_penduduk: data.kepadatan_penduduk,
                _method: 'PUT'
            })
            this.reset();
            this.closeModal();
        },
        deleteRow: function (data) {
            if (!confirm('Are you sure want to remove?')) return;
            data._method = 'DELETE';
            this.$inertia.post('/kepadatan-penduduk/' + data.id, data)
            this.reset();
            this.closeModal();
        }
    }
}
</script>
<style src="@vueform/multiselect/themes/default.css"></style>

