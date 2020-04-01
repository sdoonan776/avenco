const mix = require('laravel-mix');

require('laravel-mix-imagemin');

mix.disableNotifications();

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/stripe.js', 'public/js')
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
