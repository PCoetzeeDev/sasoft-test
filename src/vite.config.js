import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

const host = 'sasoft-test-app';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host,
        hmr: { host },
        // https: {
        //     key: fs.readFileSync(`/certs/localkey.pem`),
        //     cert: fs.readFileSync(`/certs/localcert.pem`),
        // },
    },
});
