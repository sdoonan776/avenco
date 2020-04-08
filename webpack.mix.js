const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

const webpack = require('webpack');

require('laravel-mix-imagemin');

mix.disableNotifications();

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/components/stripe.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .imagemin(
        'resources/assets/img/**', 'public/img',
        {
            optipng: {
                optimizationLevel: 5
            },
            jpegtran: null,
            plugins: [
                require('imagemin-mozjpeg')({
                    quality: 100,
                    progressive: true,
                }),
            ],
        }
    )
   .options({
      processCssUrls: false,
      postCss: [ tailwindcss('./tailwind.config.js') ]
   })
   .webpackConfig({
      plugins: [
        new webpack.ProvidePlugin({
          $: 'jquery',
          jQuery: 'jquery',
          'window.jQuery': 'jquery'
        }),
      ],
   })
   .version();
