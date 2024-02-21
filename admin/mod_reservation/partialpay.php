<?php 

include_once '../../includes/database.php';
if(isset($_POST["partialSave"])){
    $amount = $_POST["partial-amount"];
    $code = $_POST["code"];

    $sql = "UPDATE tblreservation SET PARTIAL = $amount, PAYMENT_STATUS = 'Partial Done' WHERE CONFIRMATIONCODE = '$code'";
    
    $mydb->setQuery($sql);
    $cur = $mydb->executeQuery();

    header("location: index.php?view=view&code=".$code);
}