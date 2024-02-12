import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            scale: {
                "-1": "-1",
            },
            screens: {
                xs: "380px",
                "bs-lg": "990px"
            },
            colors: {
                transparent: "transparent",
                current: "currentColor",
                white: "#ffffff",
                midnight: "#121063",
                metal: "#565584",
                tahiti: "#3ab7bf",
                silver: "#ecebff",
                "bubble-gum": "#ff77e9",
                bermuda: "#78dcca",
                primary: "#c357f9",
                "primary-light": "#c357f9",
                "primary-dark": "rgb(162 67 209) 100%)",
                secondary: "#1dcdfe",
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
