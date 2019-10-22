<?php

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

if(isset($_POST['add_compro']) && $_POST['add_compro'] == "ADD"){
	
	$aboutus	= $_POST['aboutus'];
	$image	= $_FILES['image']['name'];
	
	move_uploaded_file($_FILES['image']['tmp_name'],"../upload/compro/".$image);
	
	$sqlcommand = "INSERT INTO compro (aboutus,compro_image) 
						VALUE ('$aboutus','$image')";
	$conn->query($sqlcommand);
	
	if($sqlcommand){
		header('location:compro_list.php');
	}
						
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM compro ORDER BY id_compro ASC");
$data = mysqli_fetch_assoc($sqlcommand);
?>
<form action="" method="post" enctype="multipart/form-data">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Compro :</td>
			<td><textarea name="aboutus"></textarea></td>
		</tr>
		<tr>
			<td class="td-configleft">Image :</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="add_compro" value="ADD"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>