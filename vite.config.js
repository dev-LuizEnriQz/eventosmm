import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/app.js',
                    'resources/js/custom/dataTables/clients_indexTable.js',
                    'node_modules/bootstrap/dist/css/bootstrap.min.css'],

            refresh: true,
        }),
    ],
});
