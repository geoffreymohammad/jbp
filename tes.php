<?php

include"layout/header.php";

$sqlcommand = mysqli_query($conn,"SELECT * FROM product ORDER BY id_product DESC LIMIT 0,1");
$data = mysqli_fetch_assoc($sqlcommand);

?>
<br><br><br>
<?php do{ ?>
<div class="popupimage">
<img src="upload/specification/<?=$data['specification'];?>">
</div>

<div id="popup" class="popup">
	<div class="popup-content">
		<span class="popup-close">&times;</span>
		<img src = "upload/specification/<?=$data['specification'];?>">
	</div>
</div>

<?php }while($data = mysqli_fetch_assoc($sqlcommand));?>

<?php
require "layout/footer.php";
?>