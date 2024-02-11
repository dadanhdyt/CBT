import { reactive } from 'vue'
const store = reactive({
  token: localStorage.getItem('_token'),
  API_ENDPOINT: 'http://192.168.43.50:8000',
  page_loading: false,
  setPageLoading(loading) {
    return (this.page_loading = loading)
  },
  is_login() {
    return this.token ? true : false
  },
  setAuthToken(token) {
    this.token = token
    localStorage.setItem('_token', this.token)
  }
})

export default store
