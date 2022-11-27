<?php

$con = new mysqli("localhost", "root", "");

try {
    if (!mysqli_select_db($con, "FlatCoin")) {
        throw new Exception;
    } else {
        $connection = mysqli_connect("localhost", "root", "", "FlatCoin");
    }
} catch (Exception $e) {
    mysqli_query($con, "CREATE DATABASE FlatCoin");
    $con = mysqli_connect("localhost", "root", "", "FlatCoin");
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
