import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js"
      ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            scale: {
                '103': '1.03',
                '102': '1.02',

              },
              width: {
                '30': '7.5rem', // Adjust the value as needed
              },
        },
    },
   
    plugins: [require("tw-elements/dist/plugin.cjs"),require('@tailwindcss/forms')]

};
