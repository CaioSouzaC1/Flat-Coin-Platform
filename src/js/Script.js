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
  loadJSON("coin=USD");
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
  document.querySelector("#loader").classList.remove("invisible");
  let myObj = "";
  let url = "FetchPostApi.php";
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
      myObj = JSON.parse(JSON.stringify(myJson));
      console.log(myObj);
      myObj.forEach((element) => {
        document.querySelector("#ulMain").innerHTML += `
        <li class="Crypto" onclick='openModal(${element})'>
        <div class="row ai-ce">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 row ai-ce infos">
                <div class="row ai-ce col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <img src="${element.Logo}" alt="${element.CryptoName}">
                    <h1 class="CryptoName">${element.CryptoName}</h1>
                </div>
                <div class="row ai-ce col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <h5>Abrev:</h5>
                    <h6>${element.Abrev}</h6>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 row ai-ce">
                <a href="${element.Site}"><i class="fa-solid fa-globe"></i></a>
                <i class="fa-solid fa-hand-holding-dollar"></i> ${eval(
                  element.Price
                ).toFixed(5)}
                % last 24%
                ${eval(element.h1).toFixed(5)}
                ${verifyPercentChange(eval(element.h1))}  
            </div>
        </div>
    </li>
        `;
      });
      document.querySelector("#loader").classList.add("invisible");
    });
}

const verifyPercentChange = (valor) => {
  if (valor > 0) {
    return `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-graph-up-arrow text-green" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
  </svg>`;
  } else {
    return `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-graph-down-arrow text-red" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z" />
  </svg>`;
  }
};
