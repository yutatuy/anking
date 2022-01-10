import React from "react"

type Props = {
  Header?: () => JSX.Element
}
export const BaseLayout: React.FC<Props> = ({ children, Header }) => {
  return (
    <div className="bg-blue-100">
      {Header && Header()}
      <div className="pr-3 pl-3 max-w-xl mr-auto ml-auto min-h-screen">{children}</div>
    </div>
  )
}
