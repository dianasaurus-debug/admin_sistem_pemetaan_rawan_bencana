<template>
    <div class="leading-normal tracking-normal" id="main-body">
        <div class="flex flex-wrap">

            <div class="text-white w-1/2 md:w-1/3 lg:w-64 fixed md:top-0 md:left-0 h-screen lg:block z-30" style="background-color: #3d3d3d" :class="sideBarOpen ? '' : 'hidden'" id="main-nav" >

                <div class="w-full h-20 flex px-6 items-center mb-4">
                    <p class="font-semibold text-md">EWARN BOJONEGORO</p>
                </div>

                <div class="mb-4 px-6">
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Dashboard
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Kecamatan
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Desa/Kelurahan
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Penduduk
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Sumber Air
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Curah Hujan
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        SOP Bencana
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Stasiun Hujan
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Riwayat Bencana
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Kemiringan Lahan
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Persebaran Drainase
                    </div>
                    <div class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Pergerakan Awan CB
                    </div>
                </div>


            </div>

            <div class="w-full bg-gray-100 pl-0 lg:pl-64 min-h-screen" :class="sideBarOpen ? 'overlay' : ''" id="main-content">

                <div class="sticky top-0 z-40">
                    <div class="w-full h-20 px-6 border-b flex items-center justify-between" style="background-color : #eab543">

                        <!-- left navbar -->
                        <div class="flex">

                            <!-- mobile hamburger -->
                            <div class="inline-block flex items-center mr-4">
                                <button class="hover:text-blue-500 hover:border-white focus:outline-none navbar-burger" @click="toggleSidebar()">
                                    <svg class="h-5 w-5" v-bind:style="{ fill: 'black' }" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                                </button>
                            </div>

                        </div>

                        <!-- right navbar -->
                        <div class="flex items-center relative">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="fill-current mr-3 hover:text-blue-500"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
                            <img src="https://a7sas.net/wp-content/uploads/2019/07/4060.jpeg" class="w-12 h-12 rounded-full shadow-lg" @click="dropDownOpen = !dropDownOpen">
                        </div>

                    </div>

                    <!-- dropdown menu -->
                    <div class="absolute bg-gray-100 border border-t-0 shadow-xl text-gray-700 rounded-b-lg w-48 bottom-10 right-0 mr-6" :class="dropDownOpen ? '' : 'hidden'">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200">Account</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200">Settings</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
                    </div>
                    <!-- dropdown menu end -->

                </div>


                <div class="p-6 bg-gray-100 mb-20">
                    <slot></slot>
                </div>

                <Footer />

            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import Footer from "@/Components/Footer";

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Footer,
        },

        data() {
            return {
                sideBarOpen: false,
                showingNavigationDropdown: false,
                dropDownOpen : false
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
            toggleSidebar() {
                this.sideBarOpen = !this.sideBarOpen;
            }
        }
    }
</script>
