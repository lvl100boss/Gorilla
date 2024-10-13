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
        // 'accent' : '#21b68b',
        'accent' : '#21b68b',
        'main-dark' : 'rgb(20, 20, 20)',
        'medium-dark' : 'rgb(30, 30, 30)',
        'light-dark' : 'rgb(40, 40, 40)',
        'lightest-dark' : 'rgb(50, 50, 50)',
        'footer' : '#181818'
      },
      fontFamily: {
        PSDisplay: ['Playfair Display', 'sans-serif'],
        PSDisplayItalic: ['Playfair Display', 'sans-serif'],
        Archivo: ['Archivo', 'sans-serif'],
      },
      gridTemplateColumns: {
        // Simple 16 column grid
        '16': 'repeat(16, minmax(0, 1fr))',

        // Complex site-specific column configuration
        'footer': '200px minmax(900px, 1fr) 100px',
      },cursor: {
        'grabbing': 'grabbing',
        'grab': 'grab',
      },
    },
  },
  plugins: [],
}