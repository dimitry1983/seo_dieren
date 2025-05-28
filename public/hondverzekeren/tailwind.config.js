/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "../../resources/**/*.php",
    "../../resources/views/**/*.blade.php", // Add this line for Blade files
    "../../resources/js/**/*.js",           // Optional: Include JavaScript files in resources/js if used
    "../../resources/css/**/*.css",   
  ],
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

