import {Layout} from "../components/templates/Layout";

declare type Props = {
  version: string,
}

export default function Page({version}: Props) {
  return (
    <Layout>
      <p>Welcome to Laravel {version}</p>
    </Layout>
  )
}
