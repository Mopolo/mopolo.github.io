const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.disableNotifications();

mix.postCss('./resources/css/style.css', './public/css/style.css',
    tailwindcss('./tailwind.config.js')
);

mix.copyDirectory('./resources/img', './public/img');

mix.browserSync({
    proxy: 'cv2.test', // valet link
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
