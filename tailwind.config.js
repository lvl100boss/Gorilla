/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'accent' : '#21b68b',
        'main-dark' : 'rgb(20, 20, 20)',
        'medium-dark' : 'rgb(30, 30, 30)',
        'light-dark' : 'rgb(40, 40, 40)',
        'lightest-dark' : 'rgb(50, 50, 50)',
        'footer' : '#181818'
      }
    },
  },
  plugins: [],
}