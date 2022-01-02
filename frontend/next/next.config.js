/** @type {import('next').NextConfig} */
const path = require("path")
const dotenv = require("dotenv-webpack")
module.exports = {
  tailwindcss: {},
  reactStrictMode: true,
  webpack: (config) => {
    config.plugins = config.plugins || []

    config.plugins = [
      ...config.plugins,

      // Read the .env file
      new dotenv({
        path: path.join(__dirname, "../../backend/.env"),
        systemvars: true,
      }),
    ]

    return config
  },
}
