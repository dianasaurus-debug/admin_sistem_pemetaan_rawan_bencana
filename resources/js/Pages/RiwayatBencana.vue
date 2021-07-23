<template>
    <inertia-head>
        <title>Data Riwayat</title>
    </inertia-head>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Bencana Baru
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <!--                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert" v-if="$page.flash.message">-->
                    <!--                        <div class="flex">-->
                    <!--                            <div>-->
                    <!--                                <p class="text-sm">{{ $page.flash.message }}</p>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="flex justify-between ...">
                        <div>
                            <button @click="openModal(true)"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Tambah Data
                            </button>
                        </div>
                        <div>
                            <button @click="clearSearch" v-if="search_baru"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">
                                Clear Search
                            </button>
                        </div>
                        <div>
                            <div class="pt-2 relative mx-auto text-gray-600">

                                <form @submit.prevent="searchData(1)">
                                    <input
                                        class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                        type="search" name="cari" placeholder="Search" v-model="query_baru">
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

                    <div v-if="bencana_baru.data.length!=0">
                        <table class="table-fixed w-full">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Desa/Kelurahan</th>
                                <th class="px-4 py-2">Foto Bencana</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="row in bencana_baru.data">
                                <td class="border px-4 py-2">{{ row.id }}</td>
                                <td class="border px-4 py-2">{{ row.bb_tanggal }}</td>
                                <td class="border px-4 py-2">{{ capitalize(row.desa.kel_nama) }}</td>
                                <td class="border px-4 py-2">
                                    <img style="max-width: 150px" :src="'/images/foto_bencana/'+row.bb_foto_bencana"/>
                                </td>
                                <td class="border px-4 py-2">
                                    <button @click="edit(row, true)"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Ubah Data
                                    </button>
                                    <button @click="deleteRow(row, true)"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                        Data
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination class="mt-6" :links="bencana_baru.links"/>
                    </div>
                    <div v-else>
                        <h5 class="text-gray-400 font-medium font-bold text-center"> Belum ada data</h5>
                    </div>

                </div>
            </div>
            <div
                class="mt-4 mb-3 ml-4 mr-6 inline-block flex items-center mx-auto z-50 bg-white overflow-hidden py-5 px-4 shadow-sm sm:rounded-lg header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Data Riwayat Bencana
                </h2>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <!--                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert" v-if="$page.flash.message">-->
                    <!--                        <div class="flex">-->
                    <!--                            <div>-->
                    <!--                                <p class="text-sm">{{ $page.flash.message }}</p>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="flex justify-between ...">
                        <div>
                            <button @click="openModal(false)"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                                Tambah Data
                            </button>
                        </div>
                        <div>
                            <button @click="clearSearch" v-if="search_riwayat"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">
                                Clear Search
                            </button>
                        </div>
                        <div>
                            <div class="pt-2 relative mx-auto text-gray-600">

                                <form @submit.prevent="searchData(0)">
                                    <input
                                        class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                        type="search" name="cari" placeholder="Search" v-model="query_riwayat">
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

                    <div v-if="riwayat_bencana.data.length!=0">
                        <table class="table-fixed w-full">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Tahun</th>
                                <th class="px-4 py-2">Desa/Kelurahan</th>
                                <th class="px-4 py-2">Status Perbaikan</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="row in riwayat_bencana.data">
                                <td class="border px-4 py-2">{{ row.id }}</td>
                                <td class="border px-4 py-2">{{ row.rb_tahun }}</td>
                                <td class="border px-4 py-2">{{ capitalize(row.desa.kel_nama) }}</td>
                                <td class="border px-4 py-2">{{ row.rb_status_perbaikan }}</td>
                                <td class="border px-4 py-2">
                                    <button @click="edit(row, false)"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Ubah Data
                                    </button>
                                    <button @click="deleteRow(row, false)"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                        Data
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination class="mt-6" :links="riwayat_bencana.links"/>
                    </div>
                    <div v-else>
                        <h5 class="text-gray-400 font-medium font-bold text-center"> Belum ada data</h5>
                    </div>


                </div>
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
                        <form v-if="isBaru==false">
                            <div class="md:grid md:grid-cols-2 gap-4">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="">
                                        <div class="mb-4">
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Nama
                                                Desa:</label>
                                            <!--                                                <div v-if="$page.errors.kec_nama" class="text-red-500">{{ $page.errors.kec_nama[0] }}</div>-->
                                            <Multiselect v-model="form.id_kelurahan"
                                                         :searchable="true"
                                                         :options="dataDesa"
                                                         placeholder="Pilih Desa" required/>
                                        </div>
                                        <div class="mb-4">
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Jenis
                                                Bencana:</label>
                                            <Multiselect v-model="form.id_jenis_bencana"
                                                         :options="dataBencana"
                                                         placeholder="Pilih Jenis Bencana" required/>
                                            <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                        </div>
                                        <div class="mb-4">
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Kerusakan:</label>
                                            <input type="text"
                                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                   id="exampleFormControlInput1"
                                                   placeholder="Masukkan Kerusakan"
                                                   v-model="form.rb_kerusakan" required>
                                            <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                        </div>
                                        <div>
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Kerugian
                                                (Juta) :</label>
                                            <input type="number"
                                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                   placeholder="Masukkan Kerugian"
                                                   v-model="form.rb_kerugian" required>
                                            <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="">
                                        <div class="mb-4">
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Koordinat
                                                Latitude :</label>
                                            <input type="number"
                                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                   placeholder="Masukkan Latitude"
                                                   v-model="form.rb_latitude" required>
                                            <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                        </div>
                                        <div class="mb-4">
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Koordinat
                                                Longitude :</label>
                                            <input type="number"
                                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                   placeholder="Masukkan Longitude"
                                                   v-model="form.rb_longitude" required>
                                            <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                        </div>
                                        <div>
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Status
                                                Perbaikan: </label>
                                            <Multiselect v-model="form.rb_status_perbaikan"
                                                         :options="status_perbaikan"
                                                         placeholder="Pilih Status Perbaikan" required/>
                                            <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1"
                                           class="block text-gray-700 text-sm font-bold mb-2">Tahun dan Bulan
                                        Riwayat Bencana :</label>
                                    <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                    <month-picker @change="changeDate" :default-month="bulan+1"
                                                  :default-year="tahun" :lang="'id'"></month-picker>

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
                        <form v-else>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="mb-4">
                                    <label
                                        class="block text-gray-700 text-sm font-bold mb-2">Nama
                                        Desa:</label>
                                    <!--                                                <div v-if="$page.errors.kec_nama" class="text-red-500">{{ $page.errors.kec_nama[0] }}</div>-->
                                    <Multiselect v-model="form_baru.id_kelurahan"
                                                 :searchable="true"
                                                 :options="dataDesa"
                                                 placeholder="Pilih Desa" required/>
                                </div>
                                <div class="mb-4">
                                    <label
                                        class="block text-gray-700 text-sm font-bold mb-2">Jenis
                                        Bencana:</label>
                                    <Multiselect v-model="form_baru.id_jenis_bencana"
                                                 :options="dataBencana"
                                                 placeholder="Pilih Jenis Bencana" required/>
                                    <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                </div>
                                <div class="mb-4">
                                    <label
                                        class="block text-gray-700 text-sm font-bold mb-2">Tanggal Terjadi Bencana</label>
                                    <input type="date"
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                           placeholder="Masukkan Tanggal Terjadi Bencana"
                                           v-model="form_baru.bb_tanggal" required>
                                    <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                </div>
                                <div class="mb-4">
                                    <label
                                        class="block text-gray-700 text-sm font-bold mb-2">Koordinat Latitude</label>
                                    <input type="number"
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                           placeholder="Masukkan Koordinat Latitude"
                                           v-model="form_baru.bb_latitude" required>
                                    <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                </div>
                                <div class="mb-4">
                                    <label
                                        class="block text-gray-700 text-sm font-bold mb-2">Koordinat Longitude</label>
                                    <input type="number"
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                           placeholder="Masukkan Koordinat Longitude"
                                           v-model="form_baru.bb_longitude" required>
                                    <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                </div>
                                <div class="mb-4 shadow p-3">
                                    <label
                                        class="block text-gray-700 text-sm font-bold mb-2">Foto Bencana</label>
                                            <img id="diplay_img" v-bind:src="imagePreview" style="border-radius : 5px;max-height : 120px; max-width: 130px;"/>
                                            <input type="file" name="bb_foto_bencana" class="text-gray-700" id="picture" @change="onFileChange" required>
                                    <!--                                                <div v-if="$page.errors.kec_longitude" class="text-red-500">{{ $page.errors.kec_longitude[0] }}</div>-->
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <button wire:click.prevent="store()" type="button"
                                      class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                      v-show="!editMode" @click="isBaru ? save(form_baru, true) : save(form, false)">
                                Simpan
                              </button>
                            </span>
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <button wire:click.prevent="store()" type="button"
                                      class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                      v-show="editMode" @click="isBaru ? update(form_baru, true) : update(form, false)">
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
    </app-layout>
</template>
<script>
import AppLayout from '../Layouts/AppLayout'
import Input from "@/Jetstream/Input";
import Pagination from '@/Components/Pagination'
import Multiselect from '@vueform/multiselect'
import {MonthPicker, MonthPickerInput} from "vue-month-picker";

export default {
    name: "RiwayatBencana",
    components: {
        Input,
        AppLayout,
        Pagination,
        Multiselect,
        MonthPicker,
        MonthPickerInput
    },
    props: ['riwayat_bencana', 'bencana_baru', 'jenis_bencana', 'data_desa', 'errors'],
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                id_jenis_bencana: null,
                id_kelurahan: null,
                rb_kerusakan: null,
                rb_kerugian: null,
                rb_longitude: null,
                rb_latitude: null,
                rb_status_perbaikan: null,
                rb_bulan: null,
                rb_tahun: null
            },
            form_baru: {
                id_jenis_bencana: null,
                id_kelurahan: null,
                bb_longitude: null,
                bb_latitude: null,
                bb_tanggal: null,
                bb_foto_bencana : null
            },
            dataDesa: [],
            dataBencana: [],
            status_perbaikan: [
                {
                    value: 'Belum',
                    label: 'Belum'
                },
                {
                    value: 'Selesai',
                    label: 'Selesai'
                }
            ],
            isBaru: false,
            tanggal: {
                from: null,
                to: null,
                month: null,
                year: null
            },
            bulan: '',
            tahun: '',
            imagePreview: '/images/image_placeholder.png',
            daftar_bulan: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            query_baru : '',
            query_riwayat : '',
            search_baru : '',
            search_riwayat : ''
        }
    },
    created() {
        this.search_baru = !!new URLSearchParams(window.location.search).get('cari_baru');
        this.search_riwayat = !!new URLSearchParams(window.location.search).get('cari_lama');
        this.data_desa.forEach(desa => {
            this.dataDesa.push({
                value: desa.id,
                label: this.capitalize(desa.kel_nama)
            })
        })
        this.jenis_bencana.forEach(bencana => {
            this.dataBencana.push({
                value: bencana.id,
                label: this.capitalize(bencana.nama_bencana)
            })
        })
    },
    methods: {
        searchData: function (status) {
            if(status==0){
                this.$inertia.get(`/riwayat-bencana?cari_lama=${this.query_riwayat}`)
            } else {
                this.$inertia.get(`/riwayat-bencana?cari_baru=${this.query_baru}`)
            }
        },
        clearSearch: function () {
            this.$inertia.get(`/riwayat-bencana`)
        },
        capitalize(word) {
            const lower = word.toLowerCase();
            return word.charAt(0).toUpperCase() + lower.slice(1);
        },
        openModal: function (jenis) {
            this.imagePreview= '/images/image_placeholder.png',
            this.isBaru = jenis;
            this.isOpen = true;
        },
        closeModal: function () {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
        },
        reset: function () {
            this.form = {
                id_jenis_bencana: null,
                id_kelurahan: null,
                rb_kerusakan: null,
                rb_kerugian: null,
                rb_longitude: null,
                rb_latitude: null,
                rb_status_perbaikan: null,
                rb_bulan: null,
                rb_tahun: null
            };
            this.tanggal = {
                from: null,
                to: null,
                month: null,
                year: null
            };
            this.bulan = '';
            this.tahun = '';
            this.form_baru = {
                id_jenis_bencana: null,
                id_kelurahan: null,
                bb_longitude: null,
                bb_latitude: null,
                bb_tanggal: null,
                bb_foto_bencana: null
            }
        },
        save: function (data, jenis) {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            let formData = new FormData();
            if(jenis==true){
                formData.append("id_jenis_bencana", this.form_baru.id_jenis_bencana);
                formData.append("id_kelurahan", this.form_baru.id_kelurahan);
                formData.append("bb_longitude", this.form_baru.bb_longitude);
                formData.append("bb_latitude", this.form_baru.bb_latitude);
                formData.append("bb_tanggal", this.form_baru.bb_tanggal);
                formData.append("bb_foto_bencana", this.form_baru.bb_foto_bencana);
                this.$inertia.post('/bencana-baru', formData, config)
            } else{
                data.rb_bulan = this.tanggal.monthIndex;
                data.rb_tahun = this.tanggal.year;
                this.$inertia.post('/riwayat-bencana', data)
            }
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function (data, jenis) {
            if(jenis){
                this.form_baru= Object.assign({}, data);
            } else {
                this.form= Object.assign({}, data);

            }

            this.form = Object.assign({}, data);
            this.bulan = data.rb_bulan - 1;
            this.tahun = data.ch_tahun;
            this.editMode = true;
            this.openModal(jenis);
            this.imagePreview= '/images/foto_bencana/'+data.bb_foto_bencana

        },
        update: function (data, jenis) {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            let formData = new FormData();
            if(jenis==true){
                console.log(formData)
                formData.append("id_jenis_bencana", data.id_jenis_bencana);
                formData.append("id_kelurahan", data.id_kelurahan);
                formData.append("bb_longitude", data.bb_longitude);
                formData.append("bb_latitude", data.bb_latitude);
                formData.append("bb_tanggal", data.bb_tanggal);
                formData.append("bb_foto_bencana", this.form_baru.bb_foto_bencana);
                formData.append("_method", 'PATCH');
                this.$inertia.post('/bencana-baru', data.id, formData, config)
            } else{
                console.log('lama')

                this.$inertia.post('/riwayat-bencana/' + data.id, {
                    id_jenis_bencana: data.id_jenis_bencana,
                    id_kelurahan: data.id_kelurahan,
                    rb_kerusakan: data.rb_kerusakan,
                    rb_kerugian: data.rb_kerugian,
                    rb_longitude: data.rb_longitude,
                    rb_latitude: data.rb_latitude,
                    rb_status_perbaikan: data.rb_status_perbaikan,
                    rb_bulan: this.tanggal.monthIndex,
                    rb_tahun: this.tanggal.year,
                    _method: 'PUT'
                })
            }
            this.reset();
            this.closeModal();
        },
        deleteRow: function (data, jenis) {
            if (!confirm('Are you sure want to remove?')) return;
            data._method = 'DELETE';
            if(jenis){
                this.$inertia.post('/bencana-baru/' + data.id, data)
            } else {
                this.$inertia.post('/riwayat-bencana/' + data.id, data)

            }

            this.reset();
            this.closeModal();
        },
        changeDate(date) {
            this.tanggal = date;
        },
        onFileChange(event){
            this.form_baru.bb_foto_bencana = event.target.files[0];

            let reader  = new FileReader();

            reader.addEventListener("load", function () {
                this.imagePreview = reader.result;
            }.bind(this), false);

            if( this.form_baru.bb_foto_bencana){
                if ( /\.(jpe?g|jpg|png|gif)$/i.test( this.form_baru.bb_foto_bencana.name ) ) {

                    console.log("here");
                    reader.readAsDataURL( this.form_baru.bb_foto_bencana );
                }
            }
        },
    }
}
</script>
<style src="@vueform/multiselect/themes/default.css"></style>

