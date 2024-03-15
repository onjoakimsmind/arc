let mix = require('laravel-mix')
let path = require('path')
let tailwindcss = require('tailwindcss')

mix
  .js('src/resources/js/app.js', 'public/app.js')
  .js('src/resources/js/page.js', 'public/page.js')
  .setPublicPath('public')
  .postCss('src/resources/css/app.css', 'dist', [tailwindcss('tailwind.config.js')])
  .webpackConfig({
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'src/resources/js/'),
      },
    },
    devServer: {
      server: 'https',
      port: '8079'
    }
  })
  .options({
    hmrOptions: {
      host: 'localhost',
      port: '8079'
    }
  })
  .copy('public', '../../../public/vendor/arc')
  .version()