<?php
include_once '../../includes/database.php';


if(isset($_GET['action'])){
    $code = $_GET['code'];
    $id = $_GET['id'];
    $action = $_GET['action'];
    
    if($_GET['action'] == 'approve'){
        $action = 'Approved';
    }
    elseif($_GET['action'] == 'deny'){
        $action = 'Disapproved';
    }

    $sql = "UPDATE tblfoodorders SET status = '$action' WHERE id = $id";
    $mydb->setQuery($sql);
    $mydb->executeQuery();

    header("location: index.php?view=view&code=" . $code);
}