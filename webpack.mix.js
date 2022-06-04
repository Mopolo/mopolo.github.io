const mix = require('laravel-mix');

mix
    .disableNotifications()
    .setPublicPath('public/')
    .postCss('resources/css/style.css', 'css', [
        require('tailwindcss'),
    ])
    .copyDirectory('resources/img', 'public/img');

if (mix.inProduction()) {
    mix.version();
    mix.disableNotifications();
}
