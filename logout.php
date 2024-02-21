<?php
require_once("includes/initialize.php");

@session_start();
 

unset($_SESSION['GUESTID']);	
unset($_SESSION['name']); 		
unset($_SESSION['last']);	
unset($_SESSION['country']);
unset($_SESSION['city']); 		
unset($_SESSION['address']); 	
unset($_SESSION['zip']); 		
unset($_SESSION['phone']); 	
unset($_SESSION['email']); 		
unset($_SESSION['pass']); 	
unset($_SESSION['from']); 
unset($_SESSION['to']); 	
unset($_SESSION['m_cart']); 	
unsetSessions();

 	

redirect(WEB_ROOT ."index.php?logout=1");
?>

