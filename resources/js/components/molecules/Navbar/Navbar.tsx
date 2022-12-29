import {CommandLineIcon, MoonIcon, SunIcon} from "@heroicons/react/24/outline";
import {useEffect, useState} from "react";

export const Navbar = () => {
  const [isDark, setIsDark] = useState<boolean>(false)

  useEffect(() => {
    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
      triggerDarkMode()
    }

    setIsDark(document.documentElement.classList.contains('dark'))
  }, [])

  const onSwitchMode = () => {
    isDark ? triggerLightMode() : triggerDarkMode()
    setIsDark(!isDark)
  }

  return (
    <div className="bg-white dark:bg-gray-800 flex items-center h-14 shadow-b dark:border-b dark:border-gray-700">
      <div className="flex items-center px-4 sm:px-8">
        <CommandLineIcon className="h-8 w-8"/>

        <a href="/" className="font-medium ml-2">
          Irving's Shell
        </a>
      </div>

      <div className="flex items-center px-4 sm:px-8 ml-auto">
        <div>
          <button
            onClick={onSwitchMode}
            className="hover:bg-gray-100 dark:hover:bg-gray-900 flex items-center rounded-full p-2"
          >
            {isDark ? <MoonIcon className="h-6 w-6"/> : <SunIcon className="h-6 w-6"/>}
          </button>
        </div>
      </div>
    </div>
  )
}

const triggerDarkMode = () => {
  document.documentElement.classList.add('dark')
}

const triggerLightMode = () => {
  document.documentElement.classList.remove('dark')
}
