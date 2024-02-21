<?php
require_once("includes/initialize.php"); 



 $email = isset($_POST['email_address']) ? trim($_POST['email_address']) : 0;

 


$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, 'https://emailvalidation.abstractapi.com/v1/?api_key=090cc310bf2a4efe971def5ce9ff5137&email='.$email);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);


$data = curl_exec($ch);




curl_close($ch);



$resArr = json_decode($data); 
echo  $resArr->deliverability; 
 

?>