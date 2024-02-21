<?php
require_once("includes/initialize.php");  

$username = isset($_POST['username']) ? $_POST['username'] : '';
 $sql ="SELECT `GUESTID`, `REFNO`, `G_FNAME`, `G_LNAME`, `G_CITY`, `G_ADDRESS`, `DBIRTH`, `G_PHONE`, `G_NATIONALITY`, `G_COMPANY`, `G_CADDRESS`, `EMAILADDRESS`, `G_TERMS`, `G_UNAME`, `G_PASS`, `ZIP`, `LOCATION`, `DELETED` FROM `tblguest` WHERE `G_UNAME`='{$username}'";
 $mydb->setQuery($sql);
 $maxrow = $mydb->num_rows($mydb->executeQuery()); 
 if($maxrow > 0){
     echo $maxrow;
 }else{
     echo "0";
 }
  
?>