// Initialize Swiper
document.addEventListener('DOMContentLoaded',function(){
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
    });

    // show menu bar
    $NAV = document.querySelector('.nav');
    $bars = document.querySelector('.fa-bars');
    $bars.addEventListener('click',function(){
        $NAV.style.right='0';
    });

    // close menu bar
    $xmark = document.querySelector('.fa-xmark');
    $xmark.addEventListener('click',function(){
        $NAV.style.right='-100%';
    });
});