/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");
import forms from '@tailwindcss/forms';
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    ],
    safelist: [
        {
          pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
          variants: ['sm', 'md', 'lg', 'xl', '2xl']
        },
        {
          pattern: /bg-(amber|pink|green|yellow|lime|indigo|fuchsia|teal)-(500)/,
        },
      ],
  theme: {
    extend: {
        backgroundImage: {
            'hero-pattern': "linear-gradient(270deg,#fafafa 0,hsla(0,0%,98%,0))",
            //    'hero-pattern-l': "linear-gradient(0.25turn, #ffffff 0, #dbdbdb, hsla(0,0%,102%,0))"
            'hero-pattern-l': "linear-gradient(0.25turn, #ffffff 0, #c7c7c7, hsla(0,0%,102%,0))",
        },
        colors: {
            danger: colors.rose,
            primary: colors.purple,
            success: colors.green,
            warning: colors.yellow,
            custom: colors.purple,
            'light-blue' : '#396195',
            'strong-blue' : '#0c1c56',
            "theme-primary": "rgb(2, 132 ,199)",
            "theme-secondary": "#CB997E",
            "theme-grayish-blue": "#9194A1",
            "theme-dark-blue": "rgb(37, 43, 70)",
            "theme-dark-blue-tp": "rgba(37, 43, 70, 0.9)",
        },
    },
      container: {
          screens: {
              '2xl': '1280px',
          },
      },
      fontFamily : {
        russoOne : [ "'RussoOne-Regular' , sans-serif" ],
                baltica: ["Baltica KZ"],
                taurus: ["KZ Taurus"],
                mon: ["KZ_Mon_Amour_One"],
        tahoma: ["Tahoma"],
    },
  },
  plugins: [require('@tailwindcss/forms')],
}

