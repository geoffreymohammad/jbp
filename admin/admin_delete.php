<?php

include "layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

$sqlcommand = mysqli_query($conn,"DELETE FROM admin WHERE id_admin = '$id'");

if($sqlcommand){
	header('location:admin_list.php');
}

?>