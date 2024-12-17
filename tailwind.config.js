import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "node_modules/preline/dist/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                comfortaa: ["Comfortaa", ...defaultTheme.fontFamily.sans],
                poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#F4F4EF",
                secondary: {
                    100: "#EE8DB8",
                    200: "#EC83B2",
                    300: "#EA71A7",
                    400: "#E75F9C",
                    500: "#E44E91",
                    600: "#E23C86",
                    700: "#DF2A7C",
                    800: "#D52071",
                    900: "#C31D68",
                },
                // "#C66A93",
                // EE8DB8
                tertiary: "#FFC124",
            },
            boxShadow: {
                custom: "3px 3px 0px 0px #000", // Menambahkan shadow kustom
            },
        },
    },

    plugins: [forms, require("preline/plugin")],
};
