/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    screens: {
        sm: '480px',
        md: '768px',
        lg: '976px',
        xl: '1440px'
    },
    extend: {},
  },
  plugins: [
    require('tailwindcss-animated'),
    require('flowbite/plugin')({
        charts: true,
    }),
  ],
}

