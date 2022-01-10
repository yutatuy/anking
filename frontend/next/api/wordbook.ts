import { api } from "."
import { Wordbook } from "../types/wordbook"

export const fetchWordbooksApi = () => {
  return api.get<{
    data: {
      wordbooks: Wordbook[]
    }
  }>("/wordbook/fetchAll")
}

export const fetchWordbookApi = (params: { id: string }) => {
  return api.get<{
    data: {
      wordbook: Wordbook
    }
  }>(`/wordbook/fetch?id=${params.id}`)
}

export const createWordbookApi = (params: { title: string; is_public: boolean }) => {
  return api.post<[]>("/wordbook/create", params)
}

export const updateWordbookApi = (params: { id: number; title: string; is_public: boolean }) => {
  return api.post<[]>("/wordbook/update", params)
}

export const deleteWordbookApi = (params: { id: number }) => {
  return api.post<[]>("/wordbook/delete", params)
}
