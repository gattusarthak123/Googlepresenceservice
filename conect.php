

<?php
$id=6;
$username = filter_input(INPUT_POST,'username');
$password = filter_input(INPUT_POST,'password');
$firstname = filter_input(INPUT_POST,'firstname');
$lastname = filter_input(INPUT_POST,'lastname');
$gender = filter_input(INPUT_POST,'gender');
$last_login = 0;

if(!empty($username))
{
    if(!empty($password))
    {
        $host="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="logindetails";
        $id=$id+1;
    }
    else{
        echo "Password Should not be empty";
    die();
    }
}
else{
    echo "Username should not be empty";
    die();
}
//create connection
$conn =new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error())
{
    die('Connection Error ('. mysqli_connect_errorno().')'. mysqli_connect_error());

}
else{
    $sql="insert into account (id,username,password,last_login) 
    values('$id','$username','$password','0');";
    if($conn->query($sql))
    {
        echo "New record is Inserted successfully";
    }
    else{
        echo "sql error";
    }
    $conn->close();
}

?>