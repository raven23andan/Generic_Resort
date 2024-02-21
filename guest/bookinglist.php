<?php
require_once ("../includes/initialize.php");
  if (!isset($_SESSION['GUESTID'])){
      redirect("index.php");
     }

 ?>

 
 <div class="panel panel-success">
 	<div class="panel-heading">List of Bookings</div>
 	<div class="panel-body">
 
 
  <table id="table" style="font-size:12px;white-space: nowrap;" class="table table-hover table-bordered"  cellspacing="0">
<thead>
<tr> 
<td ><strong>Transaction Date</strong></td>
<td  ><strong>Confimation Code</strong></td>
<td ><strong>Total Accomodation</strong></td>
<td  ><strong>Total Price</strong></td> 
<td ><strong>Status</strong></td>
<td><strong>Action</strong></td>
</tr>
</thead>
<tbody>
<?php 
$mydb->setQuery("SELECT  `G_FNAME` ,  `G_LNAME` ,  `G_ADDRESS` ,  `TRANSDATE` ,  `CONFIRMATIONCODE` ,  `PQTY` ,  `SPRICE`, `DPRICE` ,`STATUS`
				FROM  `tblpayment` p,  `tblguest` g
				WHERE p.`GUESTID` = g.`GUESTID` AND  g.`GUESTID` = ".$_SESSION['GUESTID']."  
				ORDER BY p.`STATUS`='pending' desc ");
$cur = $mydb->loadResultList();
				  			
foreach ($cur as $result) {
	$totalfood = 0;
	$sql = "SELECT * FROM tblfoodorders WHERE code = '$result->CONFIRMATIONCODE' AND status = 'Approved'";
	$mydb->setQuery($sql);
	$foodordered = $mydb->loadResultList();

	foreach($foodordered as $order){
		$totalfood += $order->total_price;
	}
?>
<tr>  
<td><?php echo $result->TRANSDATE; ?></td> 
<td><?php echo $result->CONFIRMATIONCODE; ?></td>
<td><?php echo $result->PQTY; ?></td>
<td><?php echo $result->SPRICE + $result->DPRICE + $totalfood; ?></td>
<td><?php echo $result->STATUS; ?></td> 
<?php 
if($result->STATUS=='Confirmed'){
?>
<td><a href="<?php echo WEB_ROOT ;  ?>guest/index.php?p=message&code=<?php echo  $result->CONFIRMATIONCODE; ?>" class="btns btn-primary " ><i class="icon-edit">View</a> <a title="Print" href="<?php echo WEB_ROOT.'guest/readprint.php?code='.$result->CONFIRMATIONCODE;?>" target="_blank" class="btns btn-info"><i class="fa fa-print"></i> Print</a></td> 
<?php 
}elseif($result->STATUS=='Cancelled'){ 
?>
<td><a href="<?php echo WEB_ROOT ;  ?>guest/index.php?p=message&code=<?php echo  $result->CONFIRMATIONCODE; ?>" class="btns btn-primary " ><i class="icon-edit">View</a></td> 
<?php 
}elseif($result->STATUS=='Checkedout'){ 

?>
<td><a href="<?php echo WEB_ROOT ;  ?>guest/index.php?p=message&code=<?php echo  $result->CONFIRMATIONCODE; ?>" class="btns btn-primary " ><i class="icon-edit">View</a></td> 
<?php 
}else{ 
?>
<td><a href="<?php echo WEB_ROOT ;  ?>guest/index.php?p=message&code=<?php echo  $result->CONFIRMATIONCODE; ?>" class="btns btn-primary " ><i class="icon-edit">View</a> <a title="Print" href="<?php echo WEB_ROOT.'guest/readprint.php?code='.$result->CONFIRMATIONCODE;?>" target="_blank" class="btns btn-info"><i class="fa fa-print"></i> Print</a></td> 
<?php 
}
?>

 
</tr>  
<?php }
?>
  
	 

</table>
 	</div>
 </div> 
 
	