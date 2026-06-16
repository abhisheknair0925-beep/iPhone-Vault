import AOS from 'aos';
import { gsap } from 'gsap';
import VanillaTilt from 'vanilla-tilt';
import { CountUp } from 'countup.js';
import Swiper from 'swiper';
import { Navigation, Pagination, EffectCoverflow, Autoplay } from 'swiper/modules';
import { inject } from '@vercel/analytics';

// Make them globally available
window.AOS = AOS;
window.gsap = gsap;
window.VanillaTilt = VanillaTilt;
window.CountUp = CountUp;
window.Swiper = Swiper;
window.SwiperModules = { Navigation, Pagination, EffectCoverflow, Autoplay };

// Initialize Vercel Analytics
inject();

// Initialize AOS globally on page load
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-cubic'
    });
});
