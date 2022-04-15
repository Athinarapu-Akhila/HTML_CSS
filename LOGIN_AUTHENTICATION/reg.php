<?php
session_start();
$name=$_REQUEST["name"];
$pw=$_REQUEST["password"]; 
$cpw=$_REQUEST["upassword"]; 
$mail=$_REQUEST["mail"]; 
if(isset($_REQUEST['radios']))
{
$gender=$_REQUEST['radios']; 
}
$address=$_REQUEST["address"]; 
$con=mysqli_connect("localhost","root","") or die("Could not connect to server");
$db=mysqli_select_db($con,"akhila") or die("query failed:".mysql_error());
$query ="insert into logintable values('$name','$pw','$cpw','$mail','$gender','$address')";
$result= mysqli_query($con,$query) or die("query failed:".mysql_error());
echo $_SESSION["username"]." You are Registered Succesfully";
session_destroy();
mysqli_close($con);
?>
