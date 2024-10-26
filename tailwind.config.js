/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/**/*.php',  // Include all PHP files
    './src/**/*.html', // If you have HTML files
    './src/**/*.js',   // Include JS files if you have any
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1D4ED8',  // You can customize colors
        secondary: '#9333EA',
      },
    },
  },
  plugins: [],
}
