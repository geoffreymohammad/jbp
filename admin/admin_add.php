<?php

include"layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

if(isset($_POST['add_admin']) && $_POST['add_admin'] == "ADD"){
	
	
	$name		= $_POST['name'];
	$username	= $_POST['username'];
	$password	= MD5($_POST['password']);
	
	$sqlcommand = mysqli_query($conn,"INSERT INTO admin (admin_name,admin_user,admin_pass) 
										VALUE ('$name','$username','$password')");
	if($sqlcommand){
		header('location:admin_list.php');
	}
}
 

?>

<form action="" method="post">
		<table class="table-config">
		<tr>
			<td class="td-configleft">Name :</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td class="td-configleft">Username :</td>
			<td><input type="text" name="Username"></td>
		</tr>
		<tr>
			<td class="td-configleft">Password :</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="add_admin" value="ADD"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>