<?php
require_once("../includes/initialize.php");

$code = $_POST["auth"];

$sql = "SELECT * FROM tbluseraccount WHERE `USERID`='{$_SESSION['ADMIN_ID']}'";
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
$row_count = $mydb->num_rows($cur);
if ($row_count == 1){
    $found_code = $mydb->loadSingleResult();

    if(strtoupper($code) == strtoupper($found_code->twoWayCode)){
        $_SESSION["ADMIN_2WAYDONE"] = '1';
        redirect('index.php');
    }
    else {
        redirect('twoway.php?error=invalid');
    }
}