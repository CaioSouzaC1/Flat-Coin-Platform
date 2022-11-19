<?php

require "ListingAllCryptos.php";

$cryptos = sendInfoToHome();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/CCSCSSFS.css">
    <link rel="stylesheet" href="./src/css/ResetCss.css">
    <link rel="stylesheet" href="./src/css/Main.css">
    <link rel="stylesheet" href="./src/css/Modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300;400;600;700;900&display=swap" rel="stylesheet">
    <title>FlatCoin Platform</title>
</head>

<body>
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
                    </div>
                </li>
            <?php }
            ?>
        </ul>
    </main>
    <footer>
        <div class="text-white row text-center">
            <h2>Study Project.</h2>
            <h3>Authors:</h3>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h4>Caio César <span class="tin">-> Front And Back-end</span></h4>
                <a href="https://github.com/CaioSouzaC1" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/caiocesardesouza2003/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin"></i></a>

            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h4>Luan Sarti <span class="tin">-> Back-end</span></h4>
                <a href="https://github.com/LuanSarti" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/luan-sarti-06495322b/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
</body>

<script src="./src/js/Script.js"></script>

</html>