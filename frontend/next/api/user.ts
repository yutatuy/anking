import { api } from "."

export const login = (params: { email: string; password: string }) => {
  return api.post<{
    data: {
      status: string
      results: {
        accessToken: string
        tokenType: "bearer"
        expiresIn: 3600
      }
    }
  }>("/auth/login", params)
}

export const getCurrentUser = () => {
  return api.get<{
    id: number
    name: string
    email: string
    email_verified_at: null
    created_at: null
    updated_at: null
  }>("/auth/me")
}
