<template>
    <div class="leading-normal tracking-normal" id="main-body">
        <div class="flex flex-wrap">

            <div class="text-white w-1/2 md:w-1/3 lg:w-64 fixed md:top-0 md:left-0 h-screen lg:block z-50" style="background-color: #3d3d3d" :class="sideBarOpen ? '' : 'hidden'" id="main-nav" >

                <div class="w-full h-20 flex px-6 items-center mb-4">
                    <p class="font-semibold text-md">EWARN BOJONEGORO</p>
                </div>

                <div class="mb-4 px-6">
                    <jet-nav-link href="/dashboard" :active="route().current('dashboard')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Dashboard
                    </jet-nav-link>
                    <jet-nav-link href="/kecamatan" :active="route().current('kecamatan.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Kecamatan
                    </jet-nav-link>
                    <jet-nav-link href="/kelurahan" :active="route().current('kelurahan.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Desa/Kelurahan
                    </jet-nav-link>
                    <jet-nav-link href="/kepadatan-penduduk" :active="route().current('kepadatan-penduduk.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Penduduk
                    </jet-nav-link>
                    <jet-nav-link href="/jarak-sumber-air" :active="route().current('jarak-sumber-air.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Sumber Air
                    </jet-nav-link>
                    <jet-nav-link href="/curah-hujan" :active="route().current('curah-hujan.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Curah Hujan
                    </jet-nav-link>
                    <jet-nav-link href="/sop-bencana" :active="route().current('sop-bencana')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        SOP Bencana
                    </jet-nav-link>
                    <jet-nav-link href="/stasiun-hujan" :active="route().current('stasiun-hujan.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Stasiun Hujan
                    </jet-nav-link>
                    <jet-nav-link href="/riwayat-bencana" :active="route().current('riwayat-bencana.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Riwayat Bencana
                    </jet-nav-link>
                    <jet-nav-link href="/kemiringan-lahan" :active="route().current('kemiringan-lahan.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Kemiringan Lahan
                    </jet-nav-link>
                    <jet-nav-link href="/persebaran-drainase" :active="route().current('persebaran-drainase.index')" class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Persebaran Drainase
                    </jet-nav-link>
                    <jet-nav-link href="/pergerakan-awan-cb"  :active="route().current('pergerakan-awan-cb.index')"
                                  class="w-full flex items-center h-10 hover:text-yellow-400 cursor-pointer border-b">
                        Pergerakan Awan CB
                    </jet-nav-link>
                    <jet-nav-link href="/logout" class="w-full flex items-center h-10 hover:text-red-400 cursor-pointer border-b" method="post" as="button" type="button">
                        Logout
                    </jet-nav-link>

                </div>

            </div>

            <div class="w-full bg-gray-100 pl-0 lg:pl-64 min-h-screen" :class="sideBarOpen ? 'overlay' : ''" id="main-content">

                <div class="sticky top-0" style="z-index: unset;">
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

<!--                        &lt;!&ndash; right navbar &ndash;&gt;-->
<!--                        <div class="flex items-center relative">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="fill-current mr-3 hover:text-blue-500"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>-->
<!--                            <img src="https://a7sas.net/wp-content/uploads/2019/07/4060.jpeg" class="w-12 h-12 rounded-full shadow-lg" @click="dropDownOpen = !dropDownOpen">-->
<!--                        </div>-->
                        <div class="hidden sm:flex sm:items-center sm:ml-6x">
                            <div class="ml-3">
                                <inertia-link href="/user/profile" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    {{ $page.props.user.name }}
                                </inertia-link>
<!--                                <jet-dropdown align="right" width="48">-->
<!--                                    <template #trigger>-->
<!--                                        <button  class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">-->
<!--                                            {{ $page.props.user.name }}-->
<!--                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"-->
<!--                                                 fill="currentColor">-->
<!--                                                <path fill-rule="evenodd"-->
<!--                                                      d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"-->
<!--                                                      clip-rule="evenodd"/>-->
<!--                                            </svg>-->
<!--                                        </button>-->
<!--                                    </template>-->
<!--                                    <template #content>-->
<!--                                        <jet-dropdown-link href="/user/profile">-->
<!--                                            Profile-->
<!--                                        </jet-dropdown-link>-->


<!--                                        &lt;!&ndash; Authentication &ndash;&gt;-->

<!--                                    </template>-->
<!--                                </jet-dropdown>-->
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
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
                <div class="ml-4 inline-block flex items-center mx-auto fixed bg-white overflow-hidden py-4 px-4 shadow-sm sm:rounded-lg header" style="bottom : 84%;width: 80%">
                        <slot name="header"></slot>
                    </div>
                <div class="p-2 bg-gray-100 mb-20">
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
            logout() {
                this.$inertia.post(route('logout'));
            },
            toggleSidebar() {
                this.sideBarOpen = !this.sideBarOpen;
            }
        }
    }
</script>
<style>
.active {
    color : yellow;
}

</style>

