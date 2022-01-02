import { Button } from "@material-ui/core"
import type { NextPage } from "next"
import { getCurrentUser } from "../api/user"
import { Auth } from "../components/Auth/Auth"
import { BaseLayout } from "../components/Layout/BaseLayout"

const App: NextPage = () => {
  const getMe = async () => {
    try {
      const { data } = await getCurrentUser()
      console.log("data", data)
    } catch (error) {
      console.log("[Error]", error)
    }
  }

  return (
    <Auth>
      <BaseLayout>
        <div>home</div>
        <Button onClick={getMe}>getMe</Button>
      </BaseLayout>
    </Auth>
  )
}

export default App
