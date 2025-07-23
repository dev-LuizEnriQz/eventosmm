import Swiper from "swiper";
import {EffectCards} from "swiper/modules";
import 'swiper/css';
import 'swiper/css/effect-cards';

document.addEventListener('DOMContentLoaded', () => {
    const  swiper = new Swiper(".swiper-cards",{
        modules: [EffectCards],
        effect: 'cards',
        grabCursor: true,
        navigation:{
            nextEl: '.cards-next',
            prevEl: '.cards-prev',
        },
    });
})
