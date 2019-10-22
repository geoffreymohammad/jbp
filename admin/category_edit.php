<?php

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_category']) && $_POST['edit_category'] == "SAVE"){
	
	$name	= $_POST['name'];
	
	$sqlcommand = mysqli_query($conn,"UPDATE category SET category_name = '$name' 
													WHERE id_category = '$id'");
	
	if($sqlcommand){
		header('location:category_list.php');
	}
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM category WHERE id_category = '$id'");
$data = mysqli_fetch_assoc($sqlcommand);

?>

<form method="post" action="">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Category Name :</td>
			<td><input type="text" name="name" value="<?=$data['category_name'];?>"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="edit_category" value="SAVE"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>