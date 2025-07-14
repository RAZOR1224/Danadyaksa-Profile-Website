// resources/js/app.js

import './bootstrap';

// --- Alpine.js Setup ---
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse); // Register the collapse plugin
window.Alpine = Alpine;  // Make Alpine available on the window object
Alpine.start();

// --- Swiper.js Setup ---
import Swiper from 'swiper';
import 'swiper/css'; // Import the core Swiper CSS

// You can initialize your Swiper instances here
// This code waits for the page to be fully loaded before running
document.addEventListener('DOMContentLoaded', () => {
    // Initialize the logo swiper from your homepage
    new Swiper('.logo-swiper', {
        loop: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        // Responsive breakpoints
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 50,
            },
        }
    });
});