<?php

include "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}

if(isset($_POST['add_category']) && $_POST['add_category'] == "ADD"){
	
	$name	= $_POST['name'];
	
	$sqlcommand = "INSERT INTO category (category_name) VALUE ('$name')";
	$conn->query($sqlcommand);
	
	if($sqlcommand){
		header('location:category_list.php');
	}
}
?>

<form method="post" action="">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Category Name :</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="add_category" value="ADD"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>