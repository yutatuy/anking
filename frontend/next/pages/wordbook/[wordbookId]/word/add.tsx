import { Button, TextField } from "@material-ui/core"
import type { NextPage } from "next"
import { useState } from "react"
import { Controller, useForm } from "react-hook-form"
import { Auth } from "../../../../components/Auth/Auth"
import { BaseLayout } from "../../../../components/Layout/BaseLayout"
import { ErrorText } from "../../../../components/Text/ErrorText"
import LoadingButton from "@mui/lab/LoadingButton"
import { useRouter } from "next/router"
import { createWordApi } from "../../../../api/word"

type FormData = {
  front_content: string
  back_content: string
}
const App: NextPage = () => {
  const [isSending, setIsSending] = useState<boolean>()
  const router = useRouter()
  const { wordbookId } = router.query
  const {
    control,
    handleSubmit,
    formState: { errors },
  } = useForm<FormData>()

  const onSubmit = async (inputs: FormData) => {
    setIsSending(true)
    try {
      await createWordApi({ wordbook_id: Number(wordbookId), ...inputs })
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
        <form onSubmit={handleSubmit(onSubmit)} className="mt-12">
          <div>
            <Controller
              name="front_content"
              control={control}
              defaultValue=""
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
                  inputProps={{ maxLength: 200 }}
                />
              )}
            />
            <ErrorText error={errors.front_content} />
          </div>
          <div className="mt-2">
            <Controller
              name="back_content"
              control={control}
              defaultValue=""
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
      </BaseLayout>
    </Auth>
  )
}

export default App
