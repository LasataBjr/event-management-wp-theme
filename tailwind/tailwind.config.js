const typographyConfig = require('./tailwind-typography.config.js');

module.exports = {
  content: [
      "./theme/**/*.php",       // All PHP files in your theme
      "./javascript/**/*.js", // All JS files]
    ],
  
  container: {
			center: true,
			padding: '1rem',
		},

    safelist: [
      'btn-primary',
      'btn-secondary',
      'btn-send-message',
      'form-input',
      'form-label',
    ],
    
    theme: {
      extend: {
        colors: {
          'tt-light-bg': '#EBE7E2',      // Main background/light neutral
          'tt-pink-accent': '#E8C7CD',   // Accent color
          'tt-white': '#F9F9F9',         // Primary white
          'tt-dark-navy': '#0D1F31',     // Main text/dark accent
        },
  
        fontFamily: {
          'heading': ['Playfair Display', 'serif'],  // Using Playfair Display instead of Magoa
          'body': ['Rethink Sans', 'sans-serif'],
        },
  
        typography: {
          DEFAULT: {
            css: {
              color: '#0D1F31',
              a: {
                color: '#0D1F31',
                '&:hover': {
                  color: '#E8C7CD',
                },
              },
              h1: {
                fontFamily: 'Playfair Display, serif',
                color: '#0D1F31',
              },
              h2: {
                fontFamily: 'Playfair Display, serif',
                color: '#0D1F31',
              },
              h3: {
                fontFamily: 'Playfair Display, serif',
                color: '#0D1F31',
              },
            },
          },
        },
  
        spacing: {
          '128': '32rem',
          '144': '36rem',
        },
  
        borderRadius: {
          'arch': '50% 50% 50% 50% / 60% 60% 40% 40%',
        },
      },
    },
    
    plugins: [
      require('@tailwindcss/typography')      
    ],

};