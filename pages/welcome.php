<?php
    
session_start();

echo "Welcome";
echo $_SESSION["name"];
header("location:profile.php");

?>