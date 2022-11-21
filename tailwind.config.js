/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.{html,js}"],
    theme: {
        extend: {
            colors: {
                'header': '#67bcb3',
            },
            fontFamily: {
                'title': ['Roboto', 'system-ui']
            },
        },
    },
    plugins: [],
}