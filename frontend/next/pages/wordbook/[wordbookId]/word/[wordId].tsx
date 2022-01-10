import { Button, TextField } from "@material-ui/core"
import type { NextPage } from "next"
import { useEffect, useState } from "react"
import { Controller, useForm } from "react-hook-form"
import { Auth } from "../../../../components/Auth/Auth"
import { BaseLayout } from "../../../../components/Layout/BaseLayout"
import { ErrorText } from "../../../../components/Text/ErrorText"
import LoadingButton from "@mui/lab/LoadingButton"
import { useRouter } from "next/router"
import { fetchWordApi, updateWordApi } from "../../../../api/word"
import { data } from "autoprefixer"
import { Word } from "../../../../types/word"
import { BaseCircular } from "../../../../components/Circular/BasicCircular"

type FormData = {
  front_content: string
  back_content: string
}
const App: NextPage = () => {
  const [isLoading, setIsLoading] = useState<boolean>()
  const [isSending, setIsSending] = useState<boolean>()
  const [word, setWord] = useState<Word>()
  const router = useRouter()
  const { wordbookId, wordId } = router.query
  const {
    control,
    handleSubmit,
    formState: { errors },
  } = useForm<FormData>()

  useEffect(() => {
    const init = async () => {
      setIsLoading(true)
      try {
        const { data } = await fetchWordApi({ id: Number(wordId) })
        console.log("data", data)
        setWord(data.data.word)
      } catch (e) {
        console.log("[Error] fetchWordApi", e)
      }
      setIsLoading(false)
    }
    init()
  }, [])

  const onSubmit = async (inputs: FormData) => {
    setIsSending(true)
    try {
      await updateWordApi({ id: Number(wordId), ...inputs })
      router.replace(`/wordbook/${wordbookId}`)
    } catch (e) {
      console.log("[error]", e)
    }
    setIsSending(false)
  }

  return (
    <Auth>
      <BaseLayout>
        <h1 className="text-xl pt-10">単語を追加する</h1>
        {isLoading ? (
          <BaseCircular />
        ) : (
          <form onSubmit={handleSubmit(onSubmit)} className="mt-12">
            <div>
              <Controller
                name="front_content"
                control={control}
                defaultValue={word?.front_content}
                rules={{
                  validate: (value: string) =>
                    value.length <= 500 ? true : "500文字以内で入力してください",
                }}
                render={({ field }) => (
                  <TextField
                    {...field}
                    label="表"
                    variant="outlined"
                    color="secondary"
                    multiline
                    rows={5}
                    className="mt-5 bg-white w-full"
                    inputProps={{ maxLength: 500 }}
                  />
                )}
              />
              <ErrorText error={errors.front_content} />
            </div>
            <div className="mt-2">
              <Controller
                name="back_content"
                control={control}
                defaultValue={word?.back_content}
                rules={{
                  validate: (value: string) =>
                    value.length <= 500 ? true : "500文字以内で入力してください",
                }}
                render={({ field }) => (
                  <TextField
                    {...field}
                    label="裏"
                    variant="outlined"
                    color="secondary"
                    multiline
                    rows={5}
                    className="mt-5 bg-white w-full"
                    inputProps={{ maxLength: 500 }}
                  />
                )}
              />
              <ErrorText error={errors.back_content} />
            </div>
            <div className="mt-8 flex justify-center">
              <Button
                type="button"
                variant="contained"
                onClick={() => router.replace(`/wordbook/${wordbookId}`)}
              >
                キャンセル
              </Button>
              <LoadingButton type="submit" className="ml-4" loading={isSending} variant="contained">
                作成
              </LoadingButton>
            </div>
          </form>
        )}
      </BaseLayout>
    </Auth>
  )
}

export default App
