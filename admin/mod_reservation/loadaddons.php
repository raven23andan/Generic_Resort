<?php 
require_once("../../includes/initialize.php");	

$roomID = $_POST['ROOMID'];

$sql ="SELECT `ROOMID`, `ROOMNUM`, `ACCOMID`, `ROOM`, `ROOMDESC`, `NUMPERSON`, `AccomodationType`, `PRICE`, `Price3hrs`, `Price6hrs`, `Price12hrs`, `NightPrice`, `ROOMIMAGE`, `OROOMNUM` FROM `tblroom` WHERE `ROOMID`='{$roomID}'";
	$mydb->setQuery($sql);
	$rm = $mydb->loadSingleResult();

	$type = $rm->AccomodationType;
 
?> 
<table class="table">
	<tr>
		<th></th>
		<th>Description</th>
		<th>Price</th>
		<th >Qty</th>
	</tr>
	<?php 
	$sql = "SELECT `AddonsID`, `Addons`, `Price`, `AddonsType` FROM `tbladdons` WHERE AddonsType='{$type}'";
	$mydb->setQuery($sql);
	$bookads = $mydb->loadResultList();
	foreach($bookads as $ba){
		?>
		<tr>
			<td style="white-space: nowrap;"><input required type="checkbox" name="selector[]" id="selector[]" value="<?php echo $ba->Addons; ?>"/></td>
			<td><?php echo $ba->Addons; ?></td> 
			<td style="white-space: nowrap;"><input type="hidden" name="price[]" id="price[]" value="<?php echo $ba->Price; ?>"/> <?php echo ' &#8369 '.   $ba->Price; ?></td>
			<td><input type="number" name="qty[]" value="1" min="1" style="width:60px" placeholder="Quantity"></td> 
		</tr> 
	<?php } ?>
</table>