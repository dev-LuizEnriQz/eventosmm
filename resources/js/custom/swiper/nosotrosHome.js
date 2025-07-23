console.log('JS cargado correctamente');

import Swiper from "swiper";
import {Navigation, Pagination, Parallax} from "swiper/modules";
import 'swiper/css';

document.addEventListener('DOMContentLoaded',() => {
    console.log('Iniciando Swiper...');
    const parallaxSwiper = new Swiper('.swiper-parallax', {
        modules: [Navigation,Pagination,Parallax],
        speed: 600,
        parallax: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".parallax-next",
            prevEl: ".parallax-prev",
        },
    });
})

