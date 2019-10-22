<?php 

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM project order by id_project ASC");

$data = mysqli_fetch_assoc($sqlcommand);

	if(!empty($data)){
?>
<a href="project_add.php?id=<?=$data['id_project'];?>" class="add-btn">Add Project</a>
<table border="1px solid black" class="table-list">
	<thead>
		<tr>
			<th class="td-num">No.</th>
			<th>Title</th>
			<th>Image1</th>
			<th>Image2</th>
			<th>Image3</th>
			<th>Information</th>
			<th class="td-edel">Edit/Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php $num = 0; do{ $num++; ?>
		<tr>
			<td class="td-num"><?=$num;?></td>
			<td><?=$data['title_project'];?></td>
			<td><img src="../upload/project/<?=$data['image_project1'];?>" style="width:100px"></td>
			<td><img src="../upload/project/<?=$data['image_project2'];?>" style="width:100px"></td>
			<td><img src="../upload/project/<?=$data['image_project3'];?>" style="width:100px"></td>
			<td><?=$data['information'];?></td>
			<td class="td-edel">
				<a href="project_edit.php?id=<?=$data['id_project'];?>" class="edit-btn">Edit</a><br><br>
				<a href="project_delete.php?id=<?=$data['id_project'];?>" class="del-btn">Delete</a>
			</td>
		</tr>
	<?php }while($data = mysqli_fetch_assoc($sqlcommand)); }else{?>
		<a href="project_add.php?id=<?=$data['id_project'];?>" class="add-btn">Add Project</a>
		<br>
	<div class="nodata">
		You have no data
	</div>
	<?php }?>
	</tbody>


</table>

<?php include "layout/footer.php"; ?>

