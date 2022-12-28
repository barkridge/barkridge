declare type Props = {
  version: string,
}

export default function Page({version}: Props) {
  return (
    <div className="p-4">
      <p>Welcome to Laravel {version}</p>
    </div>
  )
}
