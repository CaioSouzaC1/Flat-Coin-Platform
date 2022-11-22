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
    $createTable = mysqli_query($con, 'CREATE TABLE IF NOT EXISTS Supers( usuario varchar(30) NOT NULL, email varchar(60) NOT NULL );');
}
session_start();

$user = $_POST['user'];
$mail = $_POST['email'];

$result = mysqli_query($con, "SELECT * FROM `Supers` WHERE `usuario` = '$user' AND `email`= '$mail'");

if (mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:adm.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php?login=LoginInválido');
}
