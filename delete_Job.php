<?php

session_start();
$row_Select = $_GET['id2']

    
    /*defining variabes for database connection*/
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alumni";
    $link = mysqli_connect($hostname, $username, $password, $dbname);

    /*fetching from user table*/
    $sql1 = "Select * from user_career where id = '$row_Select' ";
    $res = mysqli_query($link, $sql1);

    $result = mysqli_fetch_assoc($res);

echo $result[0];
echo $result[1];
echo $result[2];
echo $result[3];
echo $result[4];
echo $result[5];


//header("location:profile.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>