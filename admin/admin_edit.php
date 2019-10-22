<?php

include"layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_admin']) && $_POST['edit_admin'] == "SAVE"){
	
	$cond		= "";
	$name		= $_POST['name'];
	$username	= $_POST['username'];
	$password	= MD5($_POST['password']);
	$cond		.= "admin_name = '$name', admin_user = '$username'";
	if(!empty($_POST['password'])){
		$password = MD5($_POST['password']);
		$cond .= ",admin_pass = '$password'";
	}
	
	$sqlcommand = mysqli_query($conn,"UPDATE admin SET $cond WHERE id_admin = '$id'");
	if($sqlcommand){
		header('location:admin_list.php');
	}
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM admin WHERE id_admin = '$id'");
$data = mysqli_fetch_assoc($sqlcommand);

?>

<form action="" method="post">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Name :</td>
			<td><input type="text" name="name" value="<?=$data['admin_name'];?>"></td>
		</tr>
		<tr>
			<td class="td-configleft">Username :</td>
			<td><input type="text" name="username" value="<?=$data['admin_user'];?>"></td>
		</tr>
		<tr>
			<td class="td-configleft">Password :</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="edit_admin" value="SAVE"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>