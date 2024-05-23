const burger = document.querySelector("#burger-menu");
const menu = document.querySelector("#menu");
const burgerIcon = document.querySelector("#burger-icon");
let closeImg = false;
burger.addEventListener("click", () => {
  closeImg = !closeImg;
  if (closeImg) {
    menu.classList.toggle("flex");
    menu.classList.toggle("hidden");
    burgerIcon.src = "./images/icon-close.svg";
  } else {
    menu.classList.toggle("flex");
    menu.classList.toggle("hidden");
    burgerIcon.src = "./images/icon-hamburger.svg";
  }
});
