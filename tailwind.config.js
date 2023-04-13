/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/js/*.js',
        './resources/css/*.css'
    ],
    theme: {
        extend: {},
    },
    plugins: [require('daisyui')],
}
