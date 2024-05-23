/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["index.html"],
  theme: {
    extend: {
      colors: {
        primaryRed: "hsl(0, 100%, 68%)",
        vdBlue: "hsl(230, 29%, 20%)",
        dgBlue: "hsl(230, 11%, 40%)",
        GrayishBlue: "hsl(231, 7%, 65%)",
        lGrayishBlue: "hsl(207, 33%, 95%)",
      },
      fontFamily: {
        barlow: ["Barlow"],
        barlowCon: ["Barlow Condensed"],
      },
    },
  },
  plugins: [],
};
