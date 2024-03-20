/** @type {import('tailwindcss').Config} */
export default {
  content: ["./src/**/*.{html,js,blade.php}"],
  theme: {
    extend: {
      zIndex: {
        '-1': '-1',
      },
      flexGrow: {
        '5': '5'
      }
    },
  },
  plugins: [],
}

