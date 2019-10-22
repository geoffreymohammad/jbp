<?php
require "config/db_connect.php";

$sqlcommand=mysqli_query($conn,"SELECT * FROM category ORDER BY id_category ASC");
$data=mysqli_fetch_assoc($sqlcommand);
?>
<html lang="en">
<head>
	<meta charset = "utf-8">
	<meta name="description" content="PT. Jakarta Bangkit Pratama">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Jasa Coating Tahan Api">
	
	<link rel="shortcut icon" type="image/x-icon" href="assets/IconLogo.png" />
	<title>Jakarta Bangkit Pratama</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/stylepage.css">
	<link href="magnifix-popup/magnific-popup.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="container">
		<header>
			<a href="index.php" class="logo-container"><img id="logoheader" src="assets/LogoHeaderClient.png"></a>
			<ul class="navbar">
				<li class="navmenu"><a href="product.php" class="navmenu-content">PRODUCT</a>
					<ul class="dropdown">
						<?php do{ ?>
							<li class="dropdown-container">
								<a href="category.php?id=<?=$data['id_category'];?>" class="dropdown-content">
								<?=$data['category_name'];?>
								</a>
							</li>
						<?php }while($data = mysqli_fetch_assoc($sqlcommand)); ?>
					</ul>
				</li>
				<li class="navmenu"><a href="project.php" class="navmenu-content">PROJECT</a></li>
				<li class="navmenu"><a href="aboutus.php" class="navmenu-content">ABOUT US</a></li>
			</ul>
			<form action="search.php" class="search" method="get">
				<input type="text" name="txt_search" placeholder="Search...">
				<button type="submit" class="button-search"><img src="assets/BGIconSearch.png" class="icon-search"></button>
			</form>
		</header>
	</div>
	<div class="clear-header"></div>
	<div class="content">