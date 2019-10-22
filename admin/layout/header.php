<?php
require "../config/db_connect.php";

session_start();

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
		<div class="container">
			<header>
				<table>
					<tr>
						<td rowspan="2" class="logo">
							<a href="index.php"><img class="logo-header" src="../assets/LogoHeader.png"></a>
						</td>
						<td class="head_text">
						</td>
						<td class="head_text">
							JAKARTA BANGKIT PRATAMA
						</td>
						<td class="head_text">
						<td rowspan="2" class="logout">
							<a href="logout.php">LOGOUT</a>
						</td>
					</tr>
					<tr>
						<td></td>
						<td class="bottom_text">ADMIN PANEL</td>
						<td></td>
					</tr>
				</table>
			</header>
		</div>
			
		<div class="nav">
			<ul>
				<li><a href="admin_list.php">Admin List</a></li>
				<li><a href="product_list.php">Product List</a></li>
				<li><a href="category_list.php">Product Category List</a></li>
				<li><a href="project_list.php">Project List</a></li>
				<li><a href="compro_list.php">About Us</a></li>
				<li><a href="contact_list.php">Contact</a></li>
			</ul>
		</div>

		<div class="content">