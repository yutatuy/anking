import { api } from "."

export const loginApi = (params: { email: string; password: string }) => {
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

export const signupApi = (params: { name: string; email: string; password: string }) => {
  return api.post<[]>("/auth/create", params)
}

export const createUserPlayApi = (params: { count: number }) => {
  return api.post<[]>("/userPlay/create", params)
}
