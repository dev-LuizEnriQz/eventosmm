import Swiper from "swiper";
import {Navigation, Pagination} from 'swiper/modules';
document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.mySwiper', {
        modules: [Navigation, Pagination],
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
    });
});
