/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./src/*.{html,php,ts,tsx,js,tsx}"],
  theme: {
    extend: 
    {
      colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'spts': {
        DEFAULT: '#052c54',
      },
    },
  },
},
  plugins: [],
}
