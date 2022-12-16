<?php

$con = new mysqli("localhost", "root", "");

try {
    if (!mysqli_select_db($con, "epiz_33128973_flatcoin")) {
        throw new Exception;
    } else {
        $connection = mysqli_connect("localhost", "root", "", "epiz_33128973_flatcoin");
    }   
} catch (Exception $e) {
    mysqli_query($con, "CREATE DATABASE epiz_33128973_flatcoin");
    $con = mysqli_connect("localhost", "root", "", "epiz_33128973_flatcoin");
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
