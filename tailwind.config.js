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
                'basis': '#0F172A',
                'gray': '#696969',
                'gray-100': '#f3f4f6',
                'light': '#B0AEAE',
                'green': '#18EB92',
                'red': '#EE4040',
                'border': '#E4E4E4',
                'background': '#F4F4F4'
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
