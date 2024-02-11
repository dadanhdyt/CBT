import axios from 'axios'

import store from '@/store'
import router from './router'

const $api = axios.create({
  baseURL: store.API_ENDPOINT + '/api/v2',
  headers: {
    Accept: 'application/json'
  }
})
$api.interceptors.request.use(
  function (config) {
    config.headers.Authorization = `Bearer ${store.token}`
    return config
  },
  function (error) {
    return Promise.reject(error)
  }
)

$api.interceptors.response.use(
  function (response) {
    return response
  },
  (error) => {
    if (error.response.status === 401) {
      new Promise(function (resolve, rejected) {
        delete localStorage._token
        localStorage.removeItem('token')
        resolve()
      }).then((e) => {
        store.token = localStorage.getItem('_token')
        router.push({
          name: 'login'
        })
      })
    }
    return Promise.reject(error)
  }
)

const $api1 = axios.create({
  baseURL: store.API_ENDPOINT
})

export { $api, $api1 }
