const colors = require('tailwindcss/colors');

module.exports = {
    darkMode: 'class',
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
        defaultLineHeights: true,
        standardFontWeights: true
    },
    purge: [
        './resources/**/*.twig'
    ],
    theme: {
        colors: {
            white: colors.white,
            black: colors.black,
            gray: colors.blueGray,
            yellow: {
                ...colors.yellow,
                '300': '#FFE394',
                '400': '#FFD86A',
                '500': '#f7c945',
                '600': '#E9B217',
                '700': '#B2860A',
                '800': '#906A00',
                '900': '#654B00',
            },
        },
    },
    variants: {
        extend: {
            display: ['dark'],
        },
    },
    plugins: []
}
