import { Button } from "@material-ui/core"
import type { NextPage } from "next"
import Link from "next/link"
import { BaseLayout } from "../components/Layout/BaseLayout"

const Home: NextPage = () => {
  return (
    <BaseLayout>
      <div className="pt-24">
        <h1 className="text-center font-bold text-2xl">AnKingへようこそ</h1>
        <div className="mt-10 flex justify-center">
          <Link href="/signup">
            <Button variant="contained">新規登録</Button>
          </Link>
          <Link href="/login">
            <Button className="ml-5" variant="contained">
              ログイン
            </Button>
          </Link>
        </div>
      </div>
    </BaseLayout>
  )
}

export default Home
