import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/app.js',
                    'resources/js/custom/dataTables/clients_indexTable.js',
                    'resources/js/custom/searches/client_search.js',
                    'resources/js/custom/flatpickr/event_date_quote.js',
                    'node_modules/bootstrap/dist/css/bootstrap.min.css'],

            refresh: true,
        }),
    ],
});
