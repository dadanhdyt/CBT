<script setup>
import Logout from './icons/Logout.vue';
import { $api } from '@/api';
import router from '@/router';
import store from '@/store';
import { ref } from 'vue';
import { toast } from 'vue3-toastify';

const user = ref(false);

$api.get('/peserta/get_user').then(function(response){
    user.value = response.data.data;
})

const logout = async function logout(){
    if(confirm('Apakah anda yakin ingin logout')) {
        const response = await $api.post('/peserta/logout');
        if(response.data) {
            toast('Anda berhasil logout',{
                type:'success',
                autoClose:true,
                closeOnClick:true,
            });
            store.setAuthToken(null);
            router.push('/login',{replace:false})
        }
    }
}

</script>
<template>
    <nav class="bg-blue-500 shadow">
       <div class="container mx-auto px-2">
        <div class="mx-auto h-14 justify-between flex items-center">
            <a class="text-white text-2xl font-bold" href="">ArganCBT</a>
           <div class="flex gap-3 items-center">
            <div v-if="user" class="text-white">
                <span class="font-semibold">{{ user.nama }} | {{ user.nomor_peserta }}</span>
            </div>
            <div v-else class="bg-gray-200 h-6 rounded-lg animate-pulse w-40"></div>
            <button @click="logout" class="flex items-center gap-1 ring-1 ring-white hover:bg-red-300 hover:ring-red-400 transition-all px-2 py-1 text-white rounded-lg">
                <Logout width="20"/>
                <span>Keluar Aplikasi</span>
            </button>
           </div>
        </div>
       </div>
    </nav>
    <div class="container mx-auto">
        <slot/>
    </div>
</template>