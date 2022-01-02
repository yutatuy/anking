import { Button } from "@material-ui/core"
import type { NextPage } from "next"
import { LoginContent } from "../components/Content/LoginContent"
import { BaseLayout } from "../components/Layout/BaseLayout"

const App: NextPage = () => {
  return (
    <BaseLayout>
      <LoginContent />
    </BaseLayout>
  )
}

export default App
