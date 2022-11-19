const logo = document.querySelector("#logo");
const func1 = () => {
  setInterval(() => {
    if (logo.classList == "fa-brands fa-bitcoin") {
      logo.setAttribute("class", "fa-brands fa-ethereum");
    } else {
      logo.setAttribute("class", "fa-brands fa-bitcoin");
    }
  }, 5000);
};
window.addEventListener("load", () => {
  func1();
});
