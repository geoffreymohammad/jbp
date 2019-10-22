<?php

include"layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_contact']) && $_POST['edit_contact'] == "SAVE"){
	
	$email			= $_POST['email'];
	$phone			= $_POST['phone'];
	$address		= $_POST['address'];
	
	$sqlcommand = mysqli_query($conn,"UPDATE contact set email = '$email' ,	phone = '$phone', address = '$address' WHERE id_contact = '$id'");
									
	if($sqlcommand){
		header('location:contact_list.php');
	}
}
	

$sqlcommand = mysqli_query($conn,"SELECT * FROM contact WHERE id_contact = '$id'");
$data = mysqli_fetch_assoc($sqlcommand);

?>

<form action="" method="post" enctype="multipart/form-data">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Email :</td>
			<td><input type="text" name="email" value="<?=$data['email'];?>"></td>
		</tr>
		<tr>
			<td class="td-configleft">Phone :</td>
			<td><input type="text" name="phone" value="<?=$data['phone'];?>"></td>
		</tr>
		<tr>
			<td class="td-configleft">Address :</td>
			<td><textarea name="address"><?=$data['address'];?></textarea></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="edit_contact" value="SAVE"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>