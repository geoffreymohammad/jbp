<?php

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

$sqlcommand = mysqli_query($conn,"DELETE FROM category WHERE id_category = '$id'");

$data = mysqli_fetch_assoc($sqlcommand);

if($sqlcommand){
	header('location:category_list.php');	
}

?>