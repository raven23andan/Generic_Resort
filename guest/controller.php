<?php
require_once("../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) { 
	case 'cancel' :
	doCancel();
	break;
	 
	} 
	
function doCancel(){
	global $mydb;


$sql = "SELECT * FROM  `tblreservation` r,tblroom rm WHERE  r.`ROOMID`=rm.`ROOMID` AND `ROOMNUM`=0  AND `RESERVEID` ='" . $_GET['id'] ."'";
$mydb->setQuery($sql);
$maxrow = $mydb->num_rows($mydb->executeQuery());
if($maxrow > 0){ 
    $sql = "UPDATE `tblreservation` r,`tblroom` rm SET ROOMNUM=ROOMNUM + 1 WHERE r.`ROOMID`=rm.`ROOMID` AND `RESERVEID` ='" . $_GET['id'] ."' ";
    $mydb->setQuery($sql);
    $mydb->executeQuery();
}

$sql = "UPDATE `tblreservation` SET `STATUS`='Cancelled' WHERE `RESERVEID` ='" . $_GET['id'] ."'";
$mydb->setQuery($sql);
$mydb->executeQuery();


$query="SELECT *  FROM  `tblreservation` WHERE `RESERVEID` = '".$_GET['id']."'";
$mydb->setQuery($query);   
$result = $mydb->loadSingleResult();
$code =$result->CONFIRMATIONCODE;


$query="SELECT * FROM  `tblreservation`  WHERE  `CONFIRMATIONCODE` = '{$code}' AND STATUS!='Cancelled'";
$mydb->setQuery($query);
$maxrow = $mydb->num_rows($mydb->executeQuery());

if ($maxrow == 0) { 
  	$sql = "UPDATE `tblpayment` SET `STATUS`='Cancelled' WHERE `CONFIRMATIONCODE` ='" . $code ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

} 

				
message("Reservation Cancelled successfully!", "success");
redirect('index.php?p=message&code='.$code);

}
  
?>