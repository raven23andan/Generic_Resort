<?php
include_once '../includes/database.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tblfoodorders WHERE id = $id";
    $mydb->setQuery($sql);
    $res = $mydb->loadSingleResult();

    $code = $res->code;
    echo $code;

    $sql = "DELETE FROM tblfoodorders WHERE id = $id";
    $mydb->setQuery($sql);
    $mydb->executeQuery();

    header("location: index.php?p=message&code=" . $code);
}


