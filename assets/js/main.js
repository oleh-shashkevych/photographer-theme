document.addEventListener('DOMContentLoaded', function () {

    // === 1. HEADER SCROLL EFFECT ===
    const header = document.querySelector('.site-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // === 2. MOBILE MENU ===
    const burgerBtn = document.querySelector('.burger-btn');
    const nav = document.querySelector('.main-navigation');

    if (burgerBtn) {
        burgerBtn.addEventListener('click', () => {
            nav.classList.toggle('is-open');
            burgerBtn.classList.toggle('active'); // Можно добавить стили для анимации крестика
        });
    }

    // === 3. LIGHTBOX GALLERY ===
    const gridImages = document.querySelectorAll('.grid-img');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.querySelector('.lightbox-close');
    const prevBtn = document.querySelector('.lightbox-prev');
    const nextBtn = document.querySelector('.lightbox-next');
    const overlay = document.querySelector('.lightbox-overlay');

    let currentIndex = 0;
    const totalImages = gridImages.length;
    let isAnimating = false; // Флаг, чтобы нельзя было кликать, пока идет анимация

    if (totalImages === 0) return;

    // Функция открытия
    function openLightbox(index) {
        currentIndex = index;
        const src = gridImages[index].getAttribute('src');

        lightboxImg.src = src;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Небольшая задержка перед фейд-ином, чтобы CSS transition сработал красиво
        setTimeout(() => {
            lightboxImg.classList.add('visible');
        }, 50);
    }

    // Функция закрытия
    function closeLightbox() {
        lightboxImg.classList.remove('visible'); // Сначала фейд-аут картинки
        lightbox.classList.remove('active');     // Потом закрытие модалки
        document.body.style.overflow = '';

        setTimeout(() => {
            lightboxImg.src = '';
        }, 500); // Чистим src после завершения анимации
    }

    // Логика переключения
    function changeSlide(direction) {
        if (isAnimating) return; // Блокируем частые клики
        isAnimating = true;

        // 1. Fade Out
        lightboxImg.classList.remove('visible');

        // 2. Ждем окончания анимации исчезновения (400ms как в CSS)
        setTimeout(() => {
            if (direction === 'next') {
                currentIndex = (currentIndex + 1) % totalImages;
            } else {
                currentIndex = (currentIndex - 1 + totalImages) % totalImages;
            }

            // 3. Меняем источник
            lightboxImg.src = gridImages[currentIndex].getAttribute('src');

            // 4. Fade In (после смены src)
            // Используем onload, чтобы не показывать фейд-ин, если картинка тяжелая и еще не прогрузилась
            lightboxImg.onload = () => {
                lightboxImg.classList.add('visible');
                isAnimating = false; // Разблокируем клики
            };

            // Фолбек на случай, если картинка из кеша и onload проскочил
            if (lightboxImg.complete) {
                lightboxImg.classList.add('visible');
                isAnimating = false;
            }

        }, 400); // Время должно совпадать с transition: opacity 0.4s
    }

    // --- EVENT LISTENERS ---

    gridImages.forEach((img, index) => {
        const item = img.closest('.grid-item');
        item.style.cursor = 'pointer';

        item.addEventListener('click', (e) => {
            e.preventDefault();
            openLightbox(index);
        });
    });

    closeBtn.addEventListener('click', closeLightbox);
    overlay.addEventListener('click', closeLightbox);

    // Используем новую функцию с блокировкой анимации
    nextBtn.addEventListener('click', () => changeSlide('next'));
    prevBtn.addEventListener('click', () => changeSlide('prev'));

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') changeSlide('next');
        if (e.key === 'ArrowLeft') changeSlide('prev');
    });
});