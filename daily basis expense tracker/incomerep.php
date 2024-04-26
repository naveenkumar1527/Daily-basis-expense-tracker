<table class="table table-hover table-striped table-bordered ">
   <caption><h4><span class="glyphicon glyphicon-leaf" ></span> Income report for this Year</h4></caption>
<tr class="info"><th>Date</th> <th> Income Source </th><th> Money </th><th> Delete </th></tr>
<?php 
include_once("functions.php");
$sid=$_SESSION['id'];
$sid=$sid;
$sql = "SELECT * FROM income WHERE YEAR(Date)=2015 AND uid='$sid' AND isdel=0 ORDER by date";
//$sql = "SELECT * FROM income WHERE date >= '$thiyear' AND date <= '$today' AND uid='$sid' AND isdel=0 ORDER by date";
$result = $conn->query($sql);
$inctotal = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
        $exdate = strtotime($row["date"]);
        $exdate = date('d M Y', $exdate);
        echo "<tr><td> " . $exdate. "</td> <td> " . $row["income"]. " </td><td> " . $row["tvalue"]. "</td> <td> <a href='home.php?delincome=".$row['id']."' class='btn btn-danger btn-sm' name='remove' value='remove'><span class='glyphicon glyphicon-remove white' aria-hidden='true'></span></a></td></tr>";
        $inctotal+=$row["tvalue"];

    }
} else {
}

echo "<tr id='totalincome'><td> </td> <td> Total  </td><td>".$inctotal."</td></tr>";


if(isset($_GET['delincome']))
 {
     $id = (int)$_GET['delincome'];
     $removeQuery = "UPDATE income SET isdel='1' Where id=$id AND uid='$sid'";

if (mysqli_query($conn, $removeQuery))
{
    echo "
   <script> 
          alert('Entry Deleted Successfully'); 
          location.href = 'home.php';
    </script>     

    ";
}
     
 }
?> 
</table>