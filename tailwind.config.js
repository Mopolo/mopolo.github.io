const colors = require('tailwindcss/colors');

module.exports = {
    plugins: [
        require('@tailwindcss/typography'),
    ],
    darkMode: 'class',
    content: [
        './resources/**/*.twig',
        './resources/data/cv.json',
        './resources/i18n/*.xlf',
    ],
}
