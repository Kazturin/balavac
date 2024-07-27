import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
const colors = require("tailwindcss/colors");
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-tiptap-editor/resources/**/*.blade.php',
    ],
//     theme: {
//         extend: {
//             colors: { 
//                 danger: colors.rose,
//                 primary: colors.gray,
//                 success: colors.green,
//                 warning: colors.yellow,
//             }, 
//         },
//     },
 }
