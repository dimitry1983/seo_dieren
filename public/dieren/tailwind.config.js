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
        primary: '#009999', 
        primaryLight: '#00CCCC', 
        primaryDark: '#3E8383',
        primaryDarker: 'var(--primaryDarker)',
        secondary: 'var(--secondary)',
        secondaryLight: 'var(--primaryLight)',
        secondaryDark: 'var(--primaryDark)',
        secondaryDarker: 'var(--primaryDarker)'
      }
    },
  },
  plugins: [
    require("./plugins/trigger-open"),
  ],
}

