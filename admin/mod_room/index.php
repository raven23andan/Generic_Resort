<?php
require_once("../../includes/initialize.php");
 if (!isset($_SESSION['ADMIN_ID'])){
 	redirect(WEB_ROOT ."admin/login.php");
 }
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title ="Accomodation";
switch ($view) {
	case 'list' :
		$content    = 'list.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;

	case 'editpic' :
	$content    = 'editpic.php';		
	break;
    case 'gallery' :
		$content    = 'gallery.php';		
		break;
	case 'discount' :
		$content 	= 'discount.php';
		break;
	default :
		$content    = 'list.php';		
}
  include '../modal.php';
require_once '../themes/backendTemplate.php';
?>


  
