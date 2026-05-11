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
        // Ito ang nagtuturo kay Tailwind ng mga kulay mo
        'sidebar-dark': '#071907',      // Main background color (Dark Green)
        'sidebar-active': '#2d6a2d',    // Active item background (Medium Green)
        'sidebar-accent': '#4ade80',    // Bright green line on active state
        'sidebar-hover': 'rgba(255, 255, 255, 0.08)',
        'nav-gray': '#bbb',             // Default text color
      },
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
      },
      transitionDuration: {
        '350': '350ms', // Para sa 0.35s transition mo
      }
    },
  },
  plugins: [],
}