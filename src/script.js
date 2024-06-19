/* Menu burger */

document.addEventListener("DOMContentLoaded", function () {
  const menuOpen = document.getElementById("menu-open");
  const menuClose = document.getElementById("menu-close");
  const mobileMenu = document.getElementById("mobile-menu");

  if (menuOpen && menuClose && mobileMenu) {
    menuOpen.addEventListener("click", function () {
      mobileMenu.classList.add("show");
      menuOpen.style.display = "none";
      menuClose.style.display = "block";
    });

    menuClose.addEventListener("click", function () {
      mobileMenu.classList.remove("show");
      menuOpen.style.display = "block";
      menuClose.style.display = "none";
    });
  }
});
