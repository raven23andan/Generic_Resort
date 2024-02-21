<?php 
require_once("../includes/initialize.php");	

$roomID = $_POST['ROOMID'];

$sql ="SELECT * FROM `tblroom` WHERE `ROOMID`='{$roomID}'";
	$mydb->setQuery($sql);
	$rm = $mydb->loadSingleResult();

	$type = $rm->AccomodationType;
	$resortID = $rm->ResortID;
 
?> 
<table class="table">
	<tr>
		<th></th>
		<th>Description</th>
		<th>Price</th>
		<th >Qty</th>
	</tr>
	<?php 
	$sql = "SELECT * FROM `tbladdons` WHERE AddonsType='{$type}' AND ResortID='{$resortID}'";
	$mydb->setQuery($sql);
	$bookads = $mydb->loadResultList();
	foreach($bookads as $ba){
		?>
		<tr>
			<td style="white-space: nowrap;"><input type="checkbox" name="selector[]" id="selector[]" value="<?php echo $ba->AddonsID; ?>"/></td>
			<td><?php echo $ba->Addons; ?></td> 
			<td style="white-space: nowrap;"><input type="hidden" name="price<?php echo $ba->AddonsID;?>" id="price<?php echo $ba->AddonsID;?>" value="<?php echo $ba->Price; ?>"/> <?php echo ' &#8369 '.   $ba->Price; ?></td>
			<td><input type="number" name="qty<?php echo $ba->AddonsID;?>" value="1" min="1" style="width:60px" placeholder="Quantity"></td> 
		</tr> 
	<?php } ?>
</table>