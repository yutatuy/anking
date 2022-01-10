import type { NextPage } from "next"
import { useEffect, useState } from "react"
import { Auth } from "../../../components/Auth/Auth"
import { BaseLayout } from "../../../components/Layout/BaseLayout"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import { faChevronLeft, faCog, faPen, faPlusCircle } from "@fortawesome/free-solid-svg-icons"
import { EditWordbookModal } from "../../../components/Modal/EditWordbookModal"
import { useRouter } from "next/router"
import { Button } from "@mui/material"
import Link from "next/link"
import { Word } from "../../../types/word"
import { fetchWordsByWordbookIdApi } from "../../../api/word"
import { Swiper, SwiperSlide } from "swiper/react"
import "swiper/css"
import "swiper/css/navigation"
import { SwiperContent } from "../../../components/Content/SwiperContent"
import SwiperCore, { Navigation } from "swiper"
import { BaseCircular } from "../../../components/Circular/BasicCircular"
import { LoadingButton } from "@mui/lab"
import { createUserPlayApi } from "../../../api/user"
SwiperCore.use([Navigation])

const App: NextPage = () => {
  const [isModalOpen, setIsModalOpen] = useState<boolean>(false)
  const [isLoading, setIsLoading] = useState<boolean>(false)
  const [isSending, setIsSending] = useState<boolean>(false)
  const [playCount, setPlayCount] = useState<number>(0)
  const [words, setWords] = useState<Word[]>([])
  const [openWordId, setOpenWordId] = useState<number>()
  const router = useRouter()
  const { wordbookId } = router.query

  useEffect(() => {
    const init = async () => {
      if (!wordbookId) return null
      setIsLoading(true)
      try {
        const { data } = await fetchWordsByWordbookIdApi({ wordbook_id: Number(wordbookId) })
        setWords(data.data.words)
      } catch (e) {
        console.log("[Error] fetchWordsByWordbookIdApi", e)
      }
      setIsLoading(false)
    }
    init()
  }, [wordbookId])

  const onComplete = async () => {
    setIsSending(true)
    try {
      if (playCount > 0) {
        await createUserPlayApi({ count: playCount })
      }
      router.replace("/home")
    } catch (e) {
      console.log("[Error] createUsePlay")
    }
    setIsSending(false)
  }

  return (
    <Auth>
      <EditWordbookModal isModalOpen={isModalOpen} setIsModalOpen={setIsModalOpen} />
      <BaseLayout
        Header={() => (
          <div className="p-3 bg-white flex items-center justify-between">
            <FontAwesomeIcon
              icon={faChevronLeft}
              onClick={() => router.replace("/home")}
              className="w-6 h-6"
            />
            <div className="flex ml-auto items-center">
              <Link href={`/wordbook/${wordbookId}/word/add`}>
                <FontAwesomeIcon icon={faPlusCircle} className="w-6 h-6" />
              </Link>
              <FontAwesomeIcon
                icon={faCog}
                className="ml-4 w-6 h-6"
                onClick={() => setIsModalOpen(true)}
              />
            </div>
          </div>
        )}
      >
        <div className="pt-8">
          {isLoading ? (
            <BaseCircular />
          ) : (
            <>
              {words.length === 0 ? (
                <>
                  <div className="mb-3">単語が一つも登録されていません</div>
                  <Link href={`/wordbook/${wordbookId}/word/add`}>
                    <Button variant="outlined" startIcon={<FontAwesomeIcon icon={faPlusCircle} />}>
                      追加
                    </Button>
                  </Link>
                </>
              ) : (
                <>
                  <Swiper
                    navigation={true}
                    spaceBetween={50}
                    slidesPerView={1}
                    onSlideChange={() => setOpenWordId(undefined)}
                  >
                    {words.map((v, i) => (
                      <SwiperSlide key={i}>
                        <SwiperContent
                          index={i}
                          word={v}
                          isHidden={openWordId !== i}
                          setPlayCount={setPlayCount}
                          setOpenWordId={setOpenWordId}
                        />
                      </SwiperSlide>
                    ))}
                  </Swiper>
                  <div className="mt-8 flex justify-center items-center">
                    <div>{playCount}回</div>
                    <LoadingButton
                      type="button"
                      className="ml-4"
                      loading={isSending}
                      variant="contained"
                      onClick={onComplete}
                    >
                      終了
                    </LoadingButton>
                  </div>
                </>
              )}
            </>
          )}
        </div>
      </BaseLayout>
    </Auth>
  )
}

export default App
