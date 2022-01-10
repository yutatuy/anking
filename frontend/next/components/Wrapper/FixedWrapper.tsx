import React from "react"
import useScrollTrigger from "@material-ui/core/useScrollTrigger"
import { Box } from "@material-ui/core"

type Props = {}
export const FixedWrapper: React.FC<Props> = ({ children }) => {
  const isScroll = useScrollTrigger({
    disableHysteresis: true,
    threshold: 0,
  })

  return (
    <>
      <Box style={styles.normal(isScroll)}>{children}</Box>
      <Box style={styles.fixed(isScroll)}>{children}</Box>
    </>
  )
}

const styles: any = {
  normal: (isScroll: boolean) => ({
    position: isScroll ? "fixed" : "static",
    width: "100%",
    zIndex: 1000,
  }),
  fixed: (isScroll: boolean) => ({
    display: isScroll ? "block" : "none",
    width: "100%",
  }),
}
