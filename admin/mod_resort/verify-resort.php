<?php
    include_once '../../includes/database.php';

    $resortid = $_POST['resort-id'];
    

    if(isset($_POST["submit-verify"])){
        $sql = "UPDATE tbluseraccount SET ResortAuth = '1' WHERE USERID = $resortid";
    }

    if(isset($_POST["submit-unverify"])){
        $sql = "UPDATE tbluseraccount SET ResortAuth = '0' WHERE USERID = $resortid";
    }

    $mydb->setQuery($sql);
    $cur = $mydb->executeQuery();

    header("location: index.php");
?>