import Swiper from "swiper";
import {Navigation, Pagination, Grid, Autoplay} from "swiper/modules";
import 'swiper/css';
import 'swiper/css/grid';
import 'swiper/css/pagination';

Swiper.use([Grid, , Navigation, Pagination, Autoplay]);

document.addEventListener('DOMContentLoaded', () => {
    var swiper = new Swiper(".gridSwiper",{
        modules: [Pagination,Navigation, Grid, Autoplay],
        slidesPerView: 2,
        grid: {
            rows: 2,
            fill: 'row',
        },
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable:true,
        },
        navigation: {
            nextEl: ".gallery-next",
            prevEl: ".gallery-prev",
        },
        breakpoints: {
            576: {
                slidesPerView: 2, // Teléfonos (2x2)
                grid: {
                    rows: 2,
                },
            },
            768: {
                slidesPerView: 3, // Tablets (3x2)
                grid: {
                    rows: 2,
                },
            },
            1024: {
                slidesPerView: 4, // Laptops o más grandes (4x2)
                grid: {
                    rows: 2,
                },
            }
        },
        autoplay: {
            delay: 3000, //Cambia cada 3 segundo
            disableOnInteraction: false, //Continua moviendo aunque el usuario interactue
        },
/*
        loop: true,
*/
    });
})
