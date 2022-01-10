import { Button, Checkbox, TextField } from "@material-ui/core"
import type { NextPage } from "next"
import { useState } from "react"
import { Controller, useForm } from "react-hook-form"
import { checkRequired } from "../../common/validation"
import { Auth } from "../../components/Auth/Auth"
import { BaseLayout } from "../../components/Layout/BaseLayout"
import { ErrorText } from "../../components/Text/ErrorText"
import LoadingButton from "@mui/lab/LoadingButton"
import { useRouter } from "next/router"
import { createWordbookApi } from "../../api/wordbook"
import { FormControlLabel } from "@mui/material"
type FormData = {
  title: string
  is_public: boolean
}
const App: NextPage = () => {
  const [isSending, setIsSending] = useState<boolean>()
  const router = useRouter()

  const {
    control,
    handleSubmit,
    formState: { errors },
  } = useForm<FormData>()

  const onSubmit = async (inputs: FormData) => {
    setIsSending(true)
    try {
      console.log("hoge", inputs)
      await createWordbookApi(inputs)
      router.replace("/home")
    } catch (e) {
      console.log("[error]", e)
    }
    setIsSending(false)
  }

  return (
    <Auth>
      <BaseLayout>
        <h1 className="text-xl pt-10">単語帳を追加する</h1>
        <form onSubmit={handleSubmit(onSubmit)} className="mt-12">
          <div>
            <Controller
              name="title"
              control={control}
              defaultValue=""
              rules={{ validate: checkRequired }}
              render={({ field }) => (
                <TextField
                  {...field}
                  label="リストの名前"
                  variant="outlined"
                  color="secondary"
                  className="bg-white w-full rounded"
                />
              )}
            />
            <ErrorText error={errors.title} />
          </div>
          <div className="mt-2">
            <Controller
              name="is_public"
              control={control}
              defaultValue={true}
              render={({ field }) => (
                <FormControlLabel
                  control={<Checkbox {...field} defaultChecked />}
                  label="リストを公開する"
                />
              )}
            />
          </div>
          <div className="mt-8 flex justify-center">
            <Button type="button" variant="contained" onClick={() => router.back()}>
              キャンセル
            </Button>
            <LoadingButton type="submit" className="ml-4" loading={isSending} variant="contained">
              送信する
            </LoadingButton>
          </div>
        </form>
      </BaseLayout>
    </Auth>
  )
}

export default App
