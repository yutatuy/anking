import { api } from "."

export const login = (params: { email: string; password: string }) => {
  return api.post("/auth/login", params)
}
