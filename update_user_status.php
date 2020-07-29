<?php
session_start();
include('database.inc.php');
$uid=$_SESSION['UID'];
$time=time()+10;
$res=mysqli_query($con,"update account set last_login=$time where id=$uid");
?>