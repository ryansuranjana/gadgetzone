console.log("helloworld");

// add box shadow on scroll down
let nav = document.querySelector(".navbar");
window.addEventListener("scroll", function () {
  if (window.scrollY > 50) {
    nav.classList.add("shadow");
  } else {
    nav.classList.remove("shadow");
  }
});

// image change when image onclick
const imageSlide = document.querySelector(".image-slide");
const imageShow = document.querySelector(".img-thumbnail");
imageSlide.addEventListener("mouseover", function (e) {
  if (e.target.className == "pilihan-produk") {
    imageShow.src = e.target.src;
  }
});
