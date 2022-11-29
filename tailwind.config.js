/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.{html,js}"],
    theme: {
        extend: {
            screens: {
                'desktop': '1024px',
                // => @media (min-width: 1280px) { ... }
            },
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