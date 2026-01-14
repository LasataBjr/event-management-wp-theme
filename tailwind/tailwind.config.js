const typographyConfig = require('./tailwind-typography.config.js');

module.exports = {
  content: [
      "./theme/**/*.php",       // All PHP files in your theme
      "./javascript/**/*.js", // All JS files]
    ], 
  theme: {
    extend: {
      typography: typographyConfig.theme.extend.typography,
    },
  },
  plugins: [require('@tailwindcss/typography')],
};
