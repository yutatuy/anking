import Link from "next/link"
import type { NextPage } from "next"
import { Auth } from "../components/Auth/Auth"
import { BaseLayout } from "../components/Layout/BaseLayout"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import { faPlusCircle } from "@fortawesome/free-solid-svg-icons"
import { useEffect, useState } from "react"
import { Wordbook } from "../types/wordbook"
import { fetchWordbooksApi } from "../api/wordbook"
import { BaseCircular } from "../components/Circular/BasicCircular"
import { Button } from "@material-ui/core"
import { Card } from "@mui/material"

const App: NextPage = () => {
  const [isLoading, setIsLoading] = useState<boolean>(false)
  const [wordbooks, setWordbooks] = useState<Wordbook[]>([])

  useEffect(() => {
    const fetchData = async () => {
      setIsLoading(true)
      try {
        const { data } = await fetchWordbooksApi()
        setWordbooks(data.data.wordbooks)
      } catch (e) {
        console.log("[Error]", e)
      }
      setIsLoading(false)
    }
    fetchData()
  }, [])

  return (
    <Auth>
      <BaseLayout
        Header={() => (
          <div className="p-3 bg-white flex justify-between">
            <Link href="/">TOP</Link>
          </div>
        )}
      >
        <div className="pt-10">
          <div className="flex items-center justify-between">
            <h1 className="text-xl">単語帳一覧</h1>
            <Link href="/wordbook/add">
              <Button variant="outlined" startIcon={<FontAwesomeIcon icon={faPlusCircle} />}>
                追加
              </Button>
            </Link>
          </div>
          {isLoading ? (
            <BaseCircular />
          ) : (
            <ul>
              {wordbooks.map((v, i) => (
                <li className="mt-4">
                  <Link key={i} href={`/wordbook/${v.id}`}>
                    <Card
                      variant="outlined"
                      className="pt-5 pb-5 pl-3 pr-3 block text-lg font-bold flex items-center justify-between"
                    >
                      <div>{v.title}</div>
                      {v.is_public && (
                        <div className="pt-1 pb-1 p-2 text-xs rounded-full bg-blue-300">公開中</div>
                      )}
                    </Card>
                  </Link>
                </li>
              ))}
            </ul>
          )}
        </div>
      </BaseLayout>
    </Auth>
  )
}

export default App
