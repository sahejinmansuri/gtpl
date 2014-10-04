<?php
session_start();
$_SESSION['username'] = "";
unset($_SESSION['username']); 
session_destroy(); 
echo "Successfully Logout";
header("location:login.php"); 
exit();
?>


