<?php

include"layout/header.php";

$id = $_GET['id'];
$sqlcommand = mysqli_query($conn,"SELECT * FROM product WHERE id_category = '$id' ORDER BY id_product DESC");
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
			<td rowspan=3 class="td-contentproductimage">
				<img src = "upload/product/<?=$data['image_product'];?>">
			</td>
		</tr>
		<tr>
			<td class="headertable">Specification</td>
			<td class="td-clear"></td>
		</tr>
		<tr>
			<td class="td-specproduct">
				<img id="myImg" src="upload/specification/<?=$data['specification'];?>">
			</td>
			<td class="td-clear"></td>
		</tr>
		<tr class="tr-clear"></tr>
	</table>
</div>

<?php }while($data = mysqli_fetch_assoc($sqlcommand));?>

<script>

// Get the image and insert it inside the modal - use its "alt" text as a caption
$(document).ready(function(){
	$("#myImg").click(function(){
        alert("Text: ");
    });
});

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() { 
//     modal.style.display = "none";
// }
</script>

<?php
require "layout/footer.php";
?>