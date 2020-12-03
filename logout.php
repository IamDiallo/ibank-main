<?php
session_start();
unset($_SESSION["nom"]);
unset($_SESSION["mail_utili"]);
header("Location:login.php");
?>