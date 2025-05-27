/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: '#2E256F',
        secondary: '#5D4FC4',
        secondaryLight: '#9990DA',
      }
    },
  },
  plugins: [
    require("./plugins/trigger-open"),
  ],
}

