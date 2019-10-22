<?php
require "layout/header.php";
$keyword = '%'.$_GET['txt_search'].'%';
$sqlcommand = mysqli_query($conn,"SELECT product.* ,category.* FROM 
									product LEFT JOIN category ON product.id_category = category.id_category WHERE title_product LIKE '$keyword' OR category_name LIKE '$keyword' ORDER BY 
									product.id_product DESC");
$data = mysqli_fetch_assoc($sqlcommand);

?>
<?php if(mysqli_num_rows($sqlcommand) > 0){ ?>
<div class="clear-search"></div>
<div class="container-search">
<?php do{ ?>
	<table class="article">
	<tr>
		<td class="td-article">
			<div class="grid">
				<div class="article-title">
					<a href="article.php?id=<?=$data['id_product'];?>">
					<?=$data['title_product'];?></a>
				</div>
				<div class="article-image">
					<img src = "upload/product/<?=$data['image_product'];?>">
				</div>
				<div class="article-spec">
					<ul>
						<li class="category-name"><?=$data['category_name'];?></li>
						<li><br>
							<?php 
							$num_char=50;
							$text=$data['description'];
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
					<a href="article.php?id=<?=$data['id_product'];?>">See More..</a>
				</div>
			</div>
		</td>
	</tr>
	</table>
<?php }while($data = mysqli_fetch_assoc($sqlcommand));?>
</div>
<?php }else{ ?>
	<h5 class="error-search">Sorry, We cannot find what You looking for</h5>
<?php } ?>
<?php
require "layout/footer.php";
?>