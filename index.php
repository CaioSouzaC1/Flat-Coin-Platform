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
                <li>Top Cryptos</li>
                <li>Newsletter</li>
                <li>Top Cryptos</li>
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
        <div class="row ai-ce col-6 col-sm-5 col-md-5 col-lg-5 col-xl-5">
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
                <option value="1h">1h</option>
                <option value="24h">24h</option>
                <option value="7d">7d</option>
                <option value="30d">30d</option>
                <option value="60d">60d</option>
                <option value="90d">90d</option>
            </select>
        </div>
        <div id="loader" class="lds-ring invisible">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div id="teste"></div>

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

function funcTest($funcParam)
{
    return  $funcParam;
}

if (isset($_POST['param'])) {
    funcTest($_POST['param']);
}


?>