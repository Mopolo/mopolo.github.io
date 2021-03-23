const mix = require('laravel-mix');

mix.disableNotifications();

mix.css('./resources/css/style.css', './public/css/style.css');

mix.copyDirectory('./resources/img', './public/img');

mix.browserSync({
    proxy: 'portfolio.test', // valet link
    notify: false,
    ui: false,
    files: [
        'resources/img/**/*.png',
        'resources/img/**/*.jpg',
        'resources/img/**/*.svg',
        'resources/css/style.css',
        'resources/views/**/*.twig',
    ]
});
