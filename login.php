<?php
 require_once ("includes/initialize.php"); 

 if(isset($_POST['gsubmit'])){
  $email = trim($_POST['username']);
  $upass  = trim($_POST['pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') { 
      message("Invalid Username and Password!", "error");
        redirect(WEB_ROOT."booking/index.php?p=resorts&view=logininfo");
         
    } else {   
        $guest = new Guest();
        $res = $guest::guest_login($email,$h_upass);

        if ($res==true){
           redirect(WEB_ROOT."booking/index.php?p=resorts&view=payment");
        }else{
             message("Invalid Username and Password! Please contact administrator", "error");
             redirect(WEB_ROOT."booking/index.php?p=resorts&view=logininfo");
        }
 
     }
 }else{

        $email = trim($_POST['username']);
        $upass  = trim($_POST['pass']);
        $h_upass = sha1($upass);
        $token = isset($_GET['token']) ? $_GET['token'] :''; 

         if ($email == '' OR $upass == '') { 
            message("Invalid Username and Password!", "error");
             redirect(WEB_ROOT."index.php?p=login&q=".$token);
               
          } else {   

            if ($token=='resort') {
              
                  $user = new User();
                   
                   $res = $user::AuthenticateUser($email, $h_upass);
            }
            switch($token){
               case 'resort' : 
                 $user = new User();
                   
                   $res = $user::AuthenticateUser($email, $h_upass);

                 if ($res==true){
                    redirect(WEB_ROOT."admin/");
                 }else{
                      message("Invalid Username and Password!", "error");
                      redirect(WEB_ROOT."index.php?p=login&q=resort");
                 }
                break;
                
                case 'guest' : 
                 $guest = new Guest();
                 $res = $guest::guest_login($email,$h_upass);

                 if ($res==true){
                     if(isset($_GET['id'])){
                         redirect(WEB_ROOT."index.php?p=resorts&id=".decrypt($_GET['id']));  
                     }else{
                         redirect(WEB_ROOT."guest/"); 
                     }
                 }else{
                      message("Invalid Username and Password!", "error");
                     if(isset($_GET['id'])){ 
                        redirect(WEB_ROOT."index.php?p=login&q=guest&id=".decrypt($_GET['id']));  
                     }else{ 
                        redirect(WEB_ROOT."index.php?p=login&q=guest");
                     }
                     
                     
                 }
                break;
            }
             
       
       }
 }
?>