import './bootstrap';
import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import {ZiggyVue} from '../../vendor/tightenco/ziggy'
import Layout from './Layouts/Layout.vue';

createInertiaApp({
  title: (title) => `VetGo ${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Layout 
    return page;
    
    //Se a página não tiver uma página padrão, ela irá receber o Layout padrão
    //Alteração feita para fazer o Layout ter a página como uma "child", fazendo a página estar dentro do layout e não o contrário
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Head', Head)
      .component('Link', Link)
      .mount(el)
  },
  progress: {
    color: "white",
    includeCSS: true,
    showSpinner: true,
  },
})