<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-color: #eab543">
        <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block">
            <inertia-link :href="route('dashboard')" class="font-bold text-lg">
                EWARN BOJONEGORO
            </inertia-link>
        </div>
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-sm mt-3 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>

        <div class="mt-3 mb-3">
            Belum punya akun? <inertia-link :href="route('register')" class="text-red-600">Buat akun</inertia-link>
        </div>
        <footer class="h-10">Copyright &copy; Nadia Ayu Laksmidewi 2021</footer>
    </div>
</template>
