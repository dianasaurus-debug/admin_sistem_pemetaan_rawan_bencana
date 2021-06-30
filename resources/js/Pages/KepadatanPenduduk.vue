<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Kepadatan Penduduk
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
                            <th class="px-4 py-2">Nama Desa</th>
                            <th class="px-4 py-2">Kepadatan Penduduk</th>
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
                    <pagination class="mt-6" :links="kepadatan_penduduk.links"/>

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
                                                             placeholder="Pilih Kecamatan" @change="getDataDesa(form.id_kecamatan)"/>
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
            dataDesa: []
        }
    },
    created() {
        this.kecamatan.forEach(kecamatan => {
            this.dataKecamatan.push({
                value: kecamatan.id,
                label: kecamatan.kec_nama
            })
            kecamatan.desa.forEach(desa => {
                this.dataDesa.push({
                    value: desa.id,
                    label: desa.kel_nama
                })
            })
        })
    },
    methods: {
        getDataDesa(id) {
            this.form.id_kelurahan = null;
            this.dataDesa = [];
            this.kecamatan.forEach(kecamatan => {
                if (kecamatan.id == id) {
                    kecamatan.desa.forEach(desa => {
                        this.dataDesa.push({
                            value: desa.id,
                            label: desa.kel_nama
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

