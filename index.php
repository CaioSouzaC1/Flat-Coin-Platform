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
                    <li>
                        <select style="background: transparent; border: transparent;" name="coin" id="coin">
                            
                            <?php 
                            foreach($coins as $convertCoin){ 
                            ?>

                                <option value=" <?= $convertCoin ?> "> <?= $convertCoin ?> </option>

                            <?php } ?>
                            
                        </select>
                    </li>
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
    <ul>
        <?php
        foreach ($cryptos[0] as $SingleCrypto) {
        ?>
            <li class="Crypto" onclick='openModal(<?= json_encode($SingleCrypto) ?>)'>
                <div class="row ai-ce">
                    <img src="<?= $SingleCrypto[8] ?>" alt="<?= $SingleCrypto[1] ?>">
                    <h1><?= $SingleCrypto[1] ?></h1>
                    <h2>Sigla: <?= $SingleCrypto[2] ?></h2>
                    <a href="<?= $SingleCrypto[9] ?>"><i class="fa-solid fa-globe"></i></a>
                    <h2>Quotation: <?= $SingleCrypto[4][0] ?></h2>
                </div>
            </li>
        <?php }
        ?>
    </ul>
</main>
<?php

require "footer.php";

?>