const logo = document.querySelector("#logo");

const changeLogo = () => {
  setInterval(() => {
    if (logo.classList == "fa-brands fa-bitcoin") {
      document.querySelector(".logos span").style.color = "#FFFFFF";
      document.querySelector(".logos span:nth-child(3)").style.color =
        "#f7931a";
      logo.setAttribute("class", "fa-brands fa-ethereum");
    } else {
      document.querySelector(".logos span").style.color = "#f7931a";
      document.querySelector(".logos span:nth-child(3)").style.color =
        "#FFFFFF";
      logo.setAttribute("class", "fa-brands fa-bitcoin");
    }
  }, 4500);
};

window.addEventListener("load", () => {
  changeLogo();
  coinSelect();
});

const maybeShowHam = () => {
  if (hamburguer.classList == "fa-solid fa-bars") {
    hamburguer.setAttribute("class", "fa-solid fa-xmark");
    document.querySelector(".menu ul").classList.add("active");
    document.querySelector("main").classList.add("mt-main");
  } else {
    document.querySelector(".menu ul").classList.remove("active");
    document.querySelector("main").classList.remove("mt-main");
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
const coinSelect = () => {
  const select = document.querySelector("#coin");
  select.addEventListener("change", (event) => {
    const withoputSpaces = "coin=" + event.target.value.trim();
    loadJSON(withoputSpaces);
  });
};

let $testeDiv = document.querySelector("#teste");

function loadJSON(params) {
  let myObj,
    x,
    htmlResult = "";
  let url = "FetchPostApi.php";
  console.log(params);
  fetch(url, {
    method: "POST",
    headers: {
      Accept: "application/json, text/plain, */*",
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: params,
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (myJson) {
      console.log(myJson);
      myObj = JSON.parse(JSON.stringify(myJson));
      for (x in myObj) {
        htmlResult += myObj[x].CoinSelected + "</b><br>";
      }
      $testeDiv.innerHTML = htmlResult;
    });
}
