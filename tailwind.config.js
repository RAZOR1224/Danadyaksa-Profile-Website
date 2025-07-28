// tailwind.config.js

import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            // Your custom color palette
            colors: {
                primaryDark: '#1A237E',
                primary: '#283593',
                accent: '#D4AF37',
                surface: '#f8f9fa',
                textBase: '#333333',
                textMuted: '#6c757d',
            },
            // Your custom font configuration
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            // Your custom animation configuration
            animation: {
                'fade-in-up': 'fade-in-up 0.6s ease-out forwards',
            },
            keyframes: {
                'fade-in-up': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(20px)',
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)',
                    },
                },
            },
        },
    },

    plugins: [],
};