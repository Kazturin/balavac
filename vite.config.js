import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                 'resources/css/app.css',
                 'resources/js/app.js',
                 `resources/css/filament/admin/theme.css`,
                 `resources/css/botman.css`,
                 'resources/js/botman-web-widget.js'
                ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            // '@': path.resolve(__dirname, '/src')
            $fonts: resolve(__dirname,'public/fonts')
        }
    },
});
