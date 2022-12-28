declare type Props = {
  version: string,
}

export default function Page({version}: Props) {
  return (
    <p>Welcome to Laravel {version}</p>
  )
}
