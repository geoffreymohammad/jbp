<?php
require "layout/header.php";

$sqlcommand = mysqli_query($conn,"SELECT * FROM 
									project ORDER BY 
									project.id_project DESC");
$data = mysqli_fetch_assoc($sqlcommand);

?>
<?php do{ ?>
<div class="grid-pageproject">
	<div class="projecttitle">
			<h5><?=$data['title_project'];?></h5>
	</div>
	<table class="table-project">
		<tr class="tr-clear">
			<td colspan="5"></td>
		</tr>
		<tr>
			<td class="td-clear"></td>
			<td class="td-contentprojectimage">
				<img src = "upload/project/<?=$data['image_project1'];?>" id="imagepopup">
			</td>
			<?php if(!empty($data['image_project2'])){?>
			<td class="td-contentprojectimage">
				<img src = "upload/project/<?=$data['image_project2'];?>" id="imagepopup">
			</td>
			<?php }?>
			<?php if(!empty($data['image_project2'])){?>
			<td class="td-contentprojectimage">
				<img src = "upload/project/<?=$data['image_project3'];?>" id="imagepopup">
			</td>
			<?php }?>
			<td class="td-clear"></td>
		</tr>
		<tr class="tr-clear">
			<td colspan="5"></td>
		</tr>
		<tr>
			<td class="td-clear"></td>
			<td colspan=3 class="td-contentproject">
				<p><?=$data['information'];?></p>
			</td>
			<td class="td-clear"></td>
		</tr>
		<tr class="tr-clear">
			<td colspan="5"></td>
		</tr>
	</table>
</div>

<div id="popup-project1">
	<div class="popup-project-content">
		<span class="popup-close">&times;</span>
		<img src = "upload/project/<?=$data['image_project1'];?>">
	</div>
</div>
<div id="popup-project2">
	<div class="popup-project-content">
		<span class="popup-close">&times;</span>
		<img src = "upload/project/<?=$data['image_project2'];?>">
	</div>
</div>
<div id="popup-project3">
	<div class="popup-project-content">
		<span class="popup-close">&times;</span>
		<img src = "upload/project/<?=$data['image_project3'];?>">
	</div>
</div>
<?php }while($data = mysqli_fetch_assoc($sqlcommand));?>
<?php
require "layout/footer.php";
?>