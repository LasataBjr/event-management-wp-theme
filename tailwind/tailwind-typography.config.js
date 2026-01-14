const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  theme: {
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('colors.gray.800'),
            a: {
              color: theme('colors.blue.600'),
              textDecoration: 'underline',
              '&:hover': {
                color: theme('colors.blue.800'),
              },
            },
            h1: {
              fontWeight: '700',
              fontFamily: theme('fontFamily.sans').join(', '),
            },
            h2: { fontWeight: '600' },
            h3: { fontWeight: '500' },
            p: { marginBottom: '1rem' },
            pre: {
              backgroundColor: theme('colors.gray.900'),
              color: theme('colors.gray.100'),
              padding: '1rem',
              borderRadius: '0.5rem',
              overflowX: 'auto',
            },
            blockquote: {
              borderLeftColor: theme('colors.gray.300'),
              borderLeftWidth: '4px',
              paddingLeft: '1rem',
              color: theme('colors.gray.700'),
            },
            img: { borderRadius: '0.5rem' },
          },
        },
      }),
    },
  },
  plugins: [require('@tailwindcss/typography')],
};
