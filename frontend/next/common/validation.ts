import { Size } from "./style"

export const Text = {
  email: "正しいメールアドレスを入力してください",
  min8: "8文字以上の半角英数字で入力してください",
  required: "必須項目です",
  confirmPassword: "確認用パスワードと一致しません。",
}

export const checkEmail = (value: string) => {
  const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i
  return value.match(regex) ? true : Text.email
}

export const checkRequired = (value: string | boolean) => (!value ? Text.required : true)

export const checkPassword = (value: string) => {
  if (value.length < Size.minPassword) {
    return Text.min8
  }
  return true
}

export const checkEqualPassword = (pass: string, pre: string) => {
  if (pass.length < Size.minPassword) {
    return Text.min8
  }
  if (pre !== pass) {
    return Text.confirmPassword
  }
  return true
}
