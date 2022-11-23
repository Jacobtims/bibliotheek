const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#18CFEB',
                'primary-dark': '#06B6D4',
                'primary-light': '#A3ECF7',
                'basis': '#0F172A',
                'gray': '#696969',
                'light': '#B0AEAE',
                'green': '#18EB92',
                'green-dark': '#0bd982',
                'red': '#EE4040',
                'red-dark': '#e03434',
                'border': '#E4E4E4',
                'background': '#F4F4F4',
                'table-row': '#F6F8FA',

                'gray-100': '#f3f4f6',
                'gray-200': '#e5e7eb',
                'gray-300': '#d1d5db',
                'gray-400': '#9ca3af',
                'red-600': '#dc2626',
                'red-100': '#fee2e2',
                'red-700': '#b91c1c',
                'green-100': '#dcfce7',
                'green-700': '#15803d',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
