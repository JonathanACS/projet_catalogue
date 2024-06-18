function toggler() {
  const icon = document.querySelector("#toggler");
  const menu = document.querySelector(".menu");
  if (icon.innerHTML === "menu") {
    icon.innerHTML = "close";
    menu.style.transform = "translateX(0%)";
  } else {
    icon.innerHTML = "menu";
    menu.style.transform = "translateX(-100%)";
  }
}
