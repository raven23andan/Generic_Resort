<?php
include_once '../includes/database.php';
if(isset($_POST["saveRate"])){
    $food_rating = $_POST["ratingNo-foods"];
    $room_rating = $_POST["ratingNo-room"];
    $amenity_rating = $_POST["ratingNo-amenity"];
    $resort_id = $_POST["resort-id"];
    $account_id = $_POST["account-id"];
    $code = $_POST["code"];

    $sql = "INSERT INTO tblresortrating(food, rooms, amenity, code, resort_id, guest_id) VALUES ($food_rating, $room_rating, $amenity_rating, '$code', $resort_id, $account_id)";
    $mydb->setQuery($sql);
    $mydb->executeQuery();

    header('location: index.php?p=message&code='. $_POST["code"]); 
}
