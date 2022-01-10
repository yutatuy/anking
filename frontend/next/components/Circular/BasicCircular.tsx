import React from "react"
import CircularProgress from "@mui/material/CircularProgress"

type Props = {}
export const BaseCircular: React.FC<Props> = ({}) => {
  return (
    <div className="p-10 flex justify-center items-center">
      <CircularProgress size={30} />
    </div>
  )
}
