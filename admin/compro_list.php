<?php 

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM compro order by id_compro ASC");

$data = mysqli_fetch_assoc($sqlcommand);


?>
<table border="1px solid black" class="table-list">
	<thead>
		<tr>
			<th>About Us</th>
			<th class="td-edel">Edit/Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php $num = 0; do{ $num++; ?>
		<tr>
			<td><?=$data['aboutus'];?></td>
			<td class="td-edel">
				<a href="compro_edit.php?id=<?=$data['id_compro'];?>" class="edit-btn">Edit</a>&nbsp;
				<a href="compro_delete.php?id=<?=$data['id_compro'];?>" class="del-btn">Delete</a>
			</td>
		</tr>
	</tbody>
	<thead>
		<tr>
			<th>Image</th>
			<th class="td-edel">Edit/Delete</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><img src="../upload/compro/<?=$data['compro_image'];?>" style="width:100px"></td>
			<td class="td-edel">
				<a href="compro_edit_image.php?id=<?=$data['id_compro'];?>" class="edit-btn">Edit</a>&nbsp;
				<a href="compro_delete.php?id=<?=$data['id_compro'];?>" class="del-btn">Delete</a>
			</td>
		</tr>
	<?php }while($data = mysqli_fetch_assoc($sqlcommand)); ?>
	</tbody>
</table>

<?php include "layout/footer.php"; ?>
