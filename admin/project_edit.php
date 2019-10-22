<?php

include"layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_project']) && $_POST['edit_project'] == "SAVE"){
	
	$title			= $_POST['title'];
	$information	= $_POST['information'];
	$image1			= $_FILES['image1']['name'];
	$image2			= $_FILES['image2']['name'];
	$image3			= $_FILES['image3']['name'];
	
	if(!empty($image1)){
		move_uploaded_file($_FILES['image']['tmp_name'],"../upload/project/".$image);
		$sqlcommand = mysqli_query($conn,"UPDATE project set image_project1 = '$image1' 
											WHERE id_project = '$id'");
	}
	if(!empty($image2)){
		move_uploaded_file($_FILES['image']['tmp_name'],"../upload/project/".$image);
		$sqlcommand = mysqli_query($conn,"UPDATE project set image_project2 = '$image2' 
											WHERE id_project = '$id'");
	}
	if(!empty($image3)){
		move_uploaded_file($_FILES['image']['tmp_name'],"../upload/project/".$image);
		$sqlcommand = mysqli_query($conn,"UPDATE project set image_project3 = '$image3' 
											WHERE id_project = '$id'");
	}
	$sqlcommand = mysqli_query($conn,"UPDATE project set title_project = '$title' ,
									information = '$information' WHERE id_project = '$id'");
									
	if($sqlcommand){
		header('location:project_list.php');
	}
}
	

$sqlcommand = mysqli_query($conn,"SELECT * FROM project WHERE id_project = '$id'");
$data = mysqli_fetch_assoc($sqlcommand);

?>

<form action="" method="post" enctype="multipart/form-data">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Title :</td>
			<td><input type="text" name="title" value="<?=$data['title_project'];?>"></td>
		</tr>
		<tr>
			<td class="td-configleft">Information :</td>
			<td><textarea name="information"><?=$data['information'];?></textarea></td>
		</tr>
		<tr>
			<td class="td-configleft">Image1 :</td>
			<td><input type="file" name="image1"></td>
		</tr>
		<tr>
			<td class="td-configleft">Image2 :</td>
			<td><input type="file" name="image2"></td>
		</tr>
		<tr>
			<td class="td-configleft">Image3 :</td>
			<td><input type="file" name="image3"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="edit_project" value="SAVE"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>