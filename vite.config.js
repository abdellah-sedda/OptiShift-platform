import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/material-dashboard.css',
                'resources/css/nucleo-icons.css',
                'resources/css/nucleo-svg.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/material-dashboard.min.js',
                'resources/js/core/popper.min.js',
                'resources/js/core/bootstrap.min.js',
                'resources/js/plugins/perfect-scrollbar.min.js',
                'resources/js/plugins/smooth-scrollbar.min.js',
                'resources/js/plugins/chartjs.min.js',

            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            // @: __dirname, 'resources/js',
        },
    },
});
