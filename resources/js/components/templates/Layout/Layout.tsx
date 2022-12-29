import {ReactNode} from "react";

import {Navbar} from "../../molecules/Navbar";

declare type Props = {
  children?: ReactNode
}

export const Layout = ({children}: Props) => {
  return (
    <>
      <Navbar/>

      <div className="px-4 sm:px-8 mt-8">
        {children}
      </div>
    </>
  )
}
