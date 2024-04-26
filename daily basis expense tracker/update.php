<?php
include("functions.php");

// Script By Akash Mondal

if(isloggedin()==FALSE)
{
header("location:index.php");  
}
else
{
  
}
$sid=$_SESSION['id'];


$con=mysqli_connect('localhost', 'root', '','exp');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="update  expense set Pname='$_POST[pname]',Pprice='$_POST[pprice]'  where id='$_POST[id]' ";
if(mysqli_query($con,$sql))
	header("refresh:1;url=homeedit.php");
else
	echo "not update";

?>