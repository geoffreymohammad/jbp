<?php
 
include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM admin order by id_admin ASC");
$data = mysqli_fetch_assoc($sqlcommand);
 
?>

<a href = "admin_add.php" class="add-btn">Add Admin</a>

<table border="1px solid black" class="table-list">
	<thead>
		<tr>
			<th class="td-num">No.</th>
			<th>Admin Name</th>
			<th>Username</th>
			<th>Password</th>
			<th class="td-edel">Edit/Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php $num = 0; do{ $num++; ?>
		<tr>
			<td class="td-num"><?=$num;?></td>
			<td><?=$data['admin_name'];?></td>
			<td><?=$data['admin_user'];?></td>
			<td><?=$data['admin_pass'];?></td>
			<td class="td-edel">
				<a href="admin_edit.php?id=<?=$data['id_admin'];?>"class="edit-btn">Edit</a>&nbsp;
				<a href="admin_delete.php?id=<?=$data['id_admin'];?>" class="del-btn">Delete</a>
			</td>
		</tr>
		<?php }while($data = mysqli_fetch_assoc($sqlcommand));?>
	</tbody>

</table>

<?php include "layout/footer.php"; ?>