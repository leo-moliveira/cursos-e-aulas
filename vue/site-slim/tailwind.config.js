/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./components/**/*.{js,vue,ts,tsx}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./nuxt.config.{js,ts}",
    "./app.vue",
  ],
  mode: "jit",
  theme: {
    extend: {
      textColor: {
        slim: {
          "100": "#96874C",
          "200": "#e1d5c3",
        }
      },
      backgroundColor: {
        slim: {
          "100": "#96874C",
          "200": '#e1d5c3'
        }
      }
    },
  },
  plugins: [],
}
