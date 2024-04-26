<!DOCTYPE html>
<html>
<head>
	<title>FEEDBACK</title>
    <style type="text/css">
    table
    {
        border-collapse: collapse;
        width:100%;
        color:#d96459;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
    }
    th 
    {
        background-color: #588c7e;
        color: white;
    }
    tr:nth-child(even).{background-color: #f2f2f2}
    
</style>
</head>
<body>
  
	<table>
		<tr>
			<th>NAME</th>
	<th>EMAIL</th>
	<th>MESSAGE</th>
</tr>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name, email,message FROM FEEDBACK";
$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["name"]."</td><td>". $row["email"]. "</td><td> " . $row["message"]."</td></tr>". "<br>"."<br>";
    }
echo "</table>";

} else {
    echo "0 results";
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

	</table>
    <p>
        <a href="trigger.php" class="btn btn-warning">User Details</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>

