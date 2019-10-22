<?php
require "layout/header.php";
$sqlcommand = mysqli_query($conn,"SELECT * FROM compro ORDER BY id_compro ASC");
$data=mysqli_fetch_assoc($sqlcommand);
?>
<table class="table-compro">
	<tr>
		<td colspan="5" class="td-abouttitle">
			<h1>PT. Jakarta Bangkit Pratama</h1>
		</td>
	</tr>
	<tr class="tr-clear">
			<td colspan="5"></td>
	</tr>
	<tr>
		<td class="td-clear"></td>
		<td class="td-aboutimg">
			<div class="compro-image">
				<img src="upload/compro/<?=$data['compro_image'];?>">
			</div>
		</td>
		<td class="td-clear"></td>
		<td class="td-aboutarticle">
			<p>
				<div class="compro">
					<?=$data['aboutus'];?>
				</div>
			</p>
		</td>
		<td class="td-clear"></td>
	</tr>
	<tr class="tr-clear">
			<td colspan="5"></td>
	</tr>
</table>


<?php
require "layout/footer.php";
?>