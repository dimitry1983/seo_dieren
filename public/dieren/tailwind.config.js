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
      screens: {
        'xl-custom': '1280px', // Custom breakpoint
      },
      padding: {
        '20p': '20%', // Define a 20% padding utility
      },
      colors: {
        primary: 'var(--primary)', 
        primaryLight: 'var(--primaryLight)',
        primaryDark: 'var(--primaryDark)',
        primaryDarker: 'var(--primaryDarker)',
        secondary: 'var(--secondary)',
        secondaryLight: 'var(--secondaryLight)',
        secondaryDark: 'var(--secondaryDark)',
        secondaryDarker: 'var(--secondaryDarker)'
      },
      animation: {
        spin: 'spin 1s linear infinite',  // Ensuring the spin animation is available
      },
    },
  },
  plugins: [
    require("./plugins/trigger-open"),
  ],
}

