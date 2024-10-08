import { createApp, h } from 'vue'
import { Link, createInertiaApp, Head } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'
import '../css/app.css'
const admin_arr = [
  'Agences/Index',
  'Users/Index',
  'Users/Create',
  'Users/Edit'
]
createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = ''
    if (admin_arr.includes(name)) {
      page = pages[`./Pages/Admin/${name}.vue`]
    } else {
      page = pages[`./Pages/${name}.vue`]
    }
    if (page.default.layout === undefined) {
        page.default.layout = Layout;
    }

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Head', Head)
      .component('Link', Link)
      .mount(el)
  },
  title: (title) => {
    return 'My App - ' + title
  },
  progress: {
    color: 'blue',
    showSpinner: true,
  },
})
