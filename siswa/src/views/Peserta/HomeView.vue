<script setup>
import { $api } from '@/api'
import NotFound from '@/images/none.gif'
import PesertaTemplate from "@/components/PesertaTemplate.vue"
import UimSchedule from '@/components/icons/UimSchedule.vue';
import BukuVue from '@/components/icons/Buku.vue';
import Pencil from '@/components/icons/Pencil.vue'
import Sad from '@/components/icons/Sad.vue';
import { toast } from '@/lib/toast';
import SkeletonLoading from '@/components/SkeletonLoading.vue'
import { ref } from 'vue';



const dataUjianTersedia = ref([]);

const loading = ref(true);
async function getUjian() {
  const toast_id = toast.loading("Loading....",{
    position:"top-center"
  });
  const response = await $api.get('peserta/ujian/get_ujian')
  if (response.data.data) {
    dataUjianTersedia.value = response.data.data;
    loading.value = false;
    toast.remove(toast_id);

  }
}

getUjian();



</script>
<template>
  <div class="px-3 my-12 sm:px-0">
      <div class="">
        <h1 class="text-lg font-bold text-gray-600">JADWAL UJIAN TERSEDIA</h1>

        <div v-if="dataUjianTersedia.length > 0" class="grid grid-cols-1 gap-3 mt-5 sm:grid-cols-3">
          <div class="overflow-hidden transition-all rounded-lg shadow-lg " v-for="data in dataUjianTersedia">
            <div class="flex items-center justify-between px-4 py-3 bg-blue-500">
              <div class="flex items-center gap-2">
                <UimSchedule class="text-white"/>
                <span class="font-semibold text-white">{{ data.nama }}</span>
              </div>
              <div class="text-white fle">
                <div class="flex items-center gap-1 p-2 py-1 text-sm rounded">
                  <BukuVue width="20"/>
                  {{ data.mata_pelajaran }}
                </div>
              </div>
            </div>
            <div class="flex flex-col gap-3 p-3">
              <ul class="flex flex-col gap-3 divide-y divide-y-reverse">
                <li class="flex items-center justify-between"><span class="text-sm font-semibold">Tanggal Mulai</span>{{ data.tanggal }}</li>
                <li class="flex items-center justify-between"><span class="text-sm font-semibold">Waktu Mulai</span> {{ data.waktu_mulai }}
                </li>
                <li class="flex items-center justify-between"><span class="text-sm font-semibold">Durasi Ujian</span>{{ data.lama_ujian }}</li>
                <li class="flex items-center justify-between"><span class="text-sm font-semibold">Status
                    Ujian</span>
                    <div class="p-1 text-xs text-white bg-green-500 rounded" v-if="data.status">Aktif</div>
                    <div class="p-1 text-xs text-white bg-red-500 rounded" v-else>Tidak Aktif</div>
                  </li>
              </ul>
            
              <button @click="$router.push({name:'confirm',params:{jadwal_id:data.id}})" v-if="data.status" class="flex items-center justify-center px-3 py-1 text-sm text-white bg-blue-500 rounded-lg">
                <Pencil width="20"/>
                Mulai Ujian
              </button>
              <button disabled v-else class="px-3 py-2 text-sm text-white bg-blue-500 rounded-lg cursor-not-allowed disabled:bg-gray-500">Mulai Sekarang</button>
            </div>
          </div>
        </div>
      <div v-if="dataUjianTersedia.length == 0 && !loading">
        <span>
          
        </span>
        <div class="flex flex-col items-center justify-center gap-3 mt-16 text-base font-bold text-center">
            <img :src="NotFound" alt="">
          <p>
            
          Tidak Ada Jadwal Ujian Hari ini
          <p class="text-sm italic font-normal">
            Tapi belajar lah agar pada saat ujian nanti tidak gila!
          </p>
          </p>
        </div>
      </div>
       <SkeletonLoading  v-if="loading"/>
      </div>
    </div>
</template>
