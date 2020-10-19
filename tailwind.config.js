const {colors} = require('tailwindcss/defaultTheme');

module.exports = {
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
        extend: {
            colors: {
                yellow: {
                    ...colors.yellow,
                    '300': '#FFE394',
                    '400': '#FFD86A',
                    '500': '#f7c945',
                    '600': '#E9B217',
                    '700': '#B2860A',
                    '800': '#906A00',
                    '900': '#654B00',
                }
            }
        }
    },
    variants: {},
    plugins: []
}
