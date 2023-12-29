/** @type {import('tailwindcss').Config} */
export default {
  purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  content: [],
  theme: {
    extend: {
      colors: {
        "custom-bg" : "#121212",
        "custom-bg-light" : "#282828",
        "custom-accent" : "#7a5af5",
        "custom-accent-light" : "#9171f8",
      }
    },
  },
  plugins: [],
}

