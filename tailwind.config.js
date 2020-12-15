const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', "Segoe UI", 'Roboto', "Helvetica Neue", 'Arial', "Noto Sans", 'sans-serif', "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"]
        },
        screens: {
            xs: {max: '575px'}, // Mobile (iPhone 3 - iPhone XS Max).
            sm: {min: '576px', max: '897px'}, // Mobile (matches max: iPhone 11 Pro Max landscape @ 896px).
            md: {min: '898px', max: '1199px'}, // Tablet (matches max: iPad Pro @ 1112px).
            lg: {min: '1200px'}, // Desktop smallest.
            xl: {min: '1159px'}, // Desktop widescreen.
        },
        borderColor: theme => ({
            ...theme('colors'),
            DEFAULT: '#e9e9e9',
            'primary': '#3490dc',
            'secondary': '#ffed4a',
            'danger': '#e3342f',
        }),
        colors: {
            transparent: 'transparent',
            black: colors.black,
            red: colors.red,
            header: '#1a1a1ae6',
            indigo: colors.indigo,
            cerulean: {
                50: '#f4fbfd',
                100: '#e8f7fc',
                200: '#c6eaf7',
                300: '#a4def3',
                400: '#60c5e9',
                500: '#1cace0',
                600: '#199bca',
                700: '#1581a8',
                800: '#116786',
                900: '#0e546e'
            },
            blue: colors.blue,
            white: colors.white,
            pink: {
                light: '#ff7ce5',
                DEFAULT: '#ff49db',
                dark: '#ff16d1',
            },
            green: colors.green,
            gray: colors.gray,
            border: {
                DEFAULT: '#222226',
            },
            footer: '#242729'
        },
        extend: {
            gridTemplateColumns: {
                'main': '72% 27%;',
                'list': '64px auto',
                'auto-fit': 'repeat(auto-fit, minmax(0, 1fr))',
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
