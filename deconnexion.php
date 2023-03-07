<?php
include 'connexion.php';
session_start();
session_destroy();
unset($_SESSION['id']);
header("location:login.php");
?>