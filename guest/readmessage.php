<style type="text/css">
  @media print {
    .no-print {
      display: none;
    }

  }
  .gold {
    color: gold;
  }

  .rating {
    float: left;
    position: absolute !important;
    margin-bottom: 20px;
    top: 20px;
    left: -20px;
  }


  .rating:not(:checked)>input {
    position: relative;
  
    clip: rect(0, 0, 0, 0);
    height: 0;
    width: 0;
    overflow: hidden;
    opacity: 0;
  }

  .rating:not(:checked)>label {
    float: right;
    width: 1em;
    padding: 0 .1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 300%;
    line-height: 1.2;
    color: #ddd;
    text-shadow: 1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0, 0, 0, .5);
  }

  .rating:not(:checked)>label:before {
    content: '★ ';
  }

  .rating>input:checked~label {
    color: #f70;
    text-shadow: 1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0, 0, 0, .5);
  }

  .rating:not(:checked)>label:hover,
  .rating:not(:checked)>label:hover~label {
    color: gold;
    text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
  }

  .rating>input:checked+label:hover,
  .rating>input:checked+label:hover~label,
  .rating>input:checked~label:hover,
  .rating>input:checked~label:hover~label,
  .rating>label:hover~input:checked~label {
    color: #ea0;
    text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
  }

  .rating>label:active {
    position: relative;
    top: 2px;
    left: 2px;
  }
</style>
<?php
require_once("../includes/initialize.php");

$total_addons = 0;
$code = $_GET['code'];
$tot = 0;
$cancelled_amount = 0;
$total_amount = 0;
$subtotal = 0;
$amount_paid = 0;
$cancelled_addons_amount = 0;
$total_addons_amount = 0;
$damages = 0;

$origPrice = 0;
$departureDate = null;
$type = '';
$discount = 0;

$totalfood = 0;
$cancelled_food_amount = 0;
$totalfood_amount = 0;

$query = "SELECT  *
FROM  `tblpayment` p,  `tblguest` g
WHERE p.`GUESTID` = g.`GUESTID` AND `CONFIRMATIONCODE`='" . $_GET['code'] . "'";
$mydb->setQuery($query);
$res = $mydb->loadSingleResult();

$damages = $res->DPRICE;

if ($res->STATUS == 'Confirmed') {
  $print = '<button type="button" class="no-print btns btn-info" onclick="printHtmlCustomStyle()" ><i class="fa fa-print"></i> Print</button>';
} elseif ($res->STATUS == 'Cancelled') {
  $print = '<p style="font-size:20px">RESERVATION CANCELLED</p>';
} else {
  $print = '<button type="button" class="no-print btns btn-info" onclick="printHtmlCustomStyle()" ><i class="fa fa-print"></i> Print</button>';
}

$sql = "UPDATE `tblpayment` SET `MSGVIEW`=1 WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] . "'";
$mydb->setQuery($sql);
$mydb->executeQuery();



$query = "SELECT *
               FROM `tblguest` g ,`tblreservation` r 
               WHERE g.`GUESTID`=r.`GUESTID` and `CONFIRMATIONCODE` ='" . $_GET['code'] . "'";
$mydb->setQuery($query);
$result = $mydb->loadsingleResult();

$sqlRate = "SELECT * FROM tblresortrating WHERE guest_id = ".$_SESSION["GUESTID"] . " AND code = '$code'";
$mydb->setQuery($sqlRate);
$rated = false;
if ($mydb->num_rows($mydb->executeQuery()) > 0) {

  $user_rating = $mydb->loadSingleResult();
  $rated = true;
}


?>

<div id="invoice" class="panel panel-success">
  <div class="panel-heading"> <i class="fa fa-globe"></i>
    <?php
    $sql = "SELECT * FROM `tbluseraccount` WHERE `USERID`='{$result->ResortID}'";
    $mydb->setQuery($sql);
    $single_resort = $mydb->loadSingleResult();
    echo $single_resort->UNAME;
    ?>

    <small class="pull-right">Date: <?php echo date('m/d/Y'); ?></small>
  </div>
  <div class="panel-body">
    <form action="<?php echo WEB_ROOT;; ?>guest/readprint.php?" method="POST" target="_blank">
      
      <section class="invoice">
        
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong> <?php
                        $sql = "SELECT * FROM `tbluseraccount` WHERE `USERID`='{$result->ResortID}'";
                        $mydb->setQuery($sql);
                        $single_resort = $mydb->loadSingleResult();
                        echo $single_resort->UNAME;
                        $resortID = $single_resort->USERID;
                        ?> </strong>
              <br>

              <br>
              <?php
              $sql = "SELECT `ID`, `DESCRIPTION`, `TYPE` FROM `tblsettings` WHERE ResortID='{$result->ResortID}' AND TYPE='ContactUs'";
              $mydb->setQuery($sql);

              if ($mydb->num_rows($mydb->executeQuery()) > 0) {

                $contactUs = $mydb->loadSingleResult();

                echo $contactUs->DESCRIPTION;
              }

              ?>

            </address>
          </div>
          
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong><?php echo $result->G_FNAME . ' ' . $result->G_LNAME; ?>
              </strong><br>
              <?php echo $result->G_ADDRESS; ?>
            </address>
          </div>
          
          <div class="col-sm-4 invoice-col">
            <br />
            <br />
           
            <b>Confirmation ID: </b>
            <p style="background-color:blue;color:white"> <?php echo $result->CONFIRMATIONCODE; ?></p>
            <input type="hidden" name="code" value="<?php echo $result->CONFIRMATIONCODE; ?>">
            <br>
            <b>Transaction Date:</b> <?php echo  Date($result->TRANSDATE); ?>
            <br>
            <b>Account:</b> <?php echo $result->GUESTID; ?>

          </div>
          
        </div>
        
        <?php

        $query = "SELECT * 
          FROM  `tblroom`  RM, `tblreservation` RS  
          WHERE   RM.`ROOMID`=RS.`ROOMID`  and `CONFIRMATIONCODE` ='" . $_GET['code'] . "'";
        $mydb->setQuery($query);
        $res = $mydb->loadResultList();


        ?>
        
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped" style="font-size: 13px">
              <thead>
                <tr>
                  <th>Room</th>
                  <th>Arrival</th>
                  <th>Departure</th>
                  <th width="80px">Price</th>
                  <th>Discount</th>
                  <th align="center" width="120">Time to be Consume</th>
                  <th>Subtotal</th>
                  <th>Status</th>
                  <th class="no-print">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($res as $result) {
                  $day = (dateDiff($result->ARRIVAL, $result->DEPARTURE) > 0) ? dateDiff($result->ARRIVAL, $result->DEPARTURE) : 0;
                  $hr = date_time_diff($result->ARRIVAL, $result->DEPARTURE, 'h');
                  $min = date_time_diff($result->ARRIVAL, $result->DEPARTURE, 'i');

                  $roomID = $result->ROOMID;
                  $status = $result->STATUS;
                  if ($day > 0) {
                    
                    $days = $day . 'day(s) and ' . $hr . ' hr(s) and ' .  $min . ' min(s)';
                  } else {
                    $day = $hr . ' hr and ' .  $min . ' min';
                  }

                  if ($result->STATUS == 'Confirmed') {
                    $stats = '<a class="btns btn-danger  btns-xs" href="' . WEB_ROOT . 'guest/controller.php?action=cancel&id=' . $result->RESERVEID . '">✕ Cancel</a>';

                    $status = "Confirmed";
                  } elseif ($result->STATUS == 'Checkedin') {

                    $stats = '';
                    $status = "Checked-In";
                  } elseif ($result->STATUS == 'Checkedout') {
                    $stats = "";
                    $status = "Checked-Out";
                  } elseif ($result->STATUS == 'Cancelled') {
                    $stats = "";
                    $status = "Cancelled";
                  } elseif ($result->STATUS == 'Pending') {
                    $stats = '<a class="btns btn-danger  btns-xs" href="' . WEB_ROOT . 'guest/controller.php?action=cancel&id=' . $result->RESERVEID . '">✕ Cancel</a>';
                    $status = "Pending";
                  }




                  if ($status == 'Cancelled') {
                    
                    echo '<tr style="text-decoration: line-through">';
                  } else {
                    echo '<tr>';
                  }

                  echo '<td>' . $result->ROOM . ' ' . $result->ROOMDESC . '  ' . $result->NUMPERSON . ' Pax</td>';
                  echo '<td>' . date_format(date_create($result->ARRIVAL), "m/d/Y H:i") . '</td>';
                  echo '<td>' . date_format(date_create($result->DEPARTURE), "m/d/Y H:i") . '</td>';
                  $departureDate = $result->DEPARTURE;
                  echo '<td >';
                  $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing`  WHERE `RoomID`=" . $result->ROOMID;
                  $mydb->setQuery($sql);
                  $pricing = $mydb->loadResultList();
                  foreach ($pricing as $pr) {
                    if ($pr->WeekRates == 'NotApplicable') {
                      echo  $pr->Description . '  &#8369 ' . $pr->Prices . ' <br/>';
                      $origPrice = $pr->Prices;
                      $type = $pr->AccomodationType;
                    } else {

                      echo $pr->Description . ' [ ' . $pr->WeekRates . ' ]:  &#8369 ' . $pr->Prices . ' <br/>';
                      $origPrice = $pr->Prices;
                      $type = $pr->AccomodationType;
                    }
                  }
                  echo  '</td>';
                  echo '<td>' . $result->Discount * 100 . '%</td>';
                  echo '<td>' . $day . '</td>';
                  echo '<td >' . $result->RPRICE - ($result->RPRICE * $result->Discount) . '</td>';
                  echo '<td >' . $status . '</td>';
                  echo '<td class="no-print" >' . $stats . '</td>';
                  echo '</tr>';

                ?>
                  <?php

                  $sql = "SELECT tblfood.*, tblfoodorders.* FROM tblfood INNER JOIN tblfoodorders ON tblfood.id = tblfoodorders.food_id WHERE code = '$result->CONFIRMATIONCODE' ORDER BY tblfoodorders.id";
                  $mydb->setQuery($sql);
                  $max_foods = $mydb->num_rows($mydb->executeQuery());
                  if ($max_foods > 0) {
                  ?>

                    <tr>
                      <td colspan="9">
                        <p style="font-weight: bold; text-align: left; font-size: 14px">Food Ordered</p>
                        <table class="tbl" style="font-size: 13px; float: left">
                          <tr>
                            <th style="width: 120px;">Food</th>
                            <th style="width: 70px;">Price</th>
                            <th style="width: 50px;">Qty</th>
                            <th style="width: 70px;">Total</th>
                            <th style="width: 100px;">Status</th>
                            <th style="width: 70px;">Action</th>
                          </tr>
                          <?php
                          $foodordered = $mydb->loadResultList();
                          foreach ($foodordered as $fo) {
                            if ($fo->status == 'Pending') {
                              $style = "color: orange;";
                            } elseif ($fo->status == 'Approved') {
                              $style = "color: green;";
                            } elseif ($fo->status == 'Cancelled' || $fo->status == 'Disapproved') {
                              $style = "color: red;";
                            }
                          ?>
                            <tr>
                              <td><?php echo   $fo->food_name; ?></td>
                              <td><?php echo ' &#8369 ' .   $fo->price; ?></td>
                              <td><?php echo    $fo->quantity; ?></td>
                              <td><?php echo ' &#8369 ' .   $fo->total_price; ?></td>
                              <td style="<?php echo $style ?>"><?php echo    $fo->status; ?></td>
                              <td><?php
                                  if ($fo->status == 'Pending') {
                                    echo "<a type='submit' href='cancelfood.php?id=" . $fo->id . "' style='color: black; text-decoration: underline; cursor: pointer'>Cancel</a>";
                                  }
                                  ?></td>
                            </tr>
                          <?php

                            if ($fo->status == 'Pending' || $fo->status == 'Cancelled' || $fo->status == 'Disapproved') {
                            } else {
                              $totalfood += $fo->total_price;

                              if ($status == 'Cancelled') {
                                $cancelled_food_amount += $fo->total_price;
                              } else {
                                $totalfood_amount += $fo->total_price;
                              }

                              
                            }
                          }
                          ?>

                        </table>

                      </td>
                    </tr>
                  <?php  } ?>
                  <?php

                  $sql = "SELECT `ID`, `BookingNo`, `RoomID`, `AddOns`, `Price`,  Qty , Total, `DateCreated` FROM `tblbookingaddons` WHERE `RoomID`='" . $result->ROOMID . "' AND `BookingNo`='" . $result->CONFIRMATIONCODE . "'";
                  $mydb->setQuery($sql);
                  $max_addons = $mydb->num_rows($mydb->executeQuery());
                  if ($max_addons > 0) {
                  ?>

                    <tr>
                      <td colspan="9">
                        <p style="font-weight: bold; text-align: left; font-size: 14px">Addons</p>
                        <table class="tbl" style="font-size: 13px; float: left">
                          <tr>
                            <th style="width: 120px;">Description</th>
                            <th style="width: 70px;">Price</th>
                            <th style="width: 50px;">Qty</th>
                            <th style="width: 70px;">Total</th>
                          </tr>
                          <?php
                          $bookads = $mydb->loadResultList();
                          foreach ($bookads as $ba) {
                          ?>
                            <tr>

                              <td><?php echo   $ba->AddOns; ?></td>
                              <td><?php echo ' &#8369 ' .   $ba->Price; ?></td>
                              <td><?php echo    $ba->Qty; ?></td>
                              <td><?php echo ' &#8369 ' .   $ba->Total; ?></td>
                            </tr>
                          <?php

                            $total_addons += $ba->Total;

                            if ($status == 'Cancelled') {
                              $cancelled_addons_amount += $ba->Total;;
                            } else {
                              $total_addons_amount += $ba->Total;
                            }
                          }
                          ?>

                        </table>

                      </td>
                    </tr>
                  <?php  } ?>
                  <tr>
                          <td colspan="9">
                            <p><b>Names of Occupants:</b></p>
                            <textarea readonly name="occupants" form="goprocess" required style="width: 250px; padding: 4px 6px;" rows="4"><?php echo $result->OCCUPANTS ?></textarea>
                          </td>
                        </tr>
                  <?php
                  $sql = "SELECT * FROM tbldamages WHERE confirmation_code = '$result->CONFIRMATIONCODE'";
                  $mydb->setQuery($sql);
                  ?>
                  <tr>
                    <td colspan="9">
                      <p style="font-weight: bold; text-align: left; font-size: 14px">Damages</p>
                      <table class="tbl" style="font-size: 13px; float: left">
                        <tr>
                          <th style="width: 120px;">Name</th>
                          <th style="width: 70px;">Amount</th>
                        </tr>
                        <?php
                        $damageslist = $mydb->loadResultList();
                        foreach ($damageslist as $dl) {
                        ?>
                          <tr>
                            <td><?php echo   $dl->damage_name; ?></td>
                            <td><?php echo ' &#8369 ' .   $dl->damage_amount; ?></td>
                          </tr>
                        <?php
                        }
                        ?>

                      </table>

                    </td>
                  </tr>
                <?php

                  $subtotal += $result->RPRICE - ($result->RPRICE * $result->Discount);

                  if ($status == 'Cancelled') {
                    
                    $cancelled_amount += $result->RPRICE;
                  } else {
                    $tot += $result->RPRICE - ($result->RPRICE * $result->Discount);
                  }
                }
                $partial = $result->PARTIAL;
                $total_amount = $subtotal  + $total_addons + $totalfood;

                $cancelled_amount = $cancelled_amount + $cancelled_addons_amount;

                $amount_paid = $tot + $total_addons_amount + $damages + $totalfood_amount - $partial;

                ?>

              </tbody>
            </table>
          </div>
          
        </div>
        

        <div class="row">
         
          <div class="col-xs-6">
           
          </div>
          
          <div class="col-xs-6">
            <p class="lead" style="font-size: 15px;">Summary</p>

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%; font-size: 13px;">Subtotal:</th>
                  <td>&#8369 <?php echo $total_amount; ?></td>
                </tr>

                <tr>
                  <th style="width:50%; font-size: 13px;">Paid Payment:</th>
                  <td>&#8369 <?php echo $partial; ?></td>
                </tr>

                <tr>
                  <th style="width:50%; font-size: 13px;">Total Damages:</th>
                  <td>&#8369 <?php echo $damages; ?></td>
                </tr>

                <tr>
                  <th style="font-size: 13px;">Cancelled Amount</th>
                  <td>&#8369 <?php echo $cancelled_amount; ?></td>
                </tr>
                
                <tr>
                  <th style="font-size: 13px;">Total Payment:</th>
                  <td>&#8369 <?php echo $amount_paid; ?></td>
                </tr>
              </table>
            </div>
          </div>
          
        </div>
        

        
        <div class="row no-print">
          <div class="col-xs-12" style="display: flex;">
            <!-- <a href="<?php echo WEB_ROOT; ?>guest/readprint.php?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->

            <?php
            echo $print;

            ?>
            
            <?php
            if ($status != "Checked-Out") {
              $display = "block";
            } else {
              $display = "none";
            }

            ?>
            <div class="dropup" style="margin-left: 4px; display: <?php echo $display ?>">
              <button class="btns btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Extend Stay
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-left: 26px; margin-bottom: 4px; padding: 8px 12px">

                <text style="display: inline-block; width: 51px;">Day(s): </text>
                <input type="number" min="0" class="input-extend" name="extend-days" style="width: 79px; margin-bottom: 6px" form="extend-form" required><br>
                <text>Hour(s): </text>
                <input type="number" max="23" min="0" class="input-extend" name="extend-hours" style="width: 79px;" form="extend-form" required><br>
                <button type="submit" name="extend" id="extend-btn" class="btns btn-warning" style="font-size: 11px; width: 100%; margin-top: 4px" form="extend-form">Confirm</button>

              </ul>
            </div>
            <button style="margin-left: 4px; display: <?php echo $display ?>" type="button" class="btns btn-warning" id="order-food">Order Food</button>
            <button style="margin-left: 4px;" type="button" class="btns btn-primary" id="rating-btn">Rate</button>

          </div>
        </div>
      </section>
    </form>
    <form method="POST" action="extend.php" id="extend-form">
      <!-- <?php echo date("Y-m-d H:i:s", strtotime($departureDate . '+1 hours')) ?> -->
      <input hidden name="departureDate" value="<?php echo $departureDate ?>">
      <input hidden name="totalPrice" value="<?php echo $total_amount ?>">
      <input hidden name="origPrice" value="<?php echo $origPrice ?>">
      <input hidden name="subtotal" value="<?php echo $subtotal ?>">
      <input hidden name="id" value="<?php echo $code ?>">
      <input hidden name="type" value="<?php echo $type ?>">
      <input hidden name="addonsPrice" value="<?php echo $total_addons ?>">

    </form>

    <form method="POST" action="cancelfood.php" id="cancel-food">

    </form>
  </div>
</div>

<div class="modal" style=" top: 0;z-index: 9999;" id="foods" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="addfood.php">
        <div class="modal-header">
          Foods
        </div>
        <div class="modal-body">
          <table id="example" style="font-size:12px;" class="table table-hover" cellspacing="0">

            <thead>
              <tr>
                <th width="20px"></th>
                <th align="center" width="20%">
                  Image
                </th>
                <th>Food Name</th>
                <th>Price</th>
                <th width="40px">Quantity</th>


              </tr>
            </thead>
            <tbody>
              <?php
              echo '<input hidden name="room_id" value="' . $roomID . '">';
              echo '<input hidden name="code" value="' . $code . '">';
              $sql = "SELECT * FROM tblfood WHERE `resort_id`='{$resortID}'";
              $mydb->setQuery($sql);
              $cur = $mydb->loadResultList();
              foreach ($cur as $result) {

                echo '<tr>';
                echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="' . $result->id . '"/></td>';
                echo '<td >  <img src="../admin/mod_food/' . $result->img . '" width="60px" height="60px" title="' . $result->food_name . '"/></td>';
                echo '<td>' . $result->food_name . '</td>';
                echo '<td> &#8369;' . $result->price . '<input hidden name="price' . $result->id . '" value="' . $result->price  . '"></td>';
                echo '<td><input type="number" min="0" name="quantity' . $result->id . '" style="padding: 2px 4px; width: 50px"></td>';
                echo '</tr>';
              }

              ?>


            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-default" data-dismiss="modal" id="close" aria-hidden="true" style="width: 60px; height: 30px"><i class="icon-remove"></i> Close</button>
          <button type="submit" name="saveFoods" class="btn-info" style="width: 60px; height: 30px"><i class="icon-off"></i> Add</button>
        </div>

      </form>
    </div>
  </div>
</div>

<div class="modal" style=" top: 0;z-index: 9999;" id="rating" tabindex="-1">
  <div class="modal-dialog" style="width: 250px !important">
    <div class="modal-content">
      <form method="post" action="rating.php">
        <div class="modal-header">
          <?php echo $rated ? "Your Rating" : "Rate your experience" ?>
        </div>
        <div class="modal-body" style="height: 300px">
          <input hidden name="resort-id" value="<?php echo $resortID ?>">
          <input hidden name="account-id" value="<?php echo $_SESSION["GUESTID"] ?>">
          <input hidden name="code" value="<?php echo $code ?>">
          <div class="rate-foods" style="position: relative; height: 90px">
            <p><b>Rate the Foods:</b></p>
            <div class="rating">
              <input type="radio" id="star5-foods" name="ratingNo-foods" <?php echo $rated ? $user_rating->food == 5 ? "checked readonly" : "" : "" ?> value="5" /><label for="star5-foods" title="Rocks!">5 stars</label>
              <input type="radio" id="star4-foods" name="ratingNo-foods" <?php echo $rated ? $user_rating->food == 4 ? "checked readonly" : "" : "" ?> value="4" /><label for="star4-foods" title="Pretty good">4 stars</label>
              <input type="radio" id="star3-foods" name="ratingNo-foods" <?php echo $rated ? $user_rating->food == 3 ? "checked readonly" : "" : "" ?> value="3" /><label for="star3-foods" title="Not Bad">3 stars</label>
              <input type="radio" id="star2-foods" name="ratingNo-foods" <?php echo $rated ? $user_rating->food == 2 ? "checked readonly" : "" : "" ?> value="2" /><label for="star2-foods" title="Kinda bad">2 stars</label>
              <input type="radio" id="star1-foods" name="ratingNo-foods" <?php echo $rated ? $user_rating->food == 1 ? "checked readonly" : "" : "" ?> value="1" /><label for="star1-foods" title="Mahal Masyado">1 star</label>
            </div>
          </div>
          <div class="rate-rooms" style="position: relative; height: 90px">
            <p><b>Rate the Rooms/Cottages:</b></p>
            <div class="rating">
              <input type="radio" id="star5-room" name="ratingNo-room" <?php echo $rated ? $user_rating->rooms == 5 ? "checked readonly" : "" : "" ?> value="5" /><label for="star5-room" title="Rocks!">5 stars</label>
              <input type="radio" id="star4-room" name="ratingNo-room" <?php echo $rated ? $user_rating->rooms == 4 ? "checked readonly" : "" : "" ?> value="4" /><label for="star4-room" title="Pretty good">4 stars</label>
              <input type="radio" id="star3-room" name="ratingNo-room" <?php echo $rated ? $user_rating->rooms == 3 ? "checked readonly" : "" : "" ?> value="3" /><label for="star3-room" title="Not Bad">3 stars</label>
              <input type="radio" id="star2-room" name="ratingNo-room" <?php echo $rated ? $user_rating->rooms == 2 ? "checked readonly" : "" : "" ?> value="2" /><label for="star2-room" title="Kinda bad">2 stars</label>
              <input type="radio" id="star1-room" name="ratingNo-room" <?php echo $rated ? $user_rating->rooms == 1 ? "checked readonly" : "" : "" ?> value="1" /><label for="star1-room" title="Mahal Masyado">1 star</label>
            </div>
          </div>
          <div class="rate-amenity" style="position: relative; height: 90px">
            <p><b>Rate the Amenities:</b></p>
            <div class="rating">
              <input type="radio" id="star5-amenity" name="ratingNo-amenity" <?php echo $rated ? $user_rating->amenity == 5 ? "checked readonly" : "" : "" ?> value="5" /><label for="star5-amenity" title="Rocks!">5 stars</label>
              <input type="radio" id="star4-amenity" name="ratingNo-amenity" <?php echo $rated ? $user_rating->amenity == 4 ? "checked readonly" : "" : "" ?> value="4" /><label for="star4-amenity" title="Pretty good">4 stars</label>
              <input type="radio" id="star3-amenity" name="ratingNo-amenity" <?php echo $rated ? $user_rating->amenity == 3 ? "checked readonly" : "" : "" ?> value="3" /><label for="star3-amenity" title="Not Bad">3 stars</label>
              <input type="radio" id="star2-amenity" name="ratingNo-amenity" <?php echo $rated ? $user_rating->amenity == 2 ? "checked readonly" : "" : "" ?> value="2" /><label for="star2-amenity" title="Kinda bad">2 stars</label>
              <input type="radio" id="star1-amenity" name="ratingNo-amenity" <?php echo $rated ? $user_rating->amenity == 1 ? "checked readonly" : "" : "" ?> value="1" /><label for="star1-amenity" title="Mahal Masyado">1 star</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-default" data-dismiss="modal" id="close-rating" aria-hidden="true" style="width: 60px; height: 30px"><i class="icon-remove"></i> Close</button>
          <?php
          if(!$rated){
            echo '<button type="submit" name="saveRate" class="btn-info" style="width: 60px; height: 30px"><i class="icon-off"></i>Confirm</button>';
          }
          ?>
          
        </div>

      </form>
    </div>
  </div>
</div>

<link href="<?php echo WEB_ROOT; ?>css/print.min.css" rel="stylesheet">

<script src="<?php echo WEB_ROOT; ?>js/print.min.js"></script>
<script>
  function printHtmlCustomStyle() {
    const style = '@page {size 8.5in 11in; margin: -30px 0px 1cm 0px; } @media print {body { margin: 1cm;border: 0px;} tr, td,th {  padding: 4px;border:1px solid #ddd;font-size:9px} .stretch > img {width: 50px; eight: 50px;} .overflows{overflow-x: hidden;} .no-print{  display: none;  } }'



    printJS({
      printable: 'invoice',
      type: 'html',
      style: style,
      css: '<?php echo WEB_ROOT; ?>css/bootstrap.min.css',
      js: '<?php echo WEB_ROOT; ?>js/vendor/bootstrap.min.js',
      scanStyles: false
    })
  }

  var modal = document.getElementById("foods");
  var btn = document.getElementById("order-food");

  var span = document.getElementById("close");

  btn.onclick = function() {
    modal.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }


  var modal2 = document.getElementById("rating");
  var btn2 = document.getElementById("rating-btn");

  var span2 = document.getElementById("close-rating");

  btn2.onclick = function() {
    modal2.style.display = "block";
  }

  span2.onclick = function() {
    modal2.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal2.style.display = "none";
    }
  }
</script>