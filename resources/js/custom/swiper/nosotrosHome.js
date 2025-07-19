console.log('JS cargado correctamente');

import Swiper from "swiper";
import {Navigation, Pagination, Parallax} from "swiper/modules";

document.addEventListener('DOMContentLoaded',() => {
    console.log('Iniciando Swiper...');
    const swiper = new Swiper('.mySwiper', {
        modules: [Navigation,Pagination,Parallax],
        speed: 600,
        parallax: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
})

