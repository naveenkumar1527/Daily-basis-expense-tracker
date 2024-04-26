
<?php
$connection = mysqli_connect('localhost', 'root', '','exp');
if (!$connection)
{
   echo "not connected to server";
   
}

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	$Name = $_POST["Name"];
	$Email = $_POST["Email"];
	$Subject = $_POST["Subject"];
	$Message = $_POST["Message"];

$sql="INSERT INTO feedback (Name,Email,Subject,Message) VALUES ('$Name','$Email','$Subject','$Message')";

if(!mysqli_query($connection,$sql))
{
	echo "Not Inserted";
}
else
{
	echo "Inserted";
}
header("refresh:2; url=contact1.php");
?>