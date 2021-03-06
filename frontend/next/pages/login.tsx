import { TextField } from "@material-ui/core"
import LoadingButton from "@mui/lab/LoadingButton"
import Cookies from "js-cookie"
import type { NextPage } from "next"
import { useRouter } from "next/router"
import { useState } from "react"
import { Controller, useForm } from "react-hook-form"
import { loginApi } from "../api/user"
import { checkEmail, checkRequired } from "../common/validation"
import { BaseLayout } from "../components/Layout/BaseLayout"
import { ErrorText } from "../components/Text/ErrorText"

export type FormData = {
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
      const { data } = await loginApi(inputs)
      Cookies.set("token", data.data.results.accessToken)
      router.replace("/home")
    } catch (e) {
      console.log("[Error]", e)
    }
    setIsSending(false)
  }

  return (
    <BaseLayout>
      <div className="pt-24">
        <h1 className="text-center font-bold text-2xl">ログイン</h1>
        <form onSubmit={handleSubmit(onSubmit)} className="mt-12">
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
                className="bg-white w-full rounded"
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
          <div className="flex justify-center">
            <LoadingButton
              className="mt-8 mr-auto ml-auto pl-6 pr-6 h-10"
              loading={isSending}
              variant="contained"
              type="submit"
            >
              ログインする
            </LoadingButton>
          </div>
        </form>
      </div>
    </BaseLayout>
  )
}

export default App
