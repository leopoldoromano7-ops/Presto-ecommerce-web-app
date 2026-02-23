import * as bootstrap from 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    let carouselEl = document.getElementById('announceCarousel');
    if (!carouselEl) return;

    let carousel = new bootstrap.Carousel(carouselEl, {
        interval: false, 
        ride: false
    });

    let currentSlide = document.getElementById('current-slide');
    let totalSlides = document.getElementById('total-slides');
    let items = carouselEl.querySelectorAll('.carousel-item');

    totalSlides.textContent = items.length;

    carouselEl.addEventListener('slid.bs.carousel', function (event) {
        let index = Array.from(items).indexOf(event.relatedTarget) + 1;
        currentSlide.textContent = index;
    });

    currentSlide.textContent = 1; 
});
