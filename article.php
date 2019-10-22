<?php

include "layout/header.php";

$id=$_GET['id'];

$sqlcommand = mysqli_query($conn,"SELECT category.* ,product.* FROM 
					product LEFT JOIN category ON product.id_category = category.id_category 
					WHERE product.id_product = '$id'");
$data = mysqli_fetch_assoc($sqlcommand);

?>

<div class="col-9">
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
			<td class="td-specarticle">
				<img src = "upload/specification/<?=$data['specification'];?>" id="popupimage">
			</td>
			<td class="td-clear"></td>
		</tr>
	</table>
</div>
</div>
<div class="col-3">
	<h3>Another Article</h3>
	<?php
		$id_product = $data['id_product'];
		$id_category = $data['id_category'];
		$q_contain = mysqli_query($conn,"SELECT category.*, product.* FROM product LEFT JOIN category ON product.id_category = category.id_category WHERE product.id_category = '$id_category'");
		$contain = mysqli_fetch_assoc($q_contain);
	
	if(mysqli_num_rows($q_contain) > 0){	
	do{
			if($contain['id_product'] != $id_product){
				
	?>
	<div class="sidebar">
		<div class="grid">
			<div class="article-title">
				<a href="article.php?id=<?=$contain['id_product'];?>">
				<?=$contain['title_product'];?></a>
			</div>
			<div class="article-image">
				<img src = "upload/product/<?=$contain['image_product'];?>">
			</div>
			<div class="article-spec">
				<ul>
					<li class="category-name"><?=$contain['category_name'];?></li>
					<li><br>
						<?php 
						$num_char=50;
						$text=$contain['description'];
						$cut_text=substr($text,0,$num_char);

						if($text[$num_char-1] != ' '){
							$new_pos=strrpos($cut_text, ' ');
							$cut_text=substr($text,0,$new_pos);
						}
						echo $cut_text . '...'; ?>
					</li>
				</ul>
			</div>
			<div class="article-button">
				<a href="article.php?id=<?=$contain['id_product'];?>">See More..</a>
			</div>
		</div>
	</div>
				<?php }}while($contain = mysqli_fetch_assoc($q_contain));}?>
</div>

<div id="popup">
	<div class="popup-content">
		<span class="popup-close">&times;</span>
		<img src = "upload/specification/<?=$data['specification'];?>">
	</div>
</div>


<?php

include "layout/footer.php";

?>