<?php
include("functions.php");

if(isloggedin()==FALSE)
{

}
else
{
  
}
$sid=$_SESSION['id'];


//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $conn->query("SELECT * FROM expense WHERE pname like '%$searchTerm%' AND uid='$sid' and isdel='0' group by pname");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['pname'];
}
//return json data
echo json_encode($data);
?>
