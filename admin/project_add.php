<?php

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

if(isset($_POST['add_project']) && $_POST['add_project'] == "ADD"){
	
	$title			= $_POST['title'];
	$information	= $_POST['information'];
	$image1			= $_FILES['image1']['name'];
	$image2			= $_FILES['image2']['name'];
	$image3			= $_FILES['image3']['name'];
	
	move_uploaded_file($_FILES['image']['tmp_name'],"../upload/project/".$image1);
	move_uploaded_file($_FILES['image']['tmp_name'],"../upload/project/".$image2);
	move_uploaded_file($_FILES['image']['tmp_name'],"../upload/project/".$image3);
	
	$sqlcommand = "INSERT INTO project (title_project,information,image_project1,image_project2,image_project3) 
						VALUE ('$title','$information','$image1','$image2','$image3')";
	$conn->query($sqlcommand);
	
	if($sqlcommand){
		header('location:project_list.php');
	}
						
}

?>
<form action="" method="post" enctype="multipart/form-data">
		<table class="table-config">
		<tr>
			<td class="td-configleft">Title :</td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td class="td-configleft">Information :</td>
			<td><textarea name="information"></textarea></td>
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
			<td colspan=2><input type="submit" name="add_project" value="ADD"></td>
		</tr>
	</table>	
</form>

<?php include "layout/footer.php"; ?>