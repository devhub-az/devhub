const colors = require('tailwindcss/colors')

module.exports = {
    purge: {
        content: [
            './resources/views/**/*.blade.php',
        ]
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
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
            blue: {
                light: '#4791db',
                DEFAULT: '#3d84a8',
                dark: '#115293',
                button: '#3d84a8',
            },
            white: colors.white,
            pink: {
                light: '#ff7ce5',
                DEFAULT: '#ff49db',
                dark: '#ff16d1',
            },
            gray: colors.gray,
            border: {
                DEFAULT: '#222226',
            }
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
