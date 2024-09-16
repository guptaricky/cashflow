import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            overlay: false, // Disable the error overlay
        },
    },
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                // 'resources/js/app.js',

                // theme css
                'resources/assets/js/layout.js',
                'resources/assets/css/bootstrap.min.css',
                'resources/assets/css/icons.min.css',
                'resources/assets/css/app.min.css',
                'resources/assets/css/custom.min.css',
                'resources/assets/libs/gridjs/theme/mermaid.min.css',
                
                'resources/assets/libs/bootstrap/js/bootstrap.bundle.min.js',
                'resources/assets/libs/simplebar/simplebar.min.js',
                'resources/assets/libs/node-waves/waves.min.js',
                'resources/assets/libs/feather-icons/feather.min.js',
                'resources/assets/js/pages/plugins/lord-icon-2.1.0.js',
                'resources/assets/js/plugins.js',
                'resources/assets/js/pages/form-wizard.init.js',
                'resources/js/app.js'

            ],
            refresh: true,
        }),
    ],
});
