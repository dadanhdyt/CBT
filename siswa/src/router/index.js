import { createRouter, createWebHistory } from 'vue-router'
import LoginViewVue from '@/views/LoginView.vue'
import store from '@/store'
import HomeViewVue from '@/views/Peserta/HomeView.vue'
import PesertaTemplateVue from '@/components/PesertaTemplate.vue'
import MeView from '@/views/Peserta/MeView.vue'
import StartUjianVue from '@/views/Peserta/StartUjian.vue'
import ConfirmVue from '@/views/Peserta/Confirm.vue'
const router = createRouter({
  scrollBehavior(to, from, savedPosition) {
    return { top: 0, behavior: 'smooth' }
  },
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: LoginViewVue,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginViewVue,
      beforeEnter: function (to, from, next) {
        if (!store.is_login()) {
          next()
        } else {
          next('/peserta')
          next()
        }
      }
    },
    {
      path: '/peserta',
      meta: {
        must_login: true
      },
      name: 'autenticated',
      component: PesertaTemplateVue,
      children: [
        {
          path: '/peserta/me',
          component: MeView
        },
        {
          path: '/peserta',
          component: HomeViewVue
        },
        {
          path: '/peserta/exam/:jadwal_id/:bank_soal_id',
          name: "start_ujian",
          component: StartUjianVue,
        },
        {
          path:'/peserta/exam/confirm/:jadwal_id',
          name : "confirm",
          component : ConfirmVue
        }
      ]
    }
  ]
});
router.beforeEach(function (to, from, next) {
  if (to.meta.must_login) {
    if (!store.is_login()) {
      next('/login')
    } else {
      next()
    }
  } else {
    next()
  }
})

export default router
