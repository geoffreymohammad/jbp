<?php

include"layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

$sqlcommand = mysqli_query($conn,"DELETE FROM product WHERE id_product = '$id'");

$data = mysqli_fetch_assoc($sqlcommand);

if($sqlcommand){
	header('location:product_list.php');	
}

?>