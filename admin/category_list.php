<?php

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM category ORDER BY id_category ASC");
$data = mysqli_fetch_assoc($sqlcommand);

if(!empty($data)){
?>
<a href="category_add.php?id=<?=$data['id_category'];?>" class="add-btn">Add Category</a>
<table border="1px solid black" class="table-list">
	<thead>
		<tr>
			<th class="td-num">No.</th>
			<th>Category Name</th>
			<th class="td-edel">Edit/Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php $num = 0; do{ $num++; ?>
		<tr>
			<td class="td-num"><?=$num;?></td>
			<td><?=$data['category_name'];?></td>
			<td class="td-edel">
				<a href="category_edit.php?id=<?=$data['id_category'];?>" class="edit-btn">Edit</a>&nbsp;
				<a href="category_delete.php?id=<?=$data['id_category'];?>" class="del-btn">Delete</a>
			</td>
		</tr>
<?php }while($data = mysqli_fetch_assoc($sqlcommand)); }else{?>
	<a href="category_add.php?id=<?=$data['id_category'];?>" class="add-btn">Add Category</a>
	<br>
	<div class="nodata">
	You have no data
	</div>
<?php }?>
	</tbody>
</table>

<?php include "layout/footer.php"; ?>