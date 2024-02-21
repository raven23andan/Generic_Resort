<?php
require_once("../includes/initialize.php");
$content='home.php';
$view = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : '';
$account = 'guest/update.php';
$small_nav = '../theme/small-navbar.php';
switch ($view) {
 

 case 'bookings' :
      $title="Booked Rooms";  
      $content ='profile.php';   
      $content_profile ='bookinglist.php';    
      break;
        
     case 'accomodation' :
      $title="Accomodation";  
      $content ='profile.php';   
      $content_profile='accomodation.php';
    break;  

  case 'message' :
      
      $content ='profile.php';   
      $content_profile ='readmessage.php';
    break;
  default :
      $title="Profile";  
      $content ='profile.php';   
      $content_profile ='accountinfo.php';
}

require_once '../theme/template.php';

?>
 