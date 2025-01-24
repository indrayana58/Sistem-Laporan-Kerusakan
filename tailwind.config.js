/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            raleway: ["Raleway"],
            openSans: ["Open Sans"],
            montserrat: ["montserrat"],
        },
        extend: {
            colors: {
                darkGreen: "#032221",
                stone: "#7D7D7D",
                pine: "#06302B",
                pistachio: "#AACBC4",
                forest: "#095544",
            },
        },
    },
    plugins: [],
};
