/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: ["Inter"],
        },
        extend: {
            fontFamily: {
                inter: ["Inter"],
            },
            maxWidth: {
                main: "1179px",
            },
            colors: {
                "ticykit-primary": "#F8811D",
                "ticykit-secondary": "#64748B",
                "ticykit-bg": "#F6F7F8",
                "ticykit-bg-border": "#EDEDED",
                "ticykit-bg-blue": "#196ECD",
            },
            backgroundImage: {
                'waves': "url('/img/kerjasama/waves.svg')",
            },
        },
    },
    plugins: [],
};
