<?php
session_start();
$message="";
if(count($_POST)>0) {
$con = mysqli_connect('localhost','root','','thanks') or die('Unable To connect');
$result = mysqli_query($con,"SELECT * FROM wp_users WHERE user_login='" . $_POST["name"] . "' and user_pass = '". $_POST["password"]."'");
$row = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["user_pass"] = $row["user_pass"];
$_SESSION["user_login"] = $row["user_login"];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["user_login"])) {
header("Location:index2.php");
}
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
Username:<br>
<input type="text" name="name">
<br>
Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
</body>
</html>