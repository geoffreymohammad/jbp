<?php
require "layout/header.php";

if(!$_SESSION['login']){
	header('location:login.php');
}
?>

<div class="home">
	Welcome to your Dashboard, Administrator
</div>

<?php include "layout/footer.php"; ?>