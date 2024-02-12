<script setup>
import { ref } from 'vue'
import store from '@/store'
import router from '@/router'
import InputComponent from '@/components/Input.vue'
import Label from '@/components/Label.vue'
import { notify, toast } from '@/lib/toast'
import { $api } from '@/api'

const errorValidation = ref([])

const userLoginData = ref({
  kode_peserta: null,
  password: null,
  _local_time: new Date()
})

async function login() {
  const toast_id = toast.loading('Tunggu sebentar')
  try {
    let response = await $api.post('peserta/login', userLoginData.value)
    if (response.status === 200 && response.data.error == false) {
      toast.remove(toast_id)
      const token = response.data.api_token
      if (token) {
        store.setAuthToken(token)
        router.push({
          name: 'autenticated'
        })
      }
    } else {
      toast.update(toast_id, {
        isLoading: false,
        autoClose: true,
        type: 'error',
        position:'top-left',
        render: 'Ada kesalahan saat meminta data'
      })
    }
  } catch (error) {
    if (error?.response?.data?.error == true && error?.response?.data?.message.validation_errors) {
      toast.update(toast_id, {
        isLoading: false,
        type: 'error',
        autoClose: true,
        closeButton: true,
        render: 'Login gagal kode peserta atau password tidak di temukan'
      })
      toast.done(toast_id)
      errorValidation.value = error.response.data.message.validation_errors
    } else {
      errorValidation.value = []
      toast.update(toast_id, {
        isLoading: false,
        autoClose: true,
        type: 'error',
        render: error.response.data.message
      })
    }
  }
}
</script>
<template>
  <div class="container p-2 sm:p-0">
    <div class="m-auto">
      <div class="max-w-md border-l-4 border-l-blue-400 mt-20 bg-white border rounded-lg shadow mx-auto my-auto">
        <div class="my-4 px-4 sm:px-6 text-lg text-left font-bold tracking-wide">
          <h2>S-LOGIN</h2>
        </div>

        <form @submit.prevent="login" class="sm:px-6 px-4 pb-6">
          <div class="grid grid-cols-1 gap-3">
            <div class="">
              <Label for="kode_ujian">KODE UJIAN</Label>
              <InputComponent v-model="userLoginData.kode_peserta" placeholder="Ketikan kode_peserta" />
              <div v-for="error in errorValidation.kode_peserta">
                <span class="text-xs text-red-400"> {{ error }}</span>
              </div>
            </div>
            <div class="">
              <Label for="password">Password</Label>
              <InputComponent v-model="userLoginData.password" type="password" placeholder="Ketikan password" />
              <div v-for="error in errorValidation.password">
                <span class="text-xs text-red-400"> {{ error }}</span>
              </div>
            </div>
            <div class="">
              <button
                class="inline-flex w-full mt-2 items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Masuk
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
