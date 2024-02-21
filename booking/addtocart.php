<?php
require_once("../includes/initialize.php");
if (isset($_POST['booknow'])) {

    $days = 0;
    $day = dateDiff($_SESSION['arrival'], $_SESSION['departure']);

    $arrival =  $_SESSION['arrival'] . ' ' . $_SESSION['start_time'];
    $departure =  $_SESSION['departure'] . ' ' . $_SESSION['end_time'];


    $hr = date_time_diff($arrival, $departure, 'h');
    $min = date_time_diff($arrival, $departure, 'i');

    $sql = "SELECT `ROOMID`, `ROOMNUM`, `ROOM`, `ROOMDESC`, `NUMPERSON`, `AccomodationType`, `ROOMIMAGE`, `OROOMNUM`, `ResortID` FROM `tblroom`  WHERE `ROOMID`=" . $_POST['ROOMID'];
    $mydb->setQuery($sql);
    $rm = $mydb->loadSingleResult();

    $type = $rm->AccomodationType;

    switch ($type) {
        case 'Room':

            if ($day <= 0) {

                $days = $hr . ' hr and ' .  $min . ' min';

                $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing` WHERE `RoomID`=" . $_POST['ROOMID'];
                $mydb->setQuery($sql);
                $r_price = $mydb->loadResultList();

                foreach ($r_price as $pr) {
                    if ($hr >= 1 && $hr <= 3) {
                       
                        if ($pr->ConsumeHour == 3) {
                          
                            $totalprice = $pr->Prices;
                        }
                    } elseif ($hr > 3 && $hr <= 6) {
                        
                        if ($pr->ConsumeHour == 6) {
                            
                            $totalprice = $pr->Prices;
                        }
                    } elseif ($hr > 6 && $hr <= 12) {
                       
                        if ($pr->ConsumeHour == 12) {
                           
                            $totalprice = $pr->Prices;
                        }
                    } else {
                        
                        $totalprice = $pr->Prices  * $day;
                        $days = $day . 'day(s) and ' . $hr . ' hr(s) and ' .  $min . ' min(s)';
                    }
                }

                addtocart($_POST['ROOMID'], $days, $totalprice, $arrival, $departure);
            } else {

                $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing` WHERE ConsumeHour=24 AND  `RoomID`=" . $_POST['ROOMID'];
                $mydb->setQuery($sql);

                $pr = $mydb->loadSingleResult();


                $totalprice = $pr->Prices  * $day;

                $days = $day . 'day(s) and ' . $hr . ' hr(s) and ' .  $min . ' min(s)';

                if ($hr > 0) {
                    
                    $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing` WHERE ConsumeHour=1 AND`RoomID`=" . $_POST['ROOMID'];
                    $mydb->setQuery($sql);
                    $extendedhr = $mydb->loadSingleResult();

                    $totalextend = $extendedhr->Prices * $hr;
                }

                $totalprice =  $totalprice + $totalextend;

                addtocart($_POST['ROOMID'], $days, $totalprice, $arrival, $departure);
            }

            break;

        case 'Amenity':
        case 'Cottage':

            $day = $day + 1;

            $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing` WHERE  `RoomID`=" . $_POST['ROOMID'];
            $mydb->setQuery($sql);
            if ($mydb->num_rows($mydb->executeQuery()) > 0) {
                $pr = $mydb->loadSingleResult();

                $totalprice = $pr->Prices  * $day;
                if ($day == 1) {
                    
                    $days = $day . 'day';
                } else {

                    $days = $day . 'day(s)';
                }
                addtocart($_POST['ROOMID'], $days, $totalprice, $arrival, $departure);
            } else {
                echo '<script>alert("no set price for cottage")</script>';
                redirect(WEB_ROOT . 'index.php?p=resorts&id=' . $_POST['ResortID']);
            }

            break;
    }



    redirect(WEB_ROOT . 'booking/index.php?p=resorts&id=' . $_POST['ResortID']);
}

if (isset($_POST['saveAddons'])) {
    
    doSaveAddons();
}
if (isset($_GET['action'])) {
    
    doDeleteAddons();
}

function doSaveAddons()
{
    global $mydb;

    $id = $_POST['selector'];
    $roomID = $_POST['roomID'];
   
    $key = count($id);
   

    for ($i = 0; $i < $key; $i++) {


        $qty = $_POST['qty' . $id[$i]];
        $price = $_POST['price' . $id[$i]];

        $total = $price  * $qty;
        

        addtoaddons($id[$i], $qty, $price, $total, $roomID);
    }

    redirect(WEB_ROOT . 'booking/');
}

function doDeleteAddons()
{
    global $mydb;

    $id = $_GET['id'];
    $roomID = $_GET['ROOMID'];

    removetoaddons($id, $roomID);

    redirect(WEB_ROOT . 'booking/');
}
