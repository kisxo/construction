// import { InertiaProgress } from '@inertiajs/progress';
import { createInertiaApp } from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createSSRApp, DefineComponent, h } from 'vue';
import { renderToString } from 'vue/server-renderer';

// const appName = import.meta.env.VITE_APP_NAME || 'Sundaram Developers';

// InertiaProgress.init({
//     // The delay after which the progress bar will appear
//     // in milliseconds.
//     delay: 250,
  
//     // The color of the progress bar.
//     color: '#29d',
  
//     // Whether to include the default NProgress styles.
//     includeCSS: true,
  
//     // Whether the NProgress spinner will be shown.
//     showSpinner: true,
//   });

createServer(
    (page) =>
        createInertiaApp({
            page,
            render: renderToString,
            // title: (title) => (title ? `${title} - ${appName}` : appName),
            resolve: (name) =>
                resolvePageComponent(
                    `./pages/${name}.vue`,
                    import.meta.glob<DefineComponent>('./pages/**/*.vue'),
                ),
            setup: ({ App, props, plugin }) =>
                createSSRApp({ render: () => h(App, props) }).use(plugin),
        }),
    { cluster: true },
);

