const colors = require('tailwindcss/colors');

module.exports = {
    darkMode: 'class',
    purge: [
        './resources/**/*.twig',
        './resources/data/cv.json',
    ],
    theme: {
        colors: {
            white: colors.white,
            black: colors.black,
            gray: colors.coolGray,
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
            green: colors.green,
            orange: colors.orange,
            purple: colors.violet,
            blue: colors.blue,
            sky: colors.lightBlue,
            cyan: colors.cyan,
            indigo: colors.indigo,
            lime: colors.lime,
            emerald: colors.emerald,
            pink: colors.pink,
            rose: colors.rose,
        },
    },
    variants: {
        extend: {
            display: ['dark'],
        },
    }
}
