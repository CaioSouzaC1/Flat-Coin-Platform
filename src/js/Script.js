const logo = document.querySelector("#logo");
let myObjRes = {};
let selecTime = "h1";
let selecCoin = "coin=USD";

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
  inicialList("coin=USD");
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

const hideHam = () => {
  document.querySelector(".menu ul").classList.remove("active");
  document.querySelector("main").classList.remove("mt-main");
  hamburguer.setAttribute("class", "fa-solid fa-bars");
};

const hamburguer = document.querySelector("#hamburguer");
hamburguer.addEventListener("click", () => {
  maybeShowHam();
});

window.addEventListener("scroll", () => {
  hideHam();
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

function openModal(CryptoName, Category, lastUpdated, Desc, Logo) {
  modal.style.display = "block";
  modalContent.innerHTML = `
  <div class="row ai-ce jc-sa-xs">
    <h2>${CryptoName}</h2>
    <img style="margin-left:15px;" src="${Logo}">
  </div>
  <div class="mt-15 mb-15"><span>Category:</span>${Category}</div>

  <div class="mt-15 mb-15"><span>Coin Description:</span>${Desc}</div>
  <div class="mt-15 mb-15"><span>Updated At:</span>${lastUpdated}</div>
  `;
}

const secondatyReqs = async (params) => {
  let url = "FetchPostApi.php";
  let result = await (
    await fetch(url, {
      method: "POST",
      headers: {
        Accept: "application/json, text/plain, */*",
        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
      },
      body: params,
    })
  ).json();
  return result;
};

const inicialList = async (params) => {
  document.querySelector("#loader").classList.remove("invisible");
  let myObj = await secondatyReqs(params);
  myObjRes = myObj;
  document.querySelector("#ulHeader").innerHTML = `        <li class="Crypto">
  <div class="row ai-ce">
      <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 row ai-ce infos">
          <div class="row ai-ce col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
              <p style="width: 50px;margin: 5px 10px;">Logo</p>
              <h1 class="CryptoName">Name</h1>
          </div>
          <div class="row ai-ce col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 jc-sb">
              <div>
                  <p class="italic">Site</p>
              </div>
              <div class="row">
                  <h5>Abrev</h5>
              </div>
          </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 row ai-ce jc-se prices">
          <div class="row ai-ce jc-ce">
              <p>Current price</p>
          </div>
          <p>Variation</p>
      </div>
  </div>
</li>`;
  myObjRes.forEach((element) => {
    document.querySelector("#ulMain").innerHTML += `
        <li class="Crypto ${element.CryptoName.replace(
          " ",
          ""
        )}" onclick='openModal("${element.CryptoName}","${element.Category}","${
      element.lastUpdated
    }","${element.Desc}","${element.Logo}")'>
        <div class="row ai-ce">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 row ai-ce infos">
                <div class="row ai-ce col-7 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <img src="${element.Logo}" alt="${element.CryptoName}">
                    <h1 class="CryptoName">${element.CryptoName}</h1>
                </div>
                <div class="row ai-ce col-5 col-sm-4 col-md-4 col-lg-4 col-xl-4 jc-sb jc-sa-xs">
                <div>
                  <a name="${element.CryptoName.replace(" ", "")}" href="${
      element.Site
    }"><i class="fa-solid fa-globe"></i>
                  </a>
                </div>
                <div class="row">
                    <h6>${element.Abrev}</h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 row ai-ce jc-se prices">
            <div class="row ai-ce jc-ce">
            <i class="fa-solid fa-dollar-sign"></i>
                <p class="thePrice"> ${eval(element.Price).toFixed(5)}</p>
                </div>
                <p class="thePercent row ai-ce"> ${eval(element.h1).toFixed(5)}
                ${verifyPercentChange(eval(element.h1))}</p>
            </div>
        </div>
    </li>
        `;
  });
  document.querySelector("#loader").classList.add("invisible");
};

const changePrices = async (param) => {
  document.querySelector("#loader").classList.remove("invisible");
  myObjRes = await secondatyReqs(param);
  myObjRes.forEach((element) => {
    document.querySelector(
      `.${element.CryptoName.replace(" ", "")} .row .prices .thePrice`
    ).textContent = `${eval(element.Price).toFixed(5)}`;
  });
  document.querySelector("#loader").classList.add("invisible");
  selecCoin = param;
  handleChangeTime(selecTime, myObjRes);
};

const handleChangeTime = (selectedTime, obj) => {
  selecTime = selectedTime;
  document.querySelectorAll(".graph").forEach((e) => {
    e.style.display = "none";
  });
  obj.forEach((element) => {
    const percent = document.querySelector(
      `.${element.CryptoName.replace(" ", "")} .row .prices .thePercent`
    );
    if (selectedTime == "h1")
      percent.innerHTML = `${eval(element.h1).toFixed(5)}${verifyPercentChange(
        eval(element.h1)
      )}`;
    if (selectedTime == "h24")
      percent.innerHTML = `${eval(element.h24).toFixed(5)}${verifyPercentChange(
        eval(element.h24)
      )}`;
    if (selectedTime == "d7")
      percent.innerHTML = `${eval(element.d7).toFixed(5)}${verifyPercentChange(
        eval(element.d7)
      )}`;
    if (selectedTime == "d30")
      percent.innerHTML = `${eval(element.d30).toFixed(5)}${verifyPercentChange(
        eval(element.d30)
      )}`;
    if (selectedTime == "d60")
      percent.innerHTML = `${eval(element.d60).toFixed(5)}${verifyPercentChange(
        eval(element.d60)
      )}`;
    if (selectedTime == "d90")
      percent.innerHTML = `${eval(element.d90).toFixed(5)}${verifyPercentChange(
        eval(element.d90)
      )}`;
  });
};

const select = document.querySelector("#coin");
select.addEventListener("change", (event) => {
  const withoputSpaces = "coin=" + event.target.value.trim();
  changePrices(withoputSpaces);
});

const variationTime = document.querySelector("#VarTime");
variationTime.addEventListener("change", (event) => {
  const selectedTime = event.target.value;
  handleChangeTime(selectedTime, myObjRes);
  changePrices(selecCoin);
});

const verifyPercentChange = (valor) => {
  if (valor > 0) {
    return `<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-graph-up-arrow text-green graph" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
  </svg>`;
  } else {
    return `<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-graph-down-arrow text-red graph" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z" />
  </svg>`;
  }
};
