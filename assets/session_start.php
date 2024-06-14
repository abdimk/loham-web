<?php

// user login stuff
session_start();
if (!isset($_SESSION['valid'])) {
    sleep(2);
    header('Location: ../login.php');
    exit();
}

$name = $_SESSION['user'];
$email = $_SESSION['valid'];
$image = $_SESSION['image'];
$id = $_SESSION['id'];

