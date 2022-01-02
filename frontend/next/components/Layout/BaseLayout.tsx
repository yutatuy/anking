import React from "react"

type Props = {}
export const BaseLayout: React.FC<Props> = ({ children }) => {
  return (
    <div className="pr-3 pl-3 max-w-xl mr-auto ml-auto bg-blue-100 min-h-screen">{children}</div>
  )
}
