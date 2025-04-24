import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/vue3';
import Layout from './Components/Layout.vue';

createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue');
    const match = pages[`./Pages/${name}.vue`];
    const page = (await match() as { default: DefineComponent }).default;

    if (page.layout === undefined) {
      page.layout = Layout;
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .mount(el);
  },
  title: (title) => 'My App' + (title ? ` - ${title}` : ''),
})