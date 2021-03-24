const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        fontFamily: {
            sans: ['inter', 'Roboto', '-apple-system', 'BlinkMacSystemFont', "Segoe UI", 'Helvetica', "Apple Color Emoji", 'Arial, sans-serif', "Segoe UI Emoji", "Segoe UI Symbol"]
        },
        screens: {
            xs: {max: '575px'}, // Mobile (iPhone 3 - iPhone XS Max).
            sm: {min: '576px', max: '897px'}, // Mobile (matches max: iPhone 11 Pro Max landscape @ 896px).
            md: {min: '898px', max: '1020px'}, // Tablet (matches max: iPad Pro @ 1112px).
            lg: {min: '1020px'}, // Desktop smallest.
            xl: {min: '1020px'}, // Desktop widescreen.
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
            yellow: colors.yellow,
            cerulean: {
                default: '#095977',
                '100': '#0D84AF',
                '200': '#0C79A1',
                '300': '#0B6F93',
                '400': '#0A6485',
                '500': '#095c79',
                '600': '#084F68',
                '700': '#07445A',
                '800': '#06394C',
                '900': '#052E3E'
            },
            blue: colors.blue,
            white: colors.white,
            pink: {
                light: '#hff7ce5',
                DEFAULT: '#ff49db',
                dark: '#ff16d1',
            },
            green: colors.green,
            gray: colors.gray,
            border: {
                DEFAULT: '#222226',
            },
            wall: '#f4f4f4',
            footer: '#111',
            fbtop: '#333',
            dwall: '#141618',
            dpaper: '#1d2023',
            afooter: '#f9f9fb',
        },
        extend: {
            width: {
                'left': '70%',
                'right': '30%',
            },
            boxShadow: {
                rwhite: 'inset 40px 0 25px -25px #aaa',
                rblack: 'inset 40px 0 25px -25px #333',
                lwhite: 'inset -40px 0 25px -25px #aaa',
                lblack: 'inset -40px 0 25px -25px #333',
            },
            gridTemplateColumns: {
                'main': '72% 27%;',
                'settings': '30% 69%',
                'list': '64px auto',
                'auto-fit': 'repeat(auto-fit, minmax(0, 1fr))',
            }
        },
    },
    variants: {
        extend: {
            display: ['dark'],
            borderWidth: ['hover']
        },
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
