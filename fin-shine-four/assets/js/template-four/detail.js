  // var swiper = new Swiper('.swiper-container', {
  //   slidesPerView: 3,
  //   spaceBetween: 20,
  //   centeredSlides: true,
  //   centeredSlidesBounds: true,
  //   effect: 'fade',
  //   loop: true,
  //   navigation: {
  //     nextEl: '.swiper-button-next',
  //     prevEl: '.swiper-button-prev',
  //   },
  // });
var swiper = new Swiper('.one', {
  autoplay: true,
  pagination: {autoplay:true,
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
  },
});
var swiper = new Swiper('.two', {
  autoplay: true,
  slidesPerView: 3,
  spaceBetween: 30,
  centeredSlides: true,
  centeredSlidesBounds: true,
  // pagination: {
  //   el: '.swiper-pagination',
  //   clickable: true,
  // },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
