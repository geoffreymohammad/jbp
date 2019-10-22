<?php

include"layout/header.php";
if(!$_SESSION['login']){
	header('location:login.php');
}

$id = $_GET['id'];

$sqlcommand = mysqli_query($conn,"DELETE FROM project WHERE id_project = '$id'");

$data = mysqli_fetch_assoc($sqlcommand);

if($sqlcommand){
	header('location:project_list.php');	
}

?>