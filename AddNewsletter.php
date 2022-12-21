<?php

$con = new mysqli("sql110.epizy.com", "epiz_33128973", "1G9Pueqd67ULN9");

try {
    if (!mysqli_select_db($con, "epiz_33128973_flatcoin")) {
        throw new Exception;
    } else {
        $connection = mysqli_connect("sql110.epizy.com", "epiz_33128973", "1G9Pueqd67ULN9", "epiz_33128973_flatcoin");
    }   
} catch (Exception $e) {
    mysqli_query($con, "CREATE DATABASE epiz_33128973_flatcoin");
    $con = mysqli_connect("sql110.epizy.com", "epiz_33128973", "1G9Pueqd67ULN9", "epiz_33128973_flatcoin");
} finally {
    $createTable = mysqli_query($con, 'CREATE TABLE IF NOT EXISTS userData(email varchar(80) NOT NULL );');
}

$userEmail = $_POST['userEmail'];

$result = mysqli_query($con, "INSERT INTO userData (email) VALUES ('$userEmail')");

if ($result) {
    header('Location: ./?Newsletter=Success#newsletter');
} else {
    header('Location: ./?Newsletter=Failure#newsletter');
}
