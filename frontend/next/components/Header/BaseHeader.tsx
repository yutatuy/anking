import React from "react"
import { Button } from "@material-ui/core"
import { useRouter } from "next/router"
import Link from "next/link"

type Props = {}
export const BaseHeader: React.FC<Props> = ({ children }) => {
  const router = useRouter()
  return (
    <div className="p-4 bg-white">
      <Link href="/">
        <Button variant="contained">TOPへ</Button>
      </Link>
      <Button className="ml-2" variant="contained" onClick={() => router.back}>
        戻る
      </Button>
    </div>
  )
}
