import { toast } from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'

function notify(text, type) {
  toast(text, {
    theme: 'colored',
    type: !type ? 'success' : type,
    dangerouslyHTMLString: true
  })
}

export { notify, toast }
