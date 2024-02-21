<?php 

include_once '../../includes/database.php';

if(isset($_POST["submit"])){
    $damage_amount = $_POST["damage_amount"];
    $code = $_POST["code"];
    $dname= $_POST["d-name"];        
    $damount = $_POST["d-amount"];   
    
    $sql = "UPDATE tblpayment SET DPRICE = DPRICE + $damage_amount WHERE CONFIRMATIONCODE = '$code'";
    
    $mydb->setQuery($sql);
    $cur = $mydb->executeQuery();

    
    for ($i = 0; $i < count($dname); $i++) {
        $damage_name = $dname[$i];
        $damage_amount = $damount[$i];

        
        $sql = "INSERT INTO tbldamages (damage_name, damage_amount, confirmation_code) VALUES ('$damage_name', '$damage_amount', '$code')";
        $mydb->setQuery($sql);
        $cur = $mydb->executeQuery();
    }

    header("location: index.php");
}