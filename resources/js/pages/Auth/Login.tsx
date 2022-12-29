import {GoogleAuthProvider, getAuth, signInWithPopup} from 'firebase/auth';
import {Inertia} from '@inertiajs/inertia';
import {initializeApp} from 'firebase/app';
import {useEffect} from 'react';

let app = undefined;
let provider = new GoogleAuthProvider();

declare type Props = {
  firebaseConfig: string
}

export default function Page(props: Props) {
  useEffect(() => {
    if (app === undefined) {
      const firebaseConfigAsString = atob(props.firebaseConfig);
      const firebaseConfig = JSON.parse(firebaseConfigAsString);

      app = initializeApp(firebaseConfig);
    }
  })

  const onClick = () => {
    const auth = getAuth();
    signInWithPopup(auth, provider)
      .then(result => {
        result.user.getIdToken()
          .then((token) => {
            Inertia.post('/nova/login', {
              'token': token,
            });
          })
      })
      .catch(console.error)
  }

  return (
    <div className="text-center p-4">
      <button
        type="button"
        className="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        onClick={onClick}
      >
        Continue with Google
      </button>
    </div>
  )
}
