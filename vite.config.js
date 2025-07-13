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
                    'node_modules/bootstrap/dist/css/bootstrap.min.css',
                    'resources/js/custom/dataTables/quotes_indexTable.js',
                    'resources/js/custom/fullcalendar/calendar_event.js',
                    'resources/js/custom/dataTables/depositsAccountsTable.js',
                    'resources/js/custom/searches/clientQuote_search.js',
                    'resources/js/custom/modal/registerDeposit.js',
                    'resources/js/custom/modal/depositHistory.js',
                    'resources/css/custom/social_icons.css',
                    'resources/css/custom/hero_section.css'
            ],
            refresh: true,
        }),
    ],
});
