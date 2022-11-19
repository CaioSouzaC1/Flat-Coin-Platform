const logo = document.querySelector("#logo");

const changeLogo = () => {
  setInterval(() => {
    if (logo.classList == "fa-brands fa-bitcoin") {
      document.querySelector(".logos span").style.color = "#051338";
      document.querySelector(".logos span:nth-child(3)").style.color =
        "#f7931a";
      logo.setAttribute("class", "fa-brands fa-ethereum");
    } else {
      document.querySelector(".logos span").style.color = "#f7931a";
      document.querySelector(".logos span:nth-child(3)").style.color =
        "#051338";
      logo.setAttribute("class", "fa-brands fa-bitcoin");
    }
  }, 4500);
};
window.addEventListener("load", () => {
  changeLogo();
});

const maybeShowHam = () => {
  if (hamburguer.classList == "fa-solid fa-bars") {
    hamburguer.setAttribute("class", "fa-solid fa-xmark");
    document.querySelector(".menu ul").classList.add("active");
  } else {
    document.querySelector(".menu ul").classList.remove("active");
    hamburguer.setAttribute("class", "fa-solid fa-bars");
  }
};

const hamburguer = document.querySelector("#hamburguer");
hamburguer.addEventListener("click", () => {
  maybeShowHam();
});
Array.from(document.querySelectorAll(".menu ul li")).map((e) => {
  e.addEventListener("click", () => {
    maybeShowHam();
  });
});

const modal = document.getElementById("myModal");
document.getElementsByClassName("close")[0].addEventListener("click", () => {
  modal.style.display = "none";
});

window.onclick = (event) => {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

const modalContent = document.querySelector("#theModalContent");

function openModal(SingleCrypto) {
  modal.style.display = "block";
  modalContent.innerHTML = `<div>${SingleCrypto[1]}</div>
  <img src="${SingleCrypto[8]}"></img>
  <div>${SingleCrypto[7]}</div>
  <a href="${SingleCrypto[9]}"><i class="fa-solid fa-globe"></i></a>`;
}
