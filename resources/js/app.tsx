import './bootstrap';

import '../css/app.css';

import {createRoot} from 'react-dom/client';
import {createInertiaApp} from '@inertiajs/inertia-react';
import {InertiaProgress} from '@inertiajs/progress';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
  // @ts-ignore
  resolve: (name) => resolvePageComponent(`./pages/${name}.tsx`, import.meta.glob('./pages/**/*.tsx')),
  setup({el, App, props}) {
    const root = createRoot(el);
    root.render(<App {...props} />);
  },
});

InertiaProgress.init();
