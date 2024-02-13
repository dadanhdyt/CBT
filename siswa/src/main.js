import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import {toast} from './lib/toast';
// window.addEventListener('blur',function(){
//     toast("Anda terdeteksi pindah tab! Mohon jangan pindah pindah tab selamat ujian berlangsung",{
//       type : "warning",
//     });
//   })
import VueToast from 'vue-toast-notification'
const app = createApp(App)
app.use(VueToast)
app.use(router)

app.mount('#app')
