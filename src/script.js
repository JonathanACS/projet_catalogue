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

/* Carousel */

const initSlider = () => {
  const imageList = document.querySelector(".slider-wrapper .image-list");
  const prevButton = document.getElementById("prev-slide");
  const nextButton = document.getElementById("next-slide");
  const sliderScrollbar = document.querySelector(
    ".slider-scrollbar .scrollbar-track"
  );
  const scrollbarThumb = document.querySelector(
    ".slider-scrollbar .scrollbar-thumb"
  );
  const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

  const updateButtons = () => {
    prevButton.style.display = imageList.scrollLeft <= 0 ? "none" : "block";
    nextButton.style.display =
      imageList.scrollLeft >= maxScrollLeft ? "none" : "block";
  };

  const updateScrollThumbPosition = () => {
    const scrollPosition = imageList.scrollLeft;
    const thumbPosition =
      (scrollPosition / maxScrollLeft) *
      (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
    scrollbarThumb.style.left = `${thumbPosition}px`;
  };

  scrollbarThumb.addEventListener("mousedown", (e) => {
    const startX = e.clientX;
    const thumbPosition = scrollbarThumb.offsetLeft;

    const handleMouseMove = (e) => {
      const deltaX = e.clientX - startX;
      const newThumbPosition = thumbPosition + deltaX;
      const maxThumbPosition =
        sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth;

      const boundedPosition = Math.max(
        0,
        Math.min(maxThumbPosition, newThumbPosition)
      );
      const scrollPosition =
        (boundedPosition / maxThumbPosition) * maxScrollLeft;

      scrollbarThumb.style.left = `${boundedPosition}px`;
      imageList.scrollLeft = scrollPosition;
    };

    const handleMouseUp = () => {
      document.removeEventListener("mousemove", handleMouseMove);
      document.removeEventListener("mouseup", handleMouseUp);
    };

    document.addEventListener("mousemove", handleMouseMove);
    document.addEventListener("mouseup", handleMouseUp);
  });

  prevButton.addEventListener("click", () => {
    imageList.scrollBy({ left: -imageList.clientWidth, behavior: "smooth" });
  });

  nextButton.addEventListener("click", () => {
    imageList.scrollBy({ left: imageList.clientWidth, behavior: "smooth" });
  });

  imageList.addEventListener("scroll", () => {
    updateButtons();
    updateScrollThumbPosition();
  });

  updateButtons();
  updateScrollThumbPosition();
};

window.addEventListener("load", initSlider);
