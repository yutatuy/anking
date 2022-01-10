import { api } from "."
import { Word } from "../types/word"

export const createWordApi = (params: {
  wordbook_id: number
  front_content: string
  back_content: string
}) => {
  return api.post<[]>("/word/create", params)
}

export const updateWordApi = (params: {
  id: number
  front_content: string
  back_content: string
}) => {
  return api.post<[]>("/word/update", params)
}

export const fetchWordApi = (params: { id: number }) => {
  return api.get<{ data: { word: Word } }>(`/word/fetch?id=${params.id}`)
}

export const fetchWordsByWordbookIdApi = (params: { wordbook_id: number }) => {
  return api.get<{
    data: { words: Word[] }
  }>(`/word/fetchByWordbookId?wordbook_id=${params.wordbook_id}`)
}
