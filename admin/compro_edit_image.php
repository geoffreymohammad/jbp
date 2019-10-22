<?php

include"layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_compro']) && $_POST['edit_compro'] == "SAVE"){
	
	$image	= $_FILES['image']['name'];
	
	if(!empty($image)){
		move_uploaded_file($_FILES['image']['tmp_name'],"../upload/compro/".$image);
		$sqlcommand = mysqli_query($conn,"UPDATE compro set compro_image = '$image' WHERE id_compro = '$id'");
	}
	
	
	
	if($sqlcommand){
		header('location:compro_list.php');
	}
}
	

$sqlcommand = mysqli_query($conn,"SELECT * FROM compro WHERE id_compro = '$id'");
$data = mysqli_fetch_assoc($sqlcommand);

?>

<form action="" method="post" enctype="multipart/form-data">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Image :</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="edit_compro" value="SAVE"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>