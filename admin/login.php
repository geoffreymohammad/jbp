<?php

include "../config/db_connect.php";

$err = '';

if(isset($_POST['login']) && $_POST['login'] == "LOGIN"){
		
	$username = $_POST['username'];
	$password = MD5($_POST['password']);
	
	$sqlcommand = mysqli_query($conn,"SELECT * FROM admin WHERE 
									admin_user = '$username' AND admin_pass = '$password'");
	$data = mysqli_fetch_assoc($sqlcommand);
	
	if(mysqli_num_rows($sqlcommand)>0){
		session_start();
		
		$_SESSION['id_admin'] = $data['id_admin'];
		$_SESSION['login'] = true;
		
		header('location:index.php');
	}else{
		$err = "Username atau Password Salah  !!";
	}
}

?>
<html>
<head>
	<title>Welcome To Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
</head>
<body>
<table class="logo">
	<tr>
		<td><img id="logo" src="../assets/Logo.png"></td>
	</td>
</table>
<table class="grid-login">
	<form action="" method="post">
	<tr>
		<td>Username</td>
	</tr>
	<tr>
		<td><input type="text" name="username"></td>
	</tr>
	<tr>
		<td>Password</td>
	</tr>
	<tr>
		<td><input type="password" name="password"></td>
	</tr>
	<tr>
		<td><input type="submit" name="login" value="LOGIN"></td>
	</tr>
	<tr>
		<td>
		<p><?=$err;?></p>
		</td>
	</tr>
	</form>
	</div>
</table>

</body>
</html>