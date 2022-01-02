import axios from "axios"
import Cookies from "js-cookie"

// REST API
export const api = axios.create({
  baseURL: process.env.API_URL,
  headers: {
    "Content-Type": "application/json",
  },
})

// Authorizationの設定
export const setAuthorization = () => {
  try {
    const token = Cookies.get("token")
    console.log("token", token)
    // @ts-ignore
    api.defaults.headers.Authorization = `Bearer ${token}`
  } catch (e) {
    console.log("[Error] token", e)
  }
}
