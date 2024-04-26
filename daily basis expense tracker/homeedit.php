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
?>
<head>
    <title>Daily Expenses Manager</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.form.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <meta name=viewport content="width=device-width, initial-scale=1">
  <script>

 $(function() {
    $( "#datepicker1" ).datepicker({dateFormat: "dd-mm-yy"});
    $( "#datepicker2" ).datepicker({dateFormat: "dd-mm-yy"});
    $( "#datepicker3" ).datepicker({dateFormat: "dd-mm-yy"});

  });
  </script>

   <script> 
        $(document).ready(function() { 
            $('#myForm').ajaxForm(function() { 
                 alert("Given information Successfully Saved"); 
                 location.href = 'home.php';
            }); 
        }); 
    </script>
<style>
.circle {
  display: block;
  width: 100px;
  height: 100px;
  margin: 0px 5px 5px 20px;
  background-size: cover;
  background-repeat: no-repeat;
  -webkit-border-radius: 99em;
  -moz-border-radius: 99em;
  border-radius: 99em;
  border: 5px solid #eee;
  box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);  
}
.red
{
  color: white;
}

.button {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    padding: 5px 10px;
    border: 1px solid #433331;
    border-radius: 8px;
    background: #7e605d;
    background: -webkit-gradient(linear, left top, left bottom, from(#7e605d), to(#433331));
    background: -moz-linear-gradient(top, #7e605d, #433331);
    background: linear-gradient(to bottom, #7e605d, #433331);
    text-shadow: #281e1d 1px 1px 1px;
    font: normal normal bold 20px times new roman;
    color: #ffffff;
    text-decoration: none;
}
.button:hover,
.button:focus {
    border: 1px solid ##4f3c3a;
    background: #977370;
    background: -webkit-gradient(linear, left top, left bottom, from(#977370), to(#503d3b));
    background: -moz-linear-gradient(top, #977370, #503d3b);
    background: linear-gradient(to bottom, #977370, #503d3b);
    color: #ffffff;
    text-decoration: none;
}
.button:active {
    background: #433331;
    background: -webkit-gradient(linear, left top, left bottom, from(#433331), to(#433331));
    background: -moz-linear-gradient(top, #433331, #433331);
    background: linear-gradient(to bottom, #433331, #433331);
}
.button:before{
    content:  "\0000a0";
    display: inline-block;
    height: 24px;
    width: 24px;
    line-height: 24px;
    margin: 0 4px -6px -4px;
    position: relative;
    top: 1px;
    left: 0px;
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAGJklEQVRIiYWWW2xU1xWGv7XPZTwXz4xtjGfM+AYukJIYYkvQgAhJaJQiQO1jEwmhuKhVK6WRyFNUqYrUvlVNHqJWlUqJEFUr9aWKShS1IRBI09CkhuBCceyAje+4tud65nr22X1wYjVqaH5pS1tLW/+/9tJa+9/C/8Fr6cGkgd2IHAazWSBjDAEii8C4YN4EPnh2/mrufhzyRcHT6YfjgpxAeM6CTNgSO+LauE0uGEO91qBca1AJCDRMg7xq4NTw/EjhSwVOp4cGRDhjw65U1CFzYA8bDj5KqK8HqzmG8X381SyVW+Msv32Z+Ws3WaoGNJBRMMeG56+O3lfgdHroiIg5k7BofejoQTY9/z3c7gy6VCKoVCAIML7G+BowiG1TuTnGwm9+y/i1MfKanDFybHhh5Nz/CJzuHBwQuNQRcZM7f/gsqe8eJ6jW8FezWMkEVjSCWBYARmt0sUR9dh5dKGB0wNLZPzBx4X2W6sGqMfL48MLIKIC1Rj4UB3k9aUnv0MkTpL4/TGMliwqFcDa2Y4XD6+SIoGwbFW7C6diIchxqUzOEt/QRWlmmuLAUrhl55Jux1O9fLy3W7E+vccLG7Hro6BN0fOcY9ek5nFQ7ViRCo1Zj/N33mPzwKo1sFtuyiLW3k9r5IFv2PYKTTtG8N0T2jbdIPraPvqlpbizkd/nICeBl67XOwSRwOh1xkjte+QmmVlvLrrUFL5fj4q9OUbh6nc2RKL0trXTGmmkJDMHMHPO3PibRv5mm1la0CLXbk4ivqc/NUQzY9q1Y+owCdlvQ3XVgD87GdhqLSzgbN6B9n/fP/o7I9Cw74kmabZsNR75B6+GnUFrTVGvQdm+FpT+eI/B9otu/QsOxcTNpko7CggywWynkUFSJat3/NaoTd1DNMVCK2ev/pDZynW7LRReKWIk4Tf19NPX3kbUtdL6ALhTg5sd4N8dQjkPQ04WuVIm0tRBV2JbIYaVga7TJxs10kvvLBVQohIgwffmvbNIQFErofBFTqSEiiAirhTw6X1xbuQKVa6OICJGeLgorq4jrELZAMJttC5NyXYegUqVy4xZWLAJAfXYet1JF1+oA6Ep5rUWNIajW0MXi+vzUpucwxhBKJihms7QYgytgQcZWCiVKaNxborG8gi55GGNochxMyUN/OilBuYoxZm1f+7wAshZvFEt4s/PE6j6iFEqCQCmY9es+/nIW/9+rVCcmERHatm3DL5XRXhXtVTG1+nqJTN1fi5cq6IJHU1/vWukmbmNVqoiyCEShRBaVJXLH9zW6WERcl+J7VwDY9OTjGNsiKHkYr4yfy6+XqJEvEHhlAq+MCoVIPPEoxhim33mXSFMYcV0aBhSMW9+OpwNjeDoWDik7EqZ6e5LYvj1Ee7tw0h14V0bAgJ/NkS17TPztCovnL9LhhLAiETb96CSRnTtYGZ9g9JVf0h1tRvsB2VI1APOS9XRLekXgGVWpJpu39KBXc1SmZkgc3E906xbCW7dQ+2SKoORRGf0X2Y9ukAnHiPX20Pni88QP7EXXG5x/8SXas0WaI1GKRY9KtXZXCT8WgD91D560LOvnvQMPoGwLnc0hj+2l/4Uf4EQiaK9M+eYY9akZAEK93YR3bENFwviVCpd++jMK5y/zQGcGXSgyMzWL1sELR6dHXhaAc90PxwV1Kdoc3ZXa3o9ybBrZPMVMis7hZ9i0ewhlW+tdJCIEvs/M3//Bh7/4Ndb0HF/t6sGUK9y7fRev5I0i7D88NVJYf67f7B4aEOFifENra1t/H1Ysip/Nk61WyG1Iktj1IJGOdgCKi0ssjlyjPrNAdzxBKpUiKHmsfDJJYXk1Z4w5cGh6zXg+Zzh/7hk6IsLZcCKRbN++FXdjG6ah0Z5HqeTh1arUA43rukSjUeKJBMqxqS+tsDw2TjmfXzWG40/d/QLD+Qxv9Q4OCHLWsu2BeGeaWE8XblsrynXBUmuHdEBQr1NfWaV0d5bC/Dza9z8ycPzJqZH7W+ZnuNA7FAdOiPCcWFa3G4sptzmG5YZABL9apVEqUS+VfKP1rDHm1QBz6utT177c9P8b7/QNJoHdIIeArWBSAsogsxjuIOYNgQ8OTN7/2/IflLLcG9WpELIAAAAASUVORK5CYII=") no-repeat left center transparent;
    background-size: 100% 100%;
}


</style>
</head>

<?php

$image="images/".$sid.".jpg";

if(file_exists($image))
{
}
else
{
  $image="images/noavatar.gif";
} 

?>

<body onLoad="document.showexp.edetail.focus()">
<div style="padding:10px; margin:10px;">
<div class="panel panel-primary">
  <div class="panel-heading"><b>Daily Expense Manager</b></div>
  <div class="panel-body">

<div class="media">
<div class="media-left">
<img  class="circle" src="<?php echo $image; ?>">
</div>
<div class="media-body">

<blockquote>
<h4 id="media-heading" class="media-heading"><b>Welcome <?php    echo $_SESSION['unaam']; ?></b> <a href='signout.php'  class="button" >Logout</a></h4> 
<strong>Total Earning :</strong> <span class="label label-success">
<?php 
$today = date("Y-m-d");
$dtstart = date("1950-m-d");
$thiyear = date("y-01-01");


$query = "SELECT SUM(tvalue) FROM income WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tisum = $psum['SUM(tvalue)']; 
if ($tisum == '')
{echo "Add income to display here";}
else
{echo $tisum;}
} 

?></span>
<!-- Today's Expenses Start-->
<br><strong>Today's Expenses :</strong> <span class="label label-danger" id='exptop'><?php 
$query = "SELECT SUM(pprice) FROM expense WHERE date = '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tesum = $psum['SUM(pprice)']; 
if ($tesum== '')
{echo "No Expense Today";}
else
{echo $tesum;}
} 

?></span>
<!-- Today's Expenses End -->

<br><strong>Total Expenses :</strong> <span class="label label-danger" id='exptop'><?php 
$query = "SELECT SUM(pprice) FROM expense WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tesum = $psum['SUM(pprice)']; 
if ($tesum== '')
{echo "Add expenses to display here";}
else
{echo $tesum;}
} 

?></span>



<br><strong>Total Balance :</strong> <span class="label label-default"><?php $rbalance = $tisum - $tesum;
if ($tisum == '')
{echo "NIL";}
else
{echo $rbalance;}
?></span></blockquote>

</div>

</div>



<div class="panel panel-info">
<div class="panel-heading"><a href="home.php"><b>Home</b></a>
</div>



<?php

if (!empty($_POST["endd"])) {

$dstart = $_POST['startd'];
$dend = $_POST['endd'];

$dstart = strtotime($dstart);
$dend = strtotime($dend);

$dstart= date('Y-m-d', $dstart);
$dend = date('Y-m-d', $dend);
  }
  else
  {
    $dstart = date("Y-m-01");
    $dend = date("Y-m-d");
  }

$expdetail = '';
if(!empty($_POST['expdetail']))
{
$expdetail = mysqli_real_escape_string($conn, $_POST['expdetail']);
}

$dstartn = strtotime($dstart);
$dstartn = date('d M Y', $dstartn);
$dendn = strtotime($dend);
$dendn = date('d M Y', $dendn);

echo '<table class="table table-hover table-striped table-bordered">';
   echo'<caption><h4><span class="glyphicon glyphicon-list" ></span> Expense report';
   echo '<br>';
   echo '<br>';
   echo '<br>';
$con=mysqli_connect('localhost', 'root', '','exp');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="select * from expense where uid='$sid'  AND isdel=0 ";
$records=mysqli_query($con,$sql);



echo '</span>';


echo '<table>';
  echo '<tr>';

 echo '<th> NAME</th>';
echo '<th>PRICE</th>';

 
 echo '</tr>';

while($row=mysqli_fetch_array($records))
{
  echo "<tr><form action = update.php method=post>";
  echo "<td><input type= text name =pname value= ' ".$row['pname']." '></td>";

echo "<td><input type= text name =pprice value= ' ".$row['pprice']." '></td>";
  
  echo "<td><input type= hidden name =id value= ' ".$row['id']." '></td>";
  echo "<td><input type= hidden name =uid value= ' ".$row['uid']." '></td>";
  echo "<td><input type= hidden name=isdel value= ' ".$row['isdel']." '>";
echo '<td><input type= submit>';
echo '</form></tr>';

}


?>


</div>
</div>
</div>
</div>



</body>


