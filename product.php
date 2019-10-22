<?php
require "layout/header.php";

$sqlcommand = mysqli_query($conn,"SELECT category.* ,product.* FROM 
									product LEFT JOIN category ON product.id_category = category.id_category ORDER BY 
									product.id_product DESC");
$data = mysqli_fetch_assoc($sqlcommand);

?>
<?php do{ ?>
<div class="grid-pageproduct">
	<div class="producttitle">
			<h5><?=$data['title_product'];?></h5>
	</div>
	<table class="table-product">
		<tr>
			<td class="headertable">Description</td>
			<td class="td-clear"></td>
			<td></td>
		</tr>
		<tr>
			<td class="td-contentproduct">
				<p><?=$data['description'];?></p>
			</td>
			<td class="td-clear"></td>
			<td rowspan=2 class="td-contentproductimage">
				<img src = "upload/product/<?=$data['image_product'];?>">
			</td>
		</tr>
		<tr>
			<td class="headertable">Specification</td>
			<td class="td-clear"></td>
		</tr>
		<tr>
			<td class="td-specproduct">
				<img src="upload/specification/<?=$data['specification'];?>" id="popupimage">
			</td>
			<td class="td-clear"></td>
			<td class="td-download">
				<?php if(!empty($data['brosur'])){?>
					<a href="download.php?file=<?=$data['brosur'];?>">Download Brosur</a>
				<?php }?>
			</td>
		</tr>
		<tr class="tr-clear">
			<td colspan="4"></td>
		</tr>
	</table>
</div>
<?php }while($data = mysqli_fetch_assoc($sqlcommand));?>
<?php
require "layout/footer.php";
?>

