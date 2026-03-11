document.addEventListener('DOMContentLoaded', function () {

    // === PAGE TRANSITIONS (CAMERA SHUTTER EFFECT) ===
    const preloader = document.querySelector('.site-preloader');

    if (preloader) {
        // 1. Open shutter on initial page load
        // Hold for 500ms to show the beautiful focus animation, then slide up
        setTimeout(() => {
            preloader.classList.add('is-hidden');
        }, 500);

        // 2. Intercept link clicks to close shutter before navigating
        // Select all links that are not external, anchors, or mailto/tel
        const internalLinks = document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"]):not([href^="mailto:"]):not([href^="tel:"])');

        internalLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                const targetUrl = link.href;

                // Ignore cmd/ctrl clicks (allow opening in new tab)
                if (e.metaKey || e.ctrlKey) return;

                // Ignore if it's the exact same page
                if (targetUrl === window.location.href) return;

                // Stop browser from navigating immediately
                e.preventDefault();

                // Instantly move shutter to top without animation
                preloader.classList.remove('is-hidden');
                preloader.style.transition = 'none';
                preloader.style.transform = 'translateY(-100%)';

                // Force browser reflow to apply the instant move
                void preloader.offsetWidth;

                // Add animation back and slide shutter down
                preloader.style.transition = 'transform 0.8s cubic-bezier(0.77, 0, 0.175, 1)';
                preloader.style.transform = 'translateY(0)';

                // Wait for the slide-down animation to finish, then navigate
                setTimeout(() => {
                    window.location.href = targetUrl;
                }, 800);
            });
        });

        // 3. Safari / iOS Cache Fix
        // Browsers often cache the page state (including closed shutter). 
        // This resets it if the user hits the browser's 'Back' button.
        window.addEventListener('pageshow', (e) => {
            if (e.persisted) {
                preloader.style.transition = 'none';
                preloader.style.transform = 'translateY(0)';
                void preloader.offsetWidth;

                preloader.style.transition = 'transform 0.8s cubic-bezier(0.77, 0, 0.175, 1)';
                preloader.classList.add('is-hidden');
            }
        });
    }

    // === 1. HEADER SCROLL EFFECT ===
    const header = document.querySelector('.site-header');
    let lastScrollY = window.scrollY;

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
        item.style.cursor = 'zoom-in';

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

    // Intersection Observer for scroll animations
    const observerOptions = {
        root: null,
        rootMargin: '0px', // Removed negative margin to trigger immediately
        threshold: 0       // Triggers when at least 1px is visible
    };

    const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stop observing once revealed
            }
        });
    }, observerOptions);

    // Find all elements with .fade-up class and observe them
    document.querySelectorAll('.fade-up').forEach(element => {
        scrollObserver.observe(element);
    });

    // FORCE REVEAL FOR ABOVE-THE-FOLD CONTENT
    // If a section (like the contact page) is already in the viewport on load,
    // reveal it immediately without waiting for a scroll event.
    setTimeout(() => {
        document.querySelectorAll('.fade-up').forEach(element => {
            const rect = element.getBoundingClientRect();
            // Check if the top of the element is visible in the window
            if (rect.top <= window.innerHeight) {
                element.classList.add('is-visible');
                scrollObserver.unobserve(element);
            }
        });
    }, 150);
});