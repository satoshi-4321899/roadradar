import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const mySwiper = new Swiper('.swiper', {
    // Optional parameters
    loop: true,
    
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
   
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});

const categoryButtons = document.querySelectorAll('.category-button');
const carousels = document.querySelectorAll('.category-carousel');

categoryButtons.forEach(button => {
    button.addEventListener('click', function () {
        const selectedCategory = this.getAttribute('data-category');

        // すべてのカルーセルを非表示に
        carousels.forEach(carousel => {
            carousel.style.display = 'none';
        });

        // 選択されたカテゴリーのカルーセルを表示
        document.getElementById(`carousel-${selectedCategory}`).style.display = 'block';
    });
});

// 初期表示で最初のカテゴリーを表示
if (categoryButtons.length > 0) {
    categoryButtons[0].click();
}