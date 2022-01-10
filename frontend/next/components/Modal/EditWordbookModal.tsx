import React, { Dispatch, SetStateAction } from "react"
import { BaseCircular } from "../Circular/BasicCircular"
import { Button, Checkbox, FormControlLabel, Modal, TextField } from "@material-ui/core"
import { useEffect, useState } from "react"
import { Controller, useForm } from "react-hook-form"
import { checkRequired } from "../../common/validation"
import { ErrorText } from "../../components/Text/ErrorText"
import LoadingButton from "@mui/lab/LoadingButton"
import { useRouter } from "next/router"
import { deleteWordbookApi, fetchWordbookApi, updateWordbookApi } from "../../api/wordbook"
import { Wordbook } from "../../types/wordbook"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import { faTimesCircle } from "@fortawesome/free-solid-svg-icons"

type Props = {
  isModalOpen: boolean
  setIsModalOpen: Dispatch<SetStateAction<boolean>>
}
type FormData = {
  title: string
  is_public: boolean
}
export const EditWordbookModal: React.FC<Props> = ({ isModalOpen, setIsModalOpen }) => {
  const [wordbook, setWordbook] = useState<Wordbook>()
  const [isLoading, setIsLoading] = useState<boolean>(false)
  const [isSending, setIsSending] = useState<boolean>(false)
  const [isDeleting, setIsDeleting] = useState<boolean>(false)
  const router = useRouter()
  const { wordbookId } = router.query
  const {
    control,
    handleSubmit,
    formState: { errors },
  } = useForm<FormData>()

  useEffect(() => {
    const init = async () => {
      setIsLoading(true)
      try {
        const { data } = await fetchWordbookApi({ id: wordbookId as string })
        setWordbook(data.data.wordbook)
      } catch (e: any) {
        console.log("Error", e.message)
      }
      setIsLoading(false)
    }
    init()
  }, [])

  const onSubmit = async (inputs: FormData) => {
    setIsSending(true)
    try {
      const params = {
        id: Number(wordbookId),
        ...inputs,
      }
      await updateWordbookApi(params)
      setIsModalOpen(false)
    } catch (e) {
      console.log("[error]", e)
    }
    setIsSending(false)
  }

  const onDelete = async () => {
    setIsDeleting(true)
    try {
      const params = {
        id: Number(wordbookId),
      }
      await deleteWordbookApi(params)
      router.replace("/home")
    } catch (e) {
      console.log("[error]", e)
    }
    setIsDeleting(false)
  }

  return (
    <Modal open={isModalOpen} onClose={() => setIsModalOpen(false)}>
      <div className="p-4 pt-10 pb-10 w-11/12 bg-white absolute top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4">
        <FontAwesomeIcon
          icon={faTimesCircle}
          onClick={() => setIsModalOpen(false)}
          className="w-7 h-7 absolute top-2 right-2"
        />
        <h1 className="text-xl">単語帳を編集する</h1>
        {isLoading ? (
          <BaseCircular />
        ) : (
          <form onSubmit={handleSubmit(onSubmit)} className="mt-12">
            <div>
              <Controller
                name="title"
                control={control}
                defaultValue={wordbook?.title}
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
                defaultValue={wordbook?.is_public}
                render={({ field }) => (
                  <FormControlLabel
                    control={
                      <Checkbox {...field} defaultChecked={wordbook?.is_public} name="gilad" />
                    }
                    label="リストを公開する"
                  />
                )}
              />
            </div>
            <div className="mt-8 flex justify-center">
              <LoadingButton
                type="button"
                className="bg-red-300"
                loading={isDeleting}
                variant="contained"
                onClick={onDelete}
              >
                削除する
              </LoadingButton>
              <LoadingButton type="submit" className="ml-4" loading={isSending} variant="contained">
                保存する
              </LoadingButton>
            </div>
          </form>
        )}
      </div>
    </Modal>
  )
}
