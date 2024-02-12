<script setup>
import { $api } from '@/api'

import PesertaTemplate from "@/components/PesertaTemplate.vue"
import UimSchedule from '@/components/icons/UimSchedule.vue';
import BukuVue from '@/components/icons/Buku.vue';
import Pencil from '@/components/icons/Pencil.vue'
import Sad from '@/components/icons/Sad.vue';
import { notify, toast } from '@/lib/toast';
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
  <PesertaTemplate>
    <div class="my-12 px-3 sm:px-0">
      <div class="">
        <h1 class="text-lg font-bold text-gray-600">JADWAL UJIAN TERSEDIA</h1>

        <div v-if="dataUjianTersedia.length > 0" class="grid gap-3 mt-5 grid-cols-1 sm:grid-cols-3">
          <div class=" shadow-lg rounded-lg overflow-hidden transition-all" v-for="data in dataUjianTersedia">
            <div class="bg-blue-500 items-center flex justify-between px-4 py-3">
              <div class="flex items-center gap-2">
                <UimSchedule class="text-white"/>
                <span class="text-white font-semibold">{{ data.nama }}</span>
              </div>
              <div class="text-white fle">
                <div class="p-2 py-1 gap-1 flex items-center text-sm rounded">
                  <BukuVue width="20"/>
                  {{ data.mata_pelajaran }}
                </div>
              </div>
            </div>
            <div class="p-3 flex flex-col gap-3">
              <ul class="flex flex-col gap-3 divide-y divide-y-reverse">
                <li class="flex items-center justify-between"><span class="font-semibold text-sm">Tanggal Mulai</span>{{ data.tanggal }}</li>
                <li class="flex items-center justify-between"><span class="font-semibold text-sm">Waktu Mulai</span> {{ data.waktu_mulai }}
                </li>
                <li class="flex items-center justify-between"><span class="font-semibold text-sm">Durasi Ujian</span>{{ data.lama_ujian }}</li>
                <li class="flex items-center justify-between"><span class="font-semibold text-sm">Status
                    Ujian</span>
                    <div class="text-xs p-1 rounded text-white bg-green-500" v-if="data.status">Aktif</div>
                    <div class="text-xs p-1 rounded text-white bg-red-500" v-else>Tidak Aktif</div>
                  </li>
              </ul>
            
              <button v-if="data.status" class="bg-blue-500 flex items-center justify-center text-white text-sm rounded-lg px-3 py-1">
                <Pencil width="20"/>
                Mulai Ujian
              </button>
              <button disabled v-else class="bg-blue-500 cursor-not-allowed disabled:bg-gray-500  text-white text-sm rounded-lg px-3 py-2">Mulai Sekarang</button>
            </div>
          </div>
        </div>
      <div v-if="dataUjianTersedia.length == 0 && !loading">
        <span>
          
        </span>
        <div class="text-base flex items-center justify-center flex-col gap-3 font-bold mt-16 text-center">
          <Sad/>
          <p>
            
          Tidak Ada Jadwal Ujian Hari ini
          <p class="text-sm font-normal italic">
            Tapi belajar lah agar pada saat ujian nanti tidak gila!
          </p>
          </p>
        </div>
      </div>
        <div class="grid grid-cols-3 mt-4 gap-10" v-if="loading">
          <div v-for="i in 3" class="relative shadow p-2 rounded flex flex-col gap-2 bg-white">
            <div class="flex  justify-between">
              <div class="flex gap-2 items-center flex-row">
                <span class="bg-gray-200 animate-pulse rounded-lg w-8 h-8"></span>
                <span class="bg-gray-200 animate-pulse rounded-lg h-3 w-36"></span>
              </div>
              <span class="bg-gray-200 animate-pulse rounded-lg h-6 w-24"></span>
            </div>
            <div class="flex mt-4 flex-col gap-3">
              <div class="flex gap-3 justify-between">
                <span class="bg-gray-200 animate-pulse rounded-lg h-2 w-60"></span>
                <span class="bg-gray-200 animate-pulse rounded-lg h-2 w-24"></span>
              </div>
              <div class="flex gap-3 justify-between">
                <span class="bg-gray-200 animate-pulse rounded-lg h-2 w-60"></span>
                <span class="bg-gray-200 animate-pulse rounded-lg h-2 w-24"></span>
              </div>
              <div class="flex gap-3 justify-between">
                <span class="bg-gray-200 animate-pulse rounded-lg h-2 w-60"></span>
                <span class="bg-gray-200 animate-pulse rounded-lg h-2 w-24"></span>
              </div>
              <div class="flex gap-3 justify-between">
                <span class="bg-gray-200 animate-pulse rounded-lg h-2 w-60"></span>
                <span class="bg-gray-200 animate-pulse rounded-lg h-2 w-24"></span>
              </div>
              <div class="mt-4">
                <span class="bg-gray-200 animate-pulse  relative block rounded-lg h-8 w-full"></span>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </PesertaTemplate>
</template>
