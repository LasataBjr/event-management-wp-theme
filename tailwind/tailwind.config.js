const typographyConfig = require('./tailwind-typography.config.js');

module.exports = {
  content: [
      "./theme/**/*.php",       // All PHP files in your theme
      "./javascript/**/*.js", // All JS files]
    ], 
  theme: {
    extend: {
      typography: typographyConfig.theme.extend.typography,

      colors: {
        'tt-light-bg': '#EBE7E2', // Main background/light neutral
        'tt-pink-accent': '#E8C7CD', // Accent color
        'tt-white': '#F9F9F9', // Primary white
        'tt-dark-navy': '#0D1F31', // Main text/dark accent
      },

      fontFamily: {
        'heading': ['Magoa', 'serif'],
        'body': ['Rethink Sans', 'sans-serif'],
      },
    },
  },
  plugins: [require('@tailwindcss/typography')],
};
