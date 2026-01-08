import './bootstrap';
import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    /* ===== HEADER SCROLL ===== */
    const header = document.getElementById('header');

    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        });
    }

});
