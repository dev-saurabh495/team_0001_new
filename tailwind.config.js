import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
                heading: ["Cinzel", ...defaultTheme.fontFamily.serif],
            },

            colors: {
                // Core brand
                navy: {
                    DEFAULT: "#0D1B2A", // Primary / dark bg
                    light: "#1B263B", // Secondary / dark surface
                },
                gold: {
                    DEFAULT: "#D4AF37", // Accent (large elements, icons, borders)
                    dark: "#B8941F", // Accent on light backgrounds (better contrast)
                },

                // Semantic tokens — use these in components instead of raw colors
                background: {
                    DEFAULT: "#F8FAFC", // light bg
                    dark: "#0D1B2A", // dark bg
                },
                surface: {
                    DEFAULT: "#FFFFFF", // light surface (cards, panels)
                    dark: "#1B263B", // dark surface
                },
                "text-primary": {
                    DEFAULT: "#0D1B2A", // light mode text
                    dark: "#FFFFFF", // dark mode text
                },
                "text-secondary": {
                    DEFAULT: "#475569", // light mode secondary text
                    dark: "#CBD5E1", // dark mode secondary text
                },
                "border-subtle": {
                    DEFAULT: "#E2E8F0", // light mode border
                    dark: "rgba(255,255,255,0.10)", // dark mode border
                },
            },

            boxShadow: {
                gold: "0 0 0 1px rgba(212,175,55,0.35)",
                "gold-lg": "0 10px 30px -10px rgba(212,175,55,0.25)",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
