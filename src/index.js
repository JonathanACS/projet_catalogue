document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".btn");
  const slides = document.querySelectorAll(".slide");

  buttons.forEach((button) => {
    button.addEventListener("click", (e) => {
      const slideActive = document.querySelector(".slide.active");

      if (!slideActive) return;
      let newIndex =
        [...slides].indexOf(slideActive) +
        (e.currentTarget.id === "next" ? 1 : -1);

      if (newIndex < 0) {
        newIndex = slides.length - 1;
      } else if (newIndex >= slides.length) {
        newIndex = 0;
      }

      slideActive.classList.remove("active");
      slides[newIndex].classList.add("active");
    });
  });
});
