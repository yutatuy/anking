import React from "react"
import Cookies from "js-cookie"
import { useRouter } from "next/router"
import { setAuthorization } from "../../api"

type Props = {}
export const Auth: React.FC<Props> = ({ children }) => {
  const router = useRouter()
  const token = Cookies.get("token")

  if (typeof window !== "undefined") {
    if (!token) {
      router.replace("/login")
    } else {
      setAuthorization()
      return <div>{children}</div>
    }
  }
  return null
}
