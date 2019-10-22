  </div>

<?php
$sqlquery=mysqli_query($conn,"SELECT * FROM contact ORDER BY id_contact ASC");
$contact=mysqli_fetch_assoc($sqlquery);
?>

  <div class="clear-footer"></div>
  
  <footer>
    <table class="footer">
    	<tr class="footer-top">
    		<td colspan="3">
    			Contact Us
    		</td>
    	</tr>
  		<tr id="footer-container">
  			<td><img src="assets/IconEmail.png" class="icon"></td>
  			<td id="footer-content">
  				<?=$contact['email'];?>
  			</td>
        <td id="footer-content"></td>
  		</tr>
  		<tr id="footer-container">
  			<td><img src="assets/IconPhone.png" class="icon"></td>
  			<td id="footer-content">
  				<?=$contact['phone'];?>
  			</td>
        <td id="footer-content"></td>
  		</tr>
  		<tr id="footer-container">
  			<td><img src="assets/IconAddress.png" class="icon"></td>
  			<td id="footer-content">
  				<?=$contact['address'];?>
  			</td>
        <td id="footer-content"></td>
  		</tr>
    	<tr class="footer-bottom">
    		<td colspan="3">
    			PT. Jakarta Bangkit Pratama | Copyright&copy; 2018
    		</td>
    	</tr>
    </table>
  </footer>
  
  <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="magnifix-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
  <script src="js/main.js" type="text/javascript"></script>
  <?php
	clearstatcache();
  ?>
  </body>
</html>