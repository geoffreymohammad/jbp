<?php

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

if(isset($_POST['add_product']) && $_POST['add_product'] == "ADD"){
	
	$title			= $_POST['title'];
	$category		= $_POST['category'];
	$description	= $_POST['description'];
	$specification	= $_FILES['spec-image']['name'];
	$image			= $_FILES['image']['name'];
	$brosur			= $_FILES['brosur']['name'];
	
	move_uploaded_file($_FILES['spec-image']['tmp_name'],"../upload/specification/".$specification);
	move_uploaded_file($_FILES['image']['tmp_name'],"../upload/product/".$image);
	move_uploaded_file($_FILES['brosur']['tmp_name'],"../upload/brosur/".$brosur);
	
	
	$sqlcommand = "INSERT INTO product (title_product,id_category,description,specification,image_product,brosur) 
						VALUE ('$title','$category','$description','$specification','$image','$brosur')";
	$conn->query($sqlcommand);
	
	if($sqlcommand){
		header('location:product_list.php');
	}
						
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM category ORDER BY category_name ASC");
$data = mysqli_fetch_assoc($sqlcommand);
?>
<form action="" method="post" enctype="multipart/form-data">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Title :</td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td class="td-configleft">Category :</td>
			<td><select name="category">
					<option value="tai"></option>
					<?php do{ ?>
						<option value="<?=$data['id_category'];?>"><?=$data['category_name'];?></option>
					<?php }while($data = mysqli_fetch_assoc($sqlcommand)); ?>
				</select></td>
		</tr>
		<tr>
			<td class="td-configleft">Description :</td>
			<td><textarea name="description"></textarea></td>
		</tr>
		<tr>
			<td class="td-configleft">Specification :</td>
			<td><input type="file" name="spec-image"></td>
		</tr>
		<tr>
			<td class="td-configleft">Image :</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td class="td-configleft">Brochure :</td>
			<td><input type="file" name="brosur"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" name="add_product" value="ADD"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>