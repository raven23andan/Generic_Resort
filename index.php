<?php
require_once("includes/initialize.php");
$content='home.php';
$view = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : '';
$account = 'guest/update.php';
$small_nav = 'theme/small-navbar.php';
switch ($view) {

  case '1' :
        $title="Home";  
        $content='home.php';    
    break;
  case 'amenities' :
      $title="Amenities"; 
    $content ='amenities.php';
    break;
  case 'about' :
      $title="About Us";  
    $content = 'about.php';   
    break;


   case 'accomodation' :
    $title="Accomodation and Rates";  
    $content ='accomodation.php';    
    break;

   case 'single-room' :
    $title="View Room Details";  
    $content ='single-room.php';    
    break;


  case 'contact' :
      $title="Contacts";  
    $content ='contact.php';    
    break;

 case 'booking' :
      $title="Book A Room";  
    $content ='bookAroom.php';    
    break;
        
     case 'accomodation' :
      $title="Accomodation";  
      $content='accomodation.php';
    break;  

  case 'largeview' :
      // $title="View";  
    $content ='largeimg.php';
    break; 
  case 'login' :
      // $title="View";  
    $content ='signin.php';
    break;
  case 'amen' :
      // $title="View";  
    $content ='single-amenities.php';
    break;
    
    
     case 'faq' :
      $title="FAQ";  
      $content='faq.php';
    break;    
    case 'resort' :
      $title="Register Resort";  
    $content ='register_resort.php';
    break;


  case 'guest' :
      $title="Register Guest";  
    $content ='register_guest.php';
    break;
  case 'availability' :
      $title="Resort";  
    $content ='availability_resort.php';
    break;

  case 'resorts' :
      $title="Resort";  
    $content ='view_resort.php';
    break;

  default :
      $title="Home";  
    $content ='home.php';   
}

require_once ('theme/template.php');

?>
 