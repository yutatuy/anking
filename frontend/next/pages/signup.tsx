import { TextField } from "@material-ui/core"
import { LoadingButton } from "@mui/lab"
import type { NextPage } from "next"
import { useRouter } from "next/router"
import { useState } from "react"
import { Controller, useForm } from "react-hook-form"
import { signupApi } from "../api/user"
import { checkEmail, checkRequired } from "../common/validation"
import { BaseLayout } from "../components/Layout/BaseLayout"
import { ErrorText } from "../components/Text/ErrorText"

export type FormData = {
  name: string
  email: string
  password: string
}
const App: NextPage = () => {
  const router = useRouter()

  const [isSending, setIsSending] = useState<boolean>(false)
  const {
    control,
    handleSubmit,
    formState: { errors },
  } = useForm<FormData>()

  const onSubmit = async (inputs: FormData) => {
    setIsSending(true)
    try {
      console.log("inputs", inputs)
      await signupApi(inputs)
      router.replace("/login")
    } catch (e) {
      console.log("[Error]", e)
    }
    setIsSending(false)
  }

  return (
    <BaseLayout>
      <div className="pt-24">
        <h1 className="text-center font-bold text-2xl">新規登録</h1>
        <form onSubmit={handleSubmit(onSubmit)} className="mt-12">
          <Controller
            name="name"
            control={control}
            defaultValue=""
            rules={{
              validate: (value) => checkRequired(value),
            }}
            render={({ field }) => (
              <TextField
                {...field}
                label="名前"
                variant="outlined"
                color="secondary"
                className="bg-white w-full rounded"
              />
            )}
          />
          <Controller
            name="email"
            control={control}
            defaultValue=""
            rules={{
              validate: (value) => checkEmail(value),
            }}
            render={({ field }) => (
              <TextField
                {...field}
                label="メールアドレス"
                variant="outlined"
                color="secondary"
                className="mt-6 bg-white w-full rounded"
              />
            )}
          />
          <ErrorText error={errors.email} />
          <Controller
            name="password"
            control={control}
            defaultValue=""
            rules={{
              validate: (value) => checkRequired(value),
            }}
            render={({ field }) => (
              <TextField
                {...field}
                label="パスワード"
                type="password"
                variant="outlined"
                autoComplete="current-password"
                color="secondary"
                className="mt-6 bg-white w-full rounded"
              />
            )}
          />
          <ErrorText error={errors.password} />
          <div className="mt-5 text-sm">
            ※半角大小英数字をそれぞれ1種類以上含む8文字以上100文字以下
          </div>
          <LoadingButton
            className="text-black mt-8 mr-auto ml-auto pl-6 pr-6 h-10 bg-primary1"
            loading={isSending}
            variant="contained"
            onClick={handleSubmit(onSubmit)}
          >
            登録する
          </LoadingButton>
        </form>
      </div>
    </BaseLayout>
  )
}

export default App
