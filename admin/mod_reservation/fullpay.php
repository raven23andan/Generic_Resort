<?php 

include_once '../../includes/database.php';
if(isset($_POST["fullpay-btn"])){
    $amount = $_POST["fullpay-amount"];
    $code = $_POST["code"];

    $sql = "UPDATE tblreservation SET PARTIAL = $amount, PAYMENT_STATUS = 'Full Done' WHERE CONFIRMATIONCODE = '$code'";
    
    $mydb->setQuery($sql);
    $cur = $mydb->executeQuery();

    header("location: index.php?view=view&code=".$code);
}