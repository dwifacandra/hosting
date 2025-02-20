import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './node_modules/preline/dist/*.js',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        { pattern: /^bg-/, },
        { pattern: /^text-/, }
    ],
    theme: {
        fontFamily: {
            sans: ['Roboto', 'sans-serif'],
            mono: ['Roboto Mono', 'monospace'],
        },
        extend: {
            fontSize: {
                'xxs': '0.625rem',
                'xs': '0.75rem',   // 9px (0.75 * 12)
                'sm': '0.875rem',  // 10.5px (0.875 * 12)
                'base': '1rem',    // 12px
                'lg': '1.125rem',  // 13.5px (1.125 * 12)
                'xl': '1.25rem',   // 15px (1.25 * 12)
                '2xl': '1.5rem',   // 18px (1.5 * 12)
                '3xl': '1.875rem', // 22.5px (1.875 * 12)
                '4xl': '2.25rem',  // 27px (2.25 * 12)
                '5xl': '3rem',     // 36px (3 * 12)
                '6xl': '4rem',     // 48px (4 * 12)
            },
            colors: {
                primary: {
                    DEFAULT: '#E6130C',
                    50: '#FFF1F1',
                    100: '#FFE0DF',
                    200: '#FFC6C4',
                    300: '#FF9D9A',
                    400: '#FF6560',
                    500: '#FF362F',
                    600: '#E6130C',
                    700: '#CC0F09',
                    800: '#A9100B',
                    900: '#8B1511',
                    950: '#4C0503'
                },
                secondary: {
                    DEFAULT: '#292929',
                    50: '#F8F8F8',
                    100: '#F2F2F2',
                    200: '#DCDCDC',
                    300: '#BDBDBD',
                    400: '#989898',
                    500: '#7C7C7C',
                    600: '#656565',
                    700: '#525252',
                    800: '#464646',
                    900: '#3D3D3D',
                    950: '#292929'
                },
                info: '#1e40af',
                success: '#047857',
                warning: '#ea580c',
                danger: '#b91c1c',
            },
            borderRadius: {
                'sm': '0.125rem',
                'md': '0.375rem',
                'lg': '0.5rem',
                'xl': '1rem',
                '2xl': '1.5rem',
                '3xl': '1.75rem',
                '4xl': '2rem',
            },
        },
    },
    plugins: [
        forms,
        require('tailwindcss-animated'),
        require('preline/plugin'),
        require('tailwind-scrollbar-hide')
    ],
};
