import { createRouter, createWebHistory } from 'vue-router'
import LoginViewVue from '@/views/LoginView.vue'
import store from '@/store'
import HomeViewVue from '@/views/Peserta/HomeView.vue'
const router = createRouter({
  scrollBehavior(to, from, savedPosition) {
    return { top: 0, behavior: 'smooth' }
  },
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
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
      component: HomeViewVue,
      children: [
        {
          path: '/peserta',
          component: HomeViewVue
        },
        {
          path: '/peserta/mulai_ujian',
          component: HomeViewVue
        }
      ]
    }
  ]
})
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
