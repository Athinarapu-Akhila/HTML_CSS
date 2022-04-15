<?php
session_start();
?>
<html>
<head>
<title> Redirecting </title>
</head>
<body style="background-color:#cdf2ee;margin-top:150px;">
<center>
<p style="font-size:20px">
<?php
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
$_SESSION["username"]=$_REQUEST["username"];
$_SESSION["password"]=$_REQUEST["password"];
$con=mysqli_connect("localhost","root","") or die("Could not connect to server");
$db=mysqli_select_db($con,"akhila") or die("query failed:".mysql_error());
$query="select * from logintable";
$result=mysqli_query($con,$query) or die("Query failed:".mysql_error());
$flag=0;
while($row=mysqli_fetch_array($result))
{
if($row['username']==$_REQUEST["username"] && $row['password']==$_REQUEST["password"])
{
echo "Welcome $username <br> You are successfully logged in <br> ";
$flag=1;
break;
}
else if($row['username']==$_REQUEST["username"] && $row['password']!=$_REQUEST["password"])
{
echo "Sorry We could not login . Password Mismatch";
$flag=1;
break;
}
}
if($flag==0)
{
echo " Could not find you. Enter details to login <br> ";
echo " Enter name full name and password";
include "registration.html";
}
mysqli_close($con);
?>
</p>
</center>
<p align="left">A.akhila<br>20255A0507<br>11/3/2022</p>
</body>
</html>

