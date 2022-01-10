import Link from "next/link"
import { useRouter } from "next/router"
import React, { Dispatch, SetStateAction } from "react"
import { Word } from "../../types/word"

type Props = {
  index: number
  word: Word
  isHidden: boolean
  setPlayCount: Dispatch<SetStateAction<number>>
  setOpenWordId: Dispatch<SetStateAction<number | undefined>>
}
export const SwiperContent: React.FC<Props> = ({
  index,
  word,
  isHidden,
  setPlayCount,
  setOpenWordId,
}) => {
  const onOpen = () => {
    setOpenWordId(index)
    setPlayCount((pre) => ++pre)
  }

  const router = useRouter()
  const { wordbookId } = router.query

  return (
    <div className="">
      <div>
        <div className="p-3 h-40 bg-white text-lg">{word.front_content}</div>
        <div className="h-40 relative">
          {isHidden && (
            <div
              className="bg-black absolute w-full h-full flex justify-center items-center "
              onClick={onOpen}
            >
              <div className="text-white font-bold">答え合わせ</div>
            </div>
          )}
          <div className="p-3 bg-yellow-200 w-full h-full text-lg">{word.back_content}</div>
        </div>
      </div>
      <div className="flex text-blue-700">
        <div className="mt-2 ml-auto">
          <Link href={`/wordbook/${wordbookId}/word/${word.id}`}>編集する</Link>
        </div>
      </div>
    </div>
  )
}
