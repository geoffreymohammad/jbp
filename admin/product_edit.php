<?php

include"layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

if(isset($_POST['edit_product']) && $_POST['edit_product'] == "SAVE"){
	
	$title			= $_POST['title'];
	$category		= $_POST['category'];
	$description	= $_POST['description'];
	$specification	= $_FILES['spec-image']['name'];
	$image			= $_FILES['image']['name'];
	$brosur			= $_FILES['brosur']['name'];
	
	if(!empty($specification)){
		move_uploaded_file($_FILES['spec-image']['tmp_name'],"../upload/specification/".$specification);
		$sqlcommand1 = mysqli_query($conn,"UPDATE product set specification = '$specification' WHERE id_product = '$id'");
	}
	if(!empty($image)){
		move_uploaded_file($_FILES['image']['tmp_name'],"../upload/product/".$image);
		$sqlcommand2 = mysqli_query($conn,"UPDATE product set image_product = '$image' WHERE id_product = '$id'");
	}
	if(!empty($brosur)){
		move_uploaded_file($_FILES['brosur']['tmp_name'],"../upload/brosur/".$brosur);
		$sqlcommand3 = mysqli_query($conn,"UPDATE product set brosur = '$brosur' WHERE id_product = '$id'");
	}
	$sqlcommand = mysqli_query($conn,"UPDATE product set title_product = '$title' ,
									description = '$description' , 
									id_category = '$category' WHERE id_product = '$id'");
									
	if($sqlcommand){
		header('location:product_list.php');
	}
}
	

$sqlcommand = mysqli_query($conn,"SELECT * FROM product WHERE id_product = '$id'");
$data = mysqli_fetch_assoc($sqlcommand);

$category = mysqli_query($conn,"SELECT * FROM category ORDER BY category_name ASC");
$cat = mysqli_fetch_assoc($category);

?>

<form action="" method="post" enctype="multipart/form-data">
	<table class="table-config">
		<tr>
			<td class="td-configleft">Title :</td>
			<td><input type="text" name="title" value="<?=$data['title_product'];?>"></td>
		</tr>
		<tr>
			<td class="td-configleft">Category :</td>
			<td><select name="category">
					<option value="">Choose Category</option>
					<?php do{ ?>
						<option value="<?=$cat['id_category'];?>" 
						<?php if($data['id_category'] == $cat['id_category'])
						{echo "selected";}?>><?=$cat['category_name'];?></option>
					<?php }while($cat = mysqli_fetch_assoc($category)); ?>
					
				</select>
			</td>
		</tr>
		<tr>
			<td class="td-configleft">Description :</td>
			<td><textarea name="description"><?=$data['description'];?></textarea></td>
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
			<td colspan=2><input type="submit" name="edit_product" value="SAVE"></td>
		</tr>
	</table>
</form>

<?php include "layout/footer.php"; ?>