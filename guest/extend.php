<?php
include_once '../includes/database.php';

if(isset($_POST["extend"])){
    

    $departureDate = $_POST["departureDate"];
    $totalPrice = $_POST["totalPrice"];
    $origPrice = $_POST["origPrice"];
    $subtotal = $_POST["subtotal"];
    $extendDays = $_POST["extend-days"];
    $extendHours = $_POST["extend-hours"];
    $type = $_POST["type"];
    $addons = $_POST["addonsPrice"];
    $code = $_POST["id"];
    $roomID = 0;

    $extendPrice = 0;
    
    $sql = "SELECT ROOMID FROM tblreservation WHERE CONFIRMATIONCODE = '$code'";
    $mydb->setQuery($sql);
    $temp = $mydb->loadResultList();
    foreach($temp as $id){
        $roomID = $id->ROOMID;
    }

    

    $newPrice = 0;

    switch($type){
        case 'Room':
            $departureDate = date("Y-m-d H:i:s", strtotime($departureDate . '+' . $extendDays . ' days'));
            $departureDate = date("Y-m-d H:i:s", strtotime($departureDate . '+' . $extendHours . ' hours'));

            $sql = "SELECT ConsumeHour, Prices FROM tblpricing WHERE RoomID = $roomID";
            $mydb->setQuery($sql);
            $temp = $mydb->loadResultList();
            foreach($temp as $prices){
                if($prices->ConsumeHour === '3'){
                    $hour_3 = $prices->Prices;
                }
                elseif ($prices->ConsumeHour === '6') {
                    $hour_6 = $prices->Prices;
                }
                elseif ($prices->ConsumeHour === '12') {
                    $hour_12 = $prices->Prices;
                }
                elseif ($prices->ConsumeHour === '24') {
                    $hour_24 = $prices->Prices;
                }
            }
            
            if($extendDays > 0){
                $extendPrice += ($hour_24 * $extendDays);

                if($extendHours <= 3){
                    $extendPrice += $hour_3;
                }
                elseif ($extendHours <= 6) {
                    $extendPrice += $hour_6;
                }
                elseif($extendHours <= 12) {
                    $extendPrice += $hour_12;
                }
                else {
                    $extendPrice += $hour_24;
                }
            }
            else {
                if($extendHours <= 3){
                    $extendPrice += $hour_3;
                }
                elseif ($extendHours <= 6) {
                    $extendPrice += $hour_6;
                }
                elseif($extendHours <= 12) {
                    $extendPrice += $hour_12;
                }
                else {
                    $extendPrice += $hour_24;
                }
            }

            $subtotal += $extendPrice;

            $totalPrice = $addons + $subtotal;
            
            $remarks = ($extendDays > 0) ? $extendDays . " day(s) and " . $extendHours . " hour(s) and 0 mins" : $extendHours . " hour(s) and 0 mins" ;
            $sql = "UPDATE tblreservation SET DEPARTURE = '$departureDate', RPRICE = $subtotal, REMARKS = '$remarks' WHERE CONFIRMATIONCODE = '$code'";
            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();

            $sql = "UPDATE tblpayment SET SPRICE = $totalPrice WHERE CONFIRMATIONCODE = '$code'";
            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();

            echo "DONE";
            break;

        case 'Cottage':
            $departureDate = date("Y-m-d H:i:s", strtotime($departureDate . '+' . $extendDays . ' days'));
            $departureDate = date("Y-m-d H:i:s", strtotime($departureDate . '+' . $extendHours . ' hours'));

            $subtotal += $origPrice;
            $totalPrice = $addons + $subtotal;

            $remarks = ($extendDays > 0) ? $extendDays . " day(s) and " . $extendHours . " hour(s) and 0 mins" : $extendHours . " hour(s) and 0 mins" ;
            $sql = "UPDATE tblreservation SET DEPARTURE = '$departureDate', RPRICE = $subtotal, REMARKS = '$remarks' WHERE CONFIRMATIONCODE = '$code'";
            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();

            $sql = "UPDATE tblpayment SET SPRICE = $totalPrice WHERE CONFIRMATIONCODE = '$code'";
            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();
            break;
    }

    header("location: index.php?p=bookings");
}