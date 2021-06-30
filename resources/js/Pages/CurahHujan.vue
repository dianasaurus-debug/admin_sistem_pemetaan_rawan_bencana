<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Curah Hujan
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <button @click="openModal()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Tambah
                        Data
                    </button>
                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Nama Stasiun Hujan</th>
                            <th class="px-4 py-2">Volume</th>
                            <th class="px-4 py-2">Bulan</th>
                            <th class="px-4 py-2">Tahun</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="row in curahhujan.data">
                            <td class="border px-4 py-2">{{ row.id }}</td>
                            <td class="border px-4 py-2">{{ row.stasiun_hujan.kec_nama }}</td>
                            <td class="border px-4 py-2">{{ row.ch_volume }}</td>
                            <td class="border px-4 py-2">{{ row.ch_bulan }}</td>
                            <td class="border px-4 py-2">{{ row.ch_tahun }}</td>
                            <td class="border px-4 py-2">
                                <button @click="edit(row)"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ubah Data
                                </button>
                                <button @click="deleteRow(row)"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus
                                    Data
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <pagination class="mt-6" :links="curahhujan.links"/>

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
                                                <Multiselect v-model="form.id_stasiun"
                                                             :searchable="true"
                                                             :options="dataStasiun"
                                                             placeholder="Pilih Stasiun Hujan"/>
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Volume Curah Hujan (Litre):</label>
                                                <input type="number"
                                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                       id="exampleFormControlInput1"
                                                       placeholder="Masukkan Kapasitas Drainase"
                                                       v-model="form.ch_volume">
                                                <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1"
                                                       class="block text-gray-700 text-sm font-bold mb-2">Tahun Curah Hujan :</label>
                                                <vuejs-datepicker
                                                    :value="form.ch_tahun"
                                                    :format="DatePickerFormat"
                                                    :language="language"
                                                    minimum-view="year"
                                                    name="datepicker"
                                                    id="input-id"
                                                    input-class="input-class"></vuejs-datepicker>
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
import vuejsDatepicker from 'vuejs-datepicker';
import {id} from 'vuejs-datepicker/dist/locale'

export default {
    name: "Drainase",
    components: {
        Input,
        AppLayout,
        Pagination,
        Multiselect,
        vuejsDatepicker
    },
    props: ['curahhujan', 'stasiun_hujan', 'errors'],
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                id_stasiun: null,
                ch_volume: null,
                ch_bulan: null,
                ch_tahun: null,
            },
            dataStasiun : [],
            DatePickerFormat: 'yyyy',
            languange : id
        }
    },
    created() {
        this.stasiun_hujan.forEach(stasiun=>{
            this.dataStasiun.push({
                value : stasiun.id,
                label : stasiun.sh_nama
            })
        })
    },
    methods: {
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
                id_stasiun: null,
                ch_volume: null,
                ch_bulan: null,
                ch_tahun: null,
            };
        },
        save: function (data) {
            this.$inertia.post('/curah-hujan', data)
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
            this.form = Object.assign({}, data);
            this.form._method = "PUT";
            this.$inertia.post('/curah-hujan/' + data.id, this.form)
            this.reset();
            this.closeModal();
        },
        deleteRow: function (data) {
            if (!confirm('Are you sure want to remove?')) return;
            data._method = 'DELETE';
            this.$inertia.post('/curah-hujan/' + data.id, data)
            this.reset();
            this.closeModal();
        }
    }
}
</script>
<style src="@vueform/multiselect/themes/default.css"></style>

