<?php
require "layout/header.php";

$sqlcommand = mysqli_query($conn,"SELECT category.* ,product.* FROM 
									product LEFT JOIN category ON product.id_category = category.id_category ORDER BY 
									product.id_product DESC LIMIT 0,3");
$data = mysqli_fetch_assoc($sqlcommand);
?>
<table class="tablebody">
	<tr>
		<td class="td-logobody">
			<img src="assets/LogoBody.png">
		</td>
		<td class="td-welcome">
			Welcome!<br>
			<p>Welcome to our website. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ante mauris, bibendum a velit a, pharetra mattis justo. In hac habitasse platea dictumst. Nullam quis risus nisi. Fusce quis dictum nisi.</p>
		</td>
	</tr>
</table>
<table class="article">
	<tr>
		<?php do{ ?>
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
		<?php }while($data = mysqli_fetch_assoc($sqlcommand));?>
	</tr>
</table>
<?php
 require "layout/footer.php";
?>