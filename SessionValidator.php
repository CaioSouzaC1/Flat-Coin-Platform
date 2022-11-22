<?php

session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location:index.php?YoushouldntBeHere');
}
