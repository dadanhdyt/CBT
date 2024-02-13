<script setup>
import Logout from './icons/Logout.vue';
import { $api } from '@/api';
import router from '@/router';
import store from '@/store';
import { ref } from 'vue';
import { toast } from 'vue3-toastify';

const user = ref(false);

$api.get('/peserta/get_user').then(function (response) {
    user.value = response.data.data;
})

const logout = async function logout() {
    if (confirm('Apakah anda yakin ingin logout')) {
        const response = await $api.post('/peserta/logout');
        if (response.data) {
            toast('Anda berhasil logout', {
                type: 'success',
                autoClose: true,
                closeOnClick: true,
            });
            store.setAuthToken(null);
            router.push('/login', { replace: false })
        }
    }
}

</script>
<template>
    <nav class="bg-blue-500 shadow">
        <div class="container px-2 mx-auto">
            <div class="flex items-center justify-between mx-auto h-14">
                <div class="flex items-center gap-10 text-white">
                    <a class="text-2xl cursor-pointer font-bold text-white" @click="router.push('/peserta')">ArganCBT</a>
                    <ul
                        class="flex sm:relative sm:py-0 sm:bg-transparent sm:text-white sm:shadow-none sm:border-t-0 items-start bottom-0 bg-white shadow-lg text-gray-500 flex-row  left-0  py-3  border-t-2 flex-start w-full  fixed gap-5 fonts-semibold">
                        <li>
                            <RouterLink to="/peserta/nilai-ujian">Nilai Ujian</RouterLink>
                        </li>
                        <li>
                            <RouterLink to="/peserta/me">Profile Saya</RouterLink>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-3">
                    <div v-if="user" class="text-white">
                        <span class="font-semibold">{{ user.nama }} | {{ user.nomor_peserta }}</span>
                    </div>
                    <div v-else class="w-40 h-6 bg-gray-200 rounded-lg animate-pulse"></div>
                    <button @click="logout"
                        class="flex items-center gap-1 px-2 py-1 text-white transition-all rounded-lg ring-1 ring-white hover:bg-red-300 hover:ring-red-400">
                        <Logout width="20" />
                        <span>Keluar Aplikasi</span>
                    </button>
                </div>
            </div>
        </div>
</nav>
<div class="container mx-auto">
    <router-view />
</div></template>