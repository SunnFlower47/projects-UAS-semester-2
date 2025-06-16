import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
safelist: [
  'translate-x-0',
  '-translate-x-full'
],

    plugins: [
        forms,
        require('tailwind-scrollbar'),
        require('tailwind-scrollbar-hide')
    ],
    colors: {
  shimmer: {
    light: '#f3f3f3',
    medium: '#e2e2e2',
    dark: '#cccccc',
  },
}
};
