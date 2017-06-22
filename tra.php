<html>
<head>
<title>Registration Form</title>
<style type="text/css">
h3
{
color:red;
}
</style>
</head>
<body>
<?php
$name = $id = $email = $phone ="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $name = test_input($_POST["name"]);
   $id = test_input($_POST["id"]);
   $phone= test_input($_POST["phone"]);
  $email = test_input($_POST["email"]);
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<h2 style="color:blue;border-bottom:solid;">Registration Form:-</h2>
<br/>
<div>
<h3 style="color:red;border-bottom:solid;">Instructions For Filling Form:-</h3>
<ul>
<li>Please fill all the required fields indicated by "*"</li>
<li>Password Must atleast 8 characters</li>
<li>Password may be characters or numerators</li>
<li>User id must be your roll number for students and it must be given as 13815a0503 like that.</li>
</ul>
</div>
<legend><h3 style="color:#cc66ff;border-bottom:solid;">Enter Log In Details Here:-</h3></legend>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h3 style="color:green;">
Enter User name:-<br><input type="text" name="name" size="40">*<br>
Enter Id:- <br><input type="text" name="id" size="40">*<br>
Enter phone num:-<br><input type="text" name="phone" size="40">*<br>
Enter email:-<br><input type="text" name="email" size="40">*<br>
</h3>
</br>
<INPUT TYPE="submit" NAME="Admin" VALUE="Save"  STYLE="color:#cc66ff;font-weight:bold;font-size:20px;height:40px;width:90px;">
<INPUT TYPE="reset" NAME="User" VALUE="Cancel" STYLE="color:#cc66ff;font-weight:bold;font-size:20px;height:40px;width:90px;margin-left:20px;">
</form>
<?php
if($name!="")
{
$idlen=strlen($id);
if($idlen>7)
{
$con=mysql_connect("localhost:80","root","ram2");
$db=mysql_select_db("hii",$con);
if($db)
{
$r=mysql_query("insert into rig values('$name','$id','$email','$phone')");
if($r)
echo "<h3>Saved Details Successfully...!</h3>";
else
echo "<h3>Error while addding the data..!";
}
else
echo "<h3>Database not found...!</h3>";
mysql_close($con);
}
else
echo "<h3>please enter password must be atleast 8 characters..!";
}
?>
</body>
</html>
