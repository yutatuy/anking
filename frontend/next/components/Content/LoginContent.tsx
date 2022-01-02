import { Button } from "@material-ui/core"
import React from "react"
import { login } from "../../api/user"

type Props = {}
export const LoginContent: React.FC<Props> = ({ children }) => {
  const onPressLoginButton = async () => {
    const params = {
      email: "test@anking.com",
      password: "Password1",
    }
    try {
      const { data } = await login(params)
    } catch (e) {
      console.log("[Error]", e)
    }
  }

  return (
    <div>
      <Button variant="outlined" color="primary" onClick={onPressLoginButton}>
        ログインボタン
      </Button>
    </div>
  )
}
