<?php

// Script By rishee and rupam

include("functions.php");

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
    <title>Daily Expanses Manager</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-2.1.1.min.js"></script>
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

  <script>
  $(function() {
    $( "#edetail" ).autocomplete({
      source: 'readxp.php'
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
    background: url("data:image/png;base64,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") no-repeat left center transparent;
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
  <div class="panel-heading"><b>Daily Expanses Manager</b></div>
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
// CALL `add`();
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

//  tisum->
if ($tisum == '')
{echo "NIL";}
else
{echo $rbalance;}
?></span></blockquote>

</div>

</div>

<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   </div>

<div class="panel panel-info">
<div class="panel-heading"><a href="home.php"><b>Home</b></a>
</div>
<div class="panel-body"> 
<div class="row">
<div>


<div class="col-md-6">

<div class="panel panel-warning">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Add Expenses/Income Detail
  </div>
  <div class="panel-body">

  <form action="home.php" class="form-horizontal"  name="showexp" method="post" id="myForm" >
  <div class="col-lg-8">
      <script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
    return false;
    return true;
}    
</script>
      <input type="text" class="form-control" size="20"  name="entrydate" required placeholder="Choose Date" id="datepicker3" readonly  aria-label="..." value="<?php $thisday = strtotime($today);
    $thisday= date('d-m-Y', $thisday); echo $thisday; ?>">
      <input type="text" class="form-control" size="20" id="edetail"   name="edetail" required placeholder="Enter Detail/Source" title="Please Enter Source"  aria-label="..." autofocus>
      <input type="text" class="form-control" size="20" id="eamount" name="eamount" required placeholder="Enter Amount" aria-label="..." title="Please enter Amount"  onkeypress="return isNumberKey(event)"  >


  <div class="input-group">
      <span class="input-group-addon">Choose Type:
      <label><input type="radio"  name="enttype"  value="1" aria-label="..." checked="">Expense</label>
      <label><input type="radio" name="enttype"   value="2" aria-label="...">Income</label>
      </span>
        <span class="input-group-btn">
        <button  type="submit" class="btn btn-primary" ><b>Save</b>  <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
        </span>
    </div>  
  </form>



<?php
$uid=$sid;
if(isset($_POST["entrydate"]) && trim($_POST["entrydate"]) != "") 
  {

    $entrydate = $_POST["entrydate"];
    $entrydate = strtotime($entrydate);
    $entrydate= date('Y-m-d', $entrydate);
    $enttype = mysqli_real_escape_string($conn, $_POST["enttype"]);
    $edetail = mysqli_real_escape_string($conn,$_POST["edetail"]);
    $eamount = mysqli_real_escape_string($conn, $_POST["eamount"]);
    $edetail = strip_tags($edetail);
    $eamount = strip_tags($eamount);
    $eamount = floatval($eamount);

    if (isset($_POST["enttype"]) && trim($_POST["enttype"]) == "1") 
             
    {
$sql = "INSERT INTO expense (pname, pprice, uid, date )
VALUES ('$edetail','$eamount','$uid','$entrydate')";
if ($conn->query($sql) === TRUE) 
{
  echo "";
} 

else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    }

    elseif (isset($_POST["enttype"]) && trim($_POST["enttype"]) == "2") 
    {
$sql = "INSERT INTO income (income, tvalue, uid, date )
VALUES ('$edetail','$eamount','$uid','$entrydate')";
if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    }

  }


?>

    </div>  
  </div>
</div>


<table class="table table-hover table-striped table-bordered ">
   <caption><h4><span class="glyphicon glyphicon-leaf" ></span> Income report for this Year</h4></caption>
<tr class="info"><th>Date</th> <th> Income Source </th><th> Money </th><th><a href="homeedit.php" class='btn btn-sm'>Edit</a></th></tr>
<?php 
$sql = "SELECT * FROM income WHERE uid='$sid' AND isdel=0 ORDER by date";
//$sql = "SELECT * FROM income WHERE date >= '$thiyear' AND date <= '$today' AND uid='$sid' AND isdel=0 ORDER by date";
$result = $conn->query($sql);
$inctotal = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
        $exdate = strtotime($row["date"]);
        $exdate = date('d M Y', $exdate);
        echo "<tr><td> " . $exdate. "</td> <td> " . $row["income"]. " </td><td> " . $row["tvalue"]. "</td> <td> <a href='homeedit.php' class='btn btn-sm' name='remove' value='remove'><span class='glyphicon glyphicon-remove white' aria-hidden='true'></span></a></td></tr>";
        $inctotal+=$row["tvalue"];

    }
} else {
}

echo "<tr id='totalincome'><td> </td> <td> Total  </td><td>".$inctotal."</td></tr>";


if(isset($_GET['delincome']))
 {
     //$id = (int)$_GET['delincome'];
     //$removeQuery = "UPDATE income SET isdel='1' Where id=$id AND uid='$sid'";

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

</div>

  <div class="col-md-6">

<div class="panel panel-warning">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Trace Expense Record
  </div>
  <div class="panel-body">
  <div class="col-lg-8">

  <form action="home.php" class="form-horizontal"  name="showexp" method="post">
              <div class="form-group">
                <div class="input-group form_datetime" >      
                    <input class="form-control" size="60" type="text" value="" name="expdetail" placeholder="Type expense to find" >
                </div>
              </div>

              <div class="form-group">
                <div class="input-group form_datetime" >      
                    <input class="form-control" size="60" type="text" value="<?php $dstart = date("01-m-Y"); echo $dstart; ?>" id="datepicker1" name="startd" readonly placeholder="Start Date" >
                </div>
              </div>
            <div class="form-group">
                <div class="input-group date form_datetime" >
                <input class="form-control" size="50" type="text" value="<?php echo $thisday; ?>" id="datepicker2" name="endd" readonly placeholder="End Date" >
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><b>Show</b> <span class="glyphicon glyphicon-book" aria-hidden="true"></span></button>
      </span>
   </form>
       </div>
</div>
</div>
    


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


?>
<table class="table table-hover table-striped table-bordered">
   <caption><h4><span class="glyphicon glyphicon-list" ></span> Expense report from <?php echo $dstartn; ?> to <?php echo $dendn; ?>
   </h4>
<h4><?php 
if (empty($_POST["expdetail"])) {

$query = "SELECT SUM(tvalue) FROM income WHERE date >= '$dstart' AND date <= '$dend' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$isum = $psum['SUM(tvalue)']; 
if ($isum =='')
{
}
else
{
echo 'Income <span class="label label-success">';
echo $isum;
}
} 

?></span>

<?php 

} // end of if empty condition

$query = "SELECT SUM(pprice) FROM expense WHERE date >= '$dstart' AND date <= '$dend' AND uid='$sid' AND pname LIKE '%$expdetail%' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$ppsum = $psum['SUM(pprice)']; 

if ($ppsum !='')
{
echo '<b>'.$expdetail.'</b>  Expenses <span class="label label-danger">'.$ppsum.'</span> ';
}
else {echo ' Expenses <span class="label label-danger">NIL</span>';}
} 

?>
<?php 

if(!empty($isum))

//if ($isum =='')
{
echo ' Balance <span class="label label-default">';
$btotal = $isum - $ppsum;
echo $btotal;
}


?>
</span>
</h4>
</caption>
<tr class="success"><th>Date</th> <th> Expense Description </th><th> Total Price</th><th><a href="homeedit.php" class='btn btn-sm'>Edit</a></th></tr>

<?php 

$sql = "SELECT * FROM expense WHERE date >= '$dstart' AND date <= '$dend' AND uid='$sid' AND pname LIKE '%$expdetail%' AND isdel=0 ORDER by date ";

$result = $conn->query($sql);
if ($result->num_rows > 0) 
    {
    while($row = $result->fetch_assoc()) 
    {
      $exdate = strtotime($row["date"]);
      $exdate = date('d M Y', $exdate);
        echo "<tr><td> " . $exdate. "</td> <td> " . $row["pname"]. " </td><td> " . $row["pprice"]. "</td><td> <a href='homedel.php' id='del' class='btn btn-sm' name='remove' value='remove'><span class='glyphicon glyphicon-remove white' aria-hidden='true'></span></a></td></tr>";
    }
} else {
        echo "<tr><td> </td> <td class='alert alert-danger' role='alert'> No Expense in given Dates </td><td> </td></tr>";
}

 echo "<tr id='totalexp'><td> </td> <td> Total   </td><td id='totexp'>  ".$ppsum." </td></tr>";


?>
</table>
</div>
<?php
 if(isset($_GET['del']))
 {
    // $id = (int)$_GET['del'];
     //$removeQuery = "UPDATE expense SET isdel='1' Where id=$id AND uid='$sid'";

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
</div>





</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

</body>


