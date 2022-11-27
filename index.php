<?php

require "ListingAllCryptos.php";

$cryptos = sendInfoToHome("USD");
$coins = listConvertCoins();

?>

<?php

require "header.php";

?>

<header>
    <div class="row main_container jc-sb ai-ce">
        <div class="row jc-sb ai-ce logos">
            <i id="logo" class="fa-brands fa-bitcoin"></i>
            <span>FlatCoin</span>
            <span>Platform</span>
        </div>
        <div class="menu row pointer">

            <ul>
                <li><a href="#">Top Cryptos</a></li>
                <li><a href="#newsletter">Newsletter</a></li>
                <li><a href="#authors">Authors</a></li>
            </ul>
            <i id="hamburguer" class="fa-solid fa-bars"></i>
        </div>
    </div>
</header>

<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="theModalContent"></div>
    </div>

</div>
<main class="main_container">
    <div class="configs row ai-ce">
        <div class="row ai-ce col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
            <h3>Select Coin:</h3>
            <select id="coin">
                <?php
                foreach ($coins as $convertCoin) {
                ?>

                    <option value=" <?= $convertCoin ?> "> <?= $convertCoin ?> </option>

                <?php } ?>
            </select>
        </div>
        <div class="row ai-ce">
            <h3>Variation Time:</h3>
            <select id="VarTime">
                <option value="h1">1h</option>
                <option value="h24">24h</option>
                <option value="d7">7d</option>
                <option value="d30">30d</option>
                <option value="d60">60d</option>
                <option value="d90">90d</option>
            </select>
        </div>
        <div id="loader" class="lds-ring invisible">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <ul id="ulHeader">
    </ul>

    <ul id="ulMain">
    </ul>

</main>
<section id="newsletter">
    <div class="newsletter">
        <h2>Every friday updates about the best cryptocurrencies in your inbox</h2>
        <i class="fa-regular fa-envelope"></i>
        <form action="addnewsletter.php" method="POST">
            <label for="newsletterInput">Subscribe to our newsletter</label>
            <input type="text" id="newsletterInput" placeholder="yourbest@email.com">
            <br>
            <button type="submit">Subscribe</button>
        </form>
    </div>
</section>
<?php

require "footer.php";

?>