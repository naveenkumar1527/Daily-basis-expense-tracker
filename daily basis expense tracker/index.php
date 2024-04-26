<?php
include("functions.php");

$wrongpass = '';
$wronginfo = '<div class="alert alert-danger" role="alert">  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Wrong login detail</div>';

if(isloggedin()==FALSE)
{
}
else
{
header("location:home.php");  
  
}
  
  if(isset($_POST['email']) && ($_POST['pass']))
{

$pass= mysqli_real_escape_string($conn, $_POST['pass']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$query="SELECT * from users where uemail='$email'";
$result = $conn->query($query);

if ($result->num_rows < 1) 
  {
      $wrongpass = $wronginfo;
  }

 while($row = $result->fetch_assoc()) 
    {
  if(md5($pass)==$row['upass'])
  {
    $_SESSION['logged_in']=TRUE;
    $_SESSION['id']=$row['uid'];
    $_SESSION['unaam']=$row['uname'];
    session_start();
    header("location:home.php");
  }
  else
   {
    $wrongpass = $wronginfo;
   }
    }
  }


?>
<head>
    <title>Daily Expenses Manager</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <meta name=viewport content="width=device-width, initial-scale=1">

<script type="text/javascript">
$(document).ready(function(){
$("#name").keyup(function() {
var name = $('#name').val();
if(name=="")
{
$("#disp").html("");
}
else
{
$.ajax({
type: "POST",
url: "check.php",
data: "name="+ name ,
success: function(html){
$("#disp").html(html);
}
});
return false;
}
});
});
</script>
</head>
<body>

<div style="padding:13px; margin:13px;">
<div class="panel panel-primary">
  <div class="panel-heading"><b>Daily Expense Manager</b></div>
  <div class="panel-body">
  <div class="row">
  <div class="col-md-3">
  

  <div class="panel panel-success">
  <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Signin with your existing Account</div>
  <div class="panel-body">


  <form class="form-horizontal" name="login" action="index.php" method="post">
  <div class="form-group">
    <label for="Email" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="Email" placeholder="Email" name="email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Password" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="Password" placeholder="Password" name="pass" required>
    </div>
  </div>
  <?php
echo $wrongpass;
?>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>

  </div>
  </div>


  </div>
    <div class="col-md-3">
    <img src="demo.jpg" alt="..." class="img-thumbnail img-responsive">
    </div>

  <div class="col-md-6">
 <div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> New user? Create your free Account</div>
  <div class="panel-body">



<form class="form-horizontal" action="index.php" method="post">
  <div class="form-group">
    <label for="fname" class="col-sm-2 control-label" >Full Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fname" name="fname" autocomplete="off" required placeholder="Write your full name here">
    </div>
  </div>

  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" id="name" name="name" class="form-control"  autocomplete="off" required placeholder="Email">
      <div id="disp"></div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3" required placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" required> Agreed terms and conditions
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Create My Account</button>
    </div>
  </div>
</form>
<?php

if(isset($_POST['name']) && trim($_POST['password']) != "")
{

$name= mysqli_real_escape_string($conn, $_POST['name']);
$query="SELECT * from users where uemail='$name'";
$result = $conn->query($query);
if ($result->num_rows < 1) 
  {
$uname = mysqli_real_escape_string($conn, $_POST['fname']);
$uname = strip_tags($uname);
$uemail = mysqli_real_escape_string($conn, $_POST['name']);
$uemail = strip_tags($uemail);
$upass = mysqli_real_escape_string($conn, $_POST['password']);
$upass = md5($upass);

$sql = "INSERT INTO users (uname, uemail, upass)
VALUES ('$uname','$uemail','$upass')";
if ($conn->query($sql) === TRUE) 
  {
  echo '<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Your account has been created successfully!
</div>';
  } else 
  {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else
{
   echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> You already have an account and can access from login form
</div>';
}
}
?>
  </div>
  </div>

  </div>
  </div>
  </div>
  </div> 
    <div class="alert alert-info" role="alert">
      </div>
</div>
<?PHP 
Include ('footer.php'); 
?>
</body>
