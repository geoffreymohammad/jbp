<?php 

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$sqlcommand = mysqli_query($conn,"SELECT category.*,product.* FROM product LEFT JOIN 
						category on product.id_category = category.id_category 
						order by product.id_product ASC");

$data = mysqli_fetch_assoc($sqlcommand);

if(!empty($data)){
?>
<a href="product_add.php?id=<?=$data['id_product'];?>" class="add-btn">Add Product</a>
<table border="1px solid black" class="table-list">
	<thead>
		<tr>
			<th class="td-num">No.</th>
			<th>Title</th>
			<th>Category</th>
			<th>Image</th>
			<th>Description</th>
			<th>Specification</th>
			<th>Brochure</th>
			<th>Edit/Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php $num = 0; do{ $num++; ?>
		<tr>
			<td class="td-num"><?=$num;?></td>
			<td><?=$data['title_product'];?></td>
			<td><?=$data['category_name'];?></td>
			<td ><img src="../upload/product/<?=$data['image_product'];?>" style="width:100px"></td>
			<td><?=$data['description'];?></td>
			<td><img src="../upload/specification/<?=$data['specification'];?>" style="width:100px"></td>
			<td><?=$data['brosur'];?></td>
			<td class="td-edel">
				<a href="product_edit.php?id=<?=$data['id_product'];?>" class="edit-btn">Edit</a><br><br>
				<a href="product_delete.php?id=<?=$data['id_product'];?>" class="del-btn">Delete</a>
			</td>
		</tr>
<?php }while($data = mysqli_fetch_assoc($sqlcommand)); }else{?>
<a href="product_add.php?id=<?=$data['id_product'];?>" class="add-btn">Add Product</a>
<br>
	<div class="nodata">
	You have no data
	</div>

<?php } ?>
	</tbody>


</table>

<?php include "layout/footer.php"; ?>

