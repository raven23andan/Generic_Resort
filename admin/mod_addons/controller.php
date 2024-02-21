<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;

	case 'editimage' :
	editImg();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}

function doInsert(){
global $mydb;
 

	if ($_POST['Addons'] == "" OR $_POST['Price'] == "") {
		
			message("All fields required!", "error");
			redirect("index.php?view=add");
		
	}else{
		   
		$sql = "INSERT INTO `tbladdons`( `Addons`, `Price`, `AddonsType`,`ResortID`) VALUES ('".$_POST['Addons']."','".$_POST['Price']."','".$_POST['Type']."','".$_SESSION['ADMIN_ID']."')";
	 	$mydb->setQuery($sql);
	 	$mydb->executeQuery(); 

	 	message("New  Addons created successfully!", "success");
	 	redirect('index.php');
			 	 
	 }	 
 
 
} 
function doEdit(){
 	
global $mydb;

 		$sql = "UPDATE `tbladdons` SET  `Addons`='".$_POST['Addons']."', `Price`='".$_POST['Price']."' WHERE AddonsID=".$_POST['AddonsID'];
	 	$mydb->setQuery($sql);
	 	$mydb->executeQuery(); 

	 	message("New  Addons created successfully!", "success");
		redirect('index.php');
}

function doDelete(){
global $mydb;
   $id=$_POST['selector'];
		  $key = count($id);
		
		
	for($i=0;$i<$key;$i++){ 
		 $sql = "DELETE FROM `tbladdons` WHERE AddonsID=".$id[$i];
	 	$mydb->setQuery($sql);
	 	$mydb->executeQuery(); 
	}

		message("Addons already Deleted!","info");
		redirect('index.php');
 } 

?>
