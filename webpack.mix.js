const mix = require('laravel-mix');

mix
    .disableNotifications()
    .setPublicPath('public/')
    .postCss('resources/css/style.css', 'css', [
        require('tailwindcss'),
    ])
    .copyDirectory('resources/img', 'public/img')
    .browserSync({
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

if (mix.inProduction()) {
    mix.version();
}
