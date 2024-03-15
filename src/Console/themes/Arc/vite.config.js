import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
  plugins: [
    laravel({
      input: ['css/app.css', 'js/app.js'],
      refresh: true,
    }),
  ],
});
