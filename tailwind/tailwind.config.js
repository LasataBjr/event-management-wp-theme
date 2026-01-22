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

        keyframes: {
          'bounce-loop-up': {
            '0%': { transform: 'translateY(0)' },
            '50%': { transform: 'translateY(-15%)' },
            '100%': { transform: 'translateY(0)' },
          },
  
          'bounce-loop-down': {
            '0%': { transform: 'translateY(0)' },
            '50%': { transform: 'translateY(15%)' },
            '100%': { transform: 'translateY(0)' },
          },
          'heartbeat': {
            '0%, 100%': { transform: 'scale(100%)' },
            '50%': { transform: 'scale(120%)' },
          },
          celebrate: {
            '0%, 100%': {
              transform: 'scale(.95) rotate(0deg)',
              boxShadow: '0 0 0 0 rgba(0, 154, 114, 0.1), 0 0 0 0 rgba(0, 162, 114, 0.1)',
            },
            '25%': {
              transform: 'scale(1.01) rotate(5deg)',
              boxShadow: '0 0 20px 10px rgba(0, 154, 114, 0.2), 0 0 30px 15px rgba(0, 162, 114, 0.2)',
            },
            '50%': {
              transform: 'scale(1.03) rotate(-5deg)',
              boxShadow: '0 0 25px 12px rgba(0, 154, 114, 0.3), 0 0 35px 20px rgba(0, 162, 114, 0.3)',
            },
            '75%': {
              transform: 'scale(1.05) rotate(3deg)',
            boxShadow: '0 0 30px 15px rgba(0, 154, 114, 0.3), 0 0 40px 25px rgba(0, 162, 114, 0.3)',
            },
          },
        },

        animation: {
          'bounce-loop-up': 'bounce-loop-up 1s ease-in-out infinite',
          'bounce-loop-down': 'bounce-loop-down 1s ease-in-out infinite',
          'heartbeat': 'heartbeat 1.5s ease-in-out infinite',
          'celebrate': 'celebrate 2s ease-in-out infinite',
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