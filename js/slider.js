var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: true,
    fade: true,

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true
    },

    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        }
    }
  });



const products = document.querySelectorAll('.product');
products.forEach((product, i) => {
  product.addEventListener("click", (e) =>{
    let id = product.dataset.product;
    window.location.href = `http://localhost/githubWeb/details.php?product=${id}`;
  })
});
