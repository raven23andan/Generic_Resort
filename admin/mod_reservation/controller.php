<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'modify' :
	dbMODIFY();
	break;
	
	case 'delete' :
	dbDELETE();
	break;
	
	case 'deleteOne' :
	dbDELETEONE();
	break;
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	case 'checkin' :
	doCheckin();
	break;
	case 'checkout' :
	doCheckout();
	break;
	case 'cancelroom' :
	doCancelRoom();
	break;
	case 'addons' :
	doSaveAddons();
	break;
	case 'deleteaddons' :
	doDeleteAddons();
	break;
}
function doCheckout(){
	global $mydb;

	$id = $_GET['id']; 
	
	$sql = "UPDATE `tblreservation` r,tblroom rm SET ROOMNUM=ROOMNUM + 1 WHERE r.`ROOMID`=rm.`ROOMID` AND `RESERVEID` ='" . $_GET['id'] ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();


	$sql = "UPDATE `tblreservation` SET `STATUS`='Checkedout' WHERE `RESERVEID` ='" . $_GET['id'] ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	$query="SELECT *  FROM  `tblreservation` WHERE `RESERVEID` = '".$_GET['id']."'";
	$mydb->setQuery($query); 

	$result = $mydb->loadSingleResult();
	$code =$result->CONFIRMATIONCODE;


	$query="SELECT * FROM  `tblreservation`  WHERE  `CONFIRMATIONCODE` = '{$code}'";
	$mydb->setQuery($query);       
	$maxrow = $mydb->num_rows($mydb->executeQuery());

	
	$sql = "UPDATE `tblpayment` SET `STATUS`='Checkedout' WHERE `CONFIRMATIONCODE` ='" . $code."' AND PQTY='{$maxrow}'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();
	
						
	message("Reservation Upadated successfully!", "success");
	redirect('index.php?view=view&code='.$code);

}
function doCheckin(){
	global $mydb;
 
	$sql = "UPDATE `tblreservation` SET `STATUS`='Checkedin' WHERE `RESERVEID` ='" . $_GET['id'] ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	$query="SELECT *  FROM  `tblreservation` WHERE `RESERVEID` = '".$_GET['id']."'";
			$mydb->setQuery($query);
			$result = $mydb->loadSingleResult();
			$code =$result->CONFIRMATIONCODE;
	
	$sql = "UPDATE `tblpayment` SET `STATUS`='Checkedin' WHERE `CONFIRMATIONCODE` ='" . $code."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();


	
	message("Reservation Upadated successfully!", "success");
	redirect('index.php?view=view&code='.$code);



}




function doCancelRoom(){
	global $mydb;
	$id = $_GET['id'];

	
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


	$query="SELECT * FROM  `tblreservation`  WHERE  `CONFIRMATIONCODE` = '{$code}'";
	$mydb->setQuery($query);
	$maxrow = $mydb->num_rows($mydb->executeQuery());

	
	$sql = "UPDATE `tblpayment` SET `STATUS`='Cancelled' WHERE `CONFIRMATIONCODE` ='" . $code ."' AND PQTY='{$maxrow}'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	


	

					
	message("Reservation Upadated successfully!", "success");
	redirect('index.php?view=view&code='.$code);

}

function doConfirm(){
	global $mydb;
	$id = $_GET['id'];

	
	$sql = "UPDATE `tblreservation` r,tblroom rm SET ROOMNUM=ROOMNUM - 1 WHERE r.`ROOMID`=rm.`ROOMID` AND  `RESERVEID` ='" . $_GET['id'] ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();


	$sql = "UPDATE `tblreservation` SET `STATUS`='Confirmed' WHERE `RESERVEID` ='" . $_GET['id'] ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	
	$query="SELECT *  FROM  `tblreservation` WHERE `RESERVEID` = '".$_GET['id']."'";
	$mydb->setQuery($query);   
	$result = $mydb->loadSingleResult();
	$code =$result->CONFIRMATIONCODE;

	

	
	$sql = "UPDATE `tblpayment` SET `STATUS`='Confirmed' WHERE `CONFIRMATIONCODE` ='" . $code ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	message("Reservation Upadated successfully!", "success");
	redirect('index.php?view=view&code='.$code);

}	 

function doSaveAddons(){
	global $mydb;

 $id=$_POST['selector'];
 $price = $_POST['price'];
 $roomID = $_POST['roomID']; 
 $code = $_POST['Code'];
 $qty = $_POST['qty'];

  $key = count($id);
		
		
	for($i=0;$i<$key;$i++){

    $total = $price[$i] * $qty[$i];

		$sql = "INSERT INTO `tblbookingaddons`(`BookingNo`, `RoomID`, `AddOns`, `Price`,`Qty`,`Total`) VALUES ('{$code}','{$roomID}','".$id[$i]."','".$price[$i]."','".$qty[$i]."','".$total."')";
	 	$mydb->setQuery($sql);
	 	$mydb->executeQuery(); 
	}

		message("Addons already added!","info");
		redirect('index.php?view=view&code='.$code);
 } 

function doDeleteAddons(){
	global $mydb;

   $id=$_GET['id']; 

   $code=$_GET['code']; 
	 
		$sql = "DELETE FROM `tblbookingaddons` WHERE ID='{$id}'";
	 	$mydb->setQuery($sql);
	 	$mydb->executeQuery();  

		message("Addons already deleted!","info");
		redirect('index.php?view=view&code='.$code);
 }
