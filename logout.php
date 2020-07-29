<?php
session_start();
unset($_SESSION['UID']);
header('location:app.php');
die();

?>