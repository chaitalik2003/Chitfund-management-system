<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Collaboration
Description: A two-column, fixed-width design suitable for small websites and blogs.
Version    : 1.0
Released   : 20080102

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Collaboration by Free CSS Templates</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
#logo h1 em {
    font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
}
#logo h2 {
    font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;
}
</style>
</head>
<body>
<div id="menu">
	<ul>
		
	</ul>
</div>
<div id="logo">
	<h1><em>Chit Fund</em></h1>
	<h2>By chaitali kulkarni</h2>
</div>
<div id="splash">
	<img src="images/img05.jpg" alt="" />
</div>
<hr />

<html>
<h2><center>Login page</center></h2>
<body>
<form name=frm method=post action=loginpage.php>
<center>
<table>
<tr>
<td>UserId:</td>
<td><input type="text" name=ui></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="text" name=ps></td>
</tr>
</table>

<input type="submit" name=sbm value="LOGIN"><br>
</form>
</center>
</body>
</html>
<?php
if(isset($_POST['sbm']))
{
if($_POST['ui']=="admin" && $_POST['ps']=="admin")
{
header("location:http://localhost/project/index1.html");
}
else
{
$cn=mysql_connect("localhost","root");
mysql_select_db("chitfund",$cn);
$ui=$_POST['ui'];
$ps=$_POST['ps'];
$sql="select count(*) from user where user_id='$ui' and password='$ps'";
$result=mysql_query($sql,$cn);
$row=mysql_fetch_array($result);
if($row[0]>0)
{
	session_start();
	$_SESSION['user_id']=$_POST['ui'];
	header("location:http://localhost/project/index.html");
}
}
}
?>