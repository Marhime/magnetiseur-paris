import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Source Sans Pro", ...defaultTheme.fontFamily.sans],
                serif: ["Playfair Display", ...defaultTheme.fontFamily.serif],
            },
            colors: {
                darkGray: "#6f6f71",
                lightGray: "#a0a0a2",
            },
        },
    },

    plugins: [forms],
};
