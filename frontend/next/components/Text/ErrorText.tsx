type Props = {
  error: any
}
export const ErrorText = ({ error }: Props) => {
  if (error !== undefined) {
    return <div className="mt-1 text-xs text-red-400 font-bold">{error.message}</div>
  }
  return null
}
