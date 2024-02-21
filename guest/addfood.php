<?php

include_once '../includes/database.php';

@$id = $_POST['selector'];

$room_id = $_POST['room_id'];
$code = $_POST['code'];

$key = count($id);
for ($i = 0; $i < $key; $i++) {
    $qty = $_POST['quantity' . $id[$i]];
    $price = $_POST['price' . $id[$i]];
 
    $sql = "INSERT INTO tblfoodorders(food_id, quantity, total_price, room_id, code) VALUES ($id[$i], $qty, $qty * $price, $room_id, '$code')";
    $mydb->setQuery($sql);
    $mydb->executeQuery();
    
}

header('location: index.php?p=message&code='. $code); 