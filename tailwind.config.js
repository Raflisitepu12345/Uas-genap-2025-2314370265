import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        library: {
          primary: '#4E342E',     // Cokelat tua (kayu)
          secondary: '#A1887F',   // Cokelat muda
          background: '#FFF8E1',  // Krem terang
          accent: '#6D4C41',      // Cokelat sedang
          greenleaf: '#81C784',   // Hijau daun
        },
      },
      fontFamily: {
        serif: ['Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
      },
    },
  },
  plugins: [],
}

