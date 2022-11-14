import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/all.min.css',
                'resources/js/all.min.js',
                'resources/js/libs/freakflags/freakflags.css',
            ],
            refresh: true,
        }),
    ],
});
