<?php
session_start();
include("functions.php");
$_SESSION['logged_in']=FALSE;
session_unset();
session_destroy();
header("location:index1.php");

// Script By Akash Mondal

?>