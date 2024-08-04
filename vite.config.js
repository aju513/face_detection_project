import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
            buildDirectory: 'build',
        }),
    ],
    // build: {
    //     manifest: true,
    //     // other options
    //     sourcemap: false,
    // },
});
