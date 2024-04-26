
<?php 
?>
<html>
<head>
<title>Insert form data in mysql database using php</title>

</head>
<body>
  <form class="form-style-4" action="contact.php" method="post">
  <H1>CONTACT US</H1>
<label for="field1">

<span>Enter Your Name</span><input type="text" name="Name"  />
</label>
<label for="field2">
<span>Email Address</span><input type="email" name="Email"  />
</label>
<label for="field3">
<span>Short Subject</span><input type="text" name="Subject"  />
</label>
<label for="field4">
<span>Message to Us</span><textarea name="Message" onkeyup="adjust_textarea(this)" ></textarea>
</label>
<label>
<span> </span><input type="submit" value="Send Letter" />
</label>
<button class="buttonhome" formaction="index1.php">HOME
</button>
</form>
<style type="text/css">
.form-style-4{
  width:1150px;
  font-size: 16px;
  background: #495C70;
  padding: 60px 30px 60px 30px;
  border: 5px solid #53687E;
}
.form-style-4 input[type=submit],
.form-style-4 input[type=button],
.form-style-4 input[type=text],
.form-style-4 input[type=email],
.form-style-4 textarea,
.form-style-4 label
{
  font-family: Georgia, "Times New Roman", Times, serif;
  font-size: 16px;
  color: #fff;

}
.form-style-4 label {
  display:block;
  margin-bottom: 10px;
}
.form-style-4 label > span{
  display: inline-block;
  float: left;
  width: 150px;
}
.form-style-4 input[type=text],
.form-style-4 input[type=email] 
{
  background: transparent;
  border: none;
  border-bottom: 1px dashed #83A4C5;
  width: 275px;
  outline: none;
  padding: 0px 0px 0px 0px;
  font-style: italic;
}
.form-style-4 textarea{
  font-style: italic;
  padding: 0px 0px 0px 0px;
  background: transparent;
  outline: none;
  border: none;
  border-bottom: 1px dashed #83A4C5;
  width: 275px;
  overflow: hidden;
  resize:none;
  height:20px;
}

.form-style-4 textarea:focus, 
.form-style-4 input[type=text]:focus,
.form-style-4 input[type=email]:focus,
.form-style-4 input[type=email] :focus
{
  border-bottom: 1px dashed #D9FFA9;
}

.form-style-4 input[type=submit],
.form-style-4 input[type=button]{
  background: #576E86;
  border: none;
  padding: 8px 10px 8px 10px;
  border-radius: 5px;
  color: #A8BACE;
}
.form-style-4 input[type=submit]:hover,
.form-style-4 input[type=button]:hover{
background: #394D61;

}
.buttonhome{
	background: #576E86;
  border: none;
  padding: 18px 10px 8px 10px;
  border-radius: 5px;
  color: #A8BACE;
}
</style>
<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>

</body>
</html>