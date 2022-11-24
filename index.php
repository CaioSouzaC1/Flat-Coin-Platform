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
                <li>Top Cryptos</li>
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
<main>
    <div class="configs">
        <h3>Select Coin:</h3>
        <select id="coin">
            <?php
            foreach ($coins as $convertCoin) {
            ?>

                <option value=" <?= $convertCoin ?> "> <?= $convertCoin ?> </option>

            <?php } ?>
        </select>
        <br>
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
    <div id="teste"></div>

    <ul>
        <?php
        foreach ($cryptos[0] as $SingleCrypto) {
        ?>
            <li class="Crypto" onclick='openModal(<?= json_encode($SingleCrypto) ?>)'>
                <div class="row ai-ce">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 row ai-ce infos">
                        <div class="row ai-ce col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <img src="<?= $SingleCrypto[8] ?>" alt="<?= $SingleCrypto[1] ?>">
                            <h1 class="CryptoName"><?= $SingleCrypto[1] ?></h1>
                        </div>
                        <div class="row ai-ce col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <h5>Abrev:</h5>
                            <h6><?= $SingleCrypto[2] ?></h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 row ai-ce">
                        <a href="<?= $SingleCrypto[9] ?>"><i class="fa-solid fa-globe"></i></a>
                        <i class="fa-solid fa-hand-holding-dollar"></i> <?= $SingleCrypto[4][0] ?>
                        % last 24%
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-graph-down-arrow text-red" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-graph-up-arrow text-green" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                        </svg>
                        <?= $SingleCrypto[4][4] ?>
                    </div>

                </div>
            </li>
        <?php }
        ?>
    </ul>
</main>
<section>
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