<?php 

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$sqlcommand = mysqli_query($conn,"SELECT * FROM contact order by id_contact ASC");

$data = mysqli_fetch_assoc($sqlcommand);


?>
<table border="1px solid black" class="table-list">
	<thead>
		<tr>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th class="td-edel">Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $num = 0; do{ $num++; ?>
		<tr>
			<td><?=$data['email'];?></td>
			<td><?=$data['phone'];?></td>
			<td><?=$data['address'];?></td>
			<td class="td-edel">
				<a href="contact_edit.php?id=<?=$data['id_contact'];?>" class="edit-btn">Edit</a>&nbsp;
			</td>
		</tr>
	<?php }while($data = mysqli_fetch_assoc($sqlcommand)); ?>
	</tbody>


</table>

<?php include "layout/footer.php"; ?>

