<?php
require_once("../includes/initialize.php");

 
    
    $uname = trim($_POST['username']);
    $upass = trim($_POST['password']);
    
    $h_upass = sha1($upass);
   
    if ($uname == '' OR $upass == '') {

	echo "Invalid username and password";
    }else{
    	 $guest = new Guest();
        $res = $guest::guest_login($uname,$h_upass);

        if ($res==true){
           redirect("index.php");
        }else{
         echo "Invalid Username and Password! Please contact administrator";
            
        }
    }




?>
