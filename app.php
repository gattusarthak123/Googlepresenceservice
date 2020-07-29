
<?php
session_start();
include('database.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$sql="select * from account where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    echo $count;
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['UID']=$row['id'];
		$time=time()+10;
		$res=mysqli_query($con,"update account set last_login=$time where id=".$_SESSION['UID']);
		header('location:dashboard.php');
		die();
	}else{
		$msg="Please enter correct login details";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Doc. Service</title>
    <link rel="stylesheet" type="text/css" href="style.css"></link>
</head>
<body>
    <div class="loginbox">
    <img src="./avatar.png" class="avatar"alt="Avatar"></img>
        <h1>Login Here</h1>
        <form method="POST" action="" >
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="submit" value="Login">
            <span style="color:red;"><?php
            echo $msg;
            ?></span>
            
            <p style="width:100%; text-align:center; margin-bottom: 20px;">New here?</p>
            <a href="./signup.html" style="border: 1px solid grey; background: whitesmoke; border-radius: 25px;
            padding: 10px; width: 100px; font-size: 20px; ">Sign Up</a>
        </form>
</div>
<?php



?>
</body>
</html>