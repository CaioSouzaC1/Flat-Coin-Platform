<?php

session_start();
if ((!isset($_SESSION['user']) == true) and (!isset($_SESSION['mail']) == true)) {
    header('location:index.php?YoushouldntBeHere');
}
