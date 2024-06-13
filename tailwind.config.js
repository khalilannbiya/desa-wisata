import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                montserrat: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'deep-koamaru': {
                    50: '#f2f4ff',
                    100: '#e8ecff',
                    200: '#d4dcff',
                    300: '#b1bcff',
                    400: '#8592ff',
                    500: '#535cff',
                    600: '#3130f7',
                    700: '#241ee3',
                    800: '#1d19be',
                    900: '#1b169c',
                    950: '#0e0f83',
                },
            },
        },
    },

    plugins: [forms],
};
