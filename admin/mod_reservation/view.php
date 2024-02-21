<?php
if (!defined('WEB_ROOT')) {
  exit;
}

$total_addons = 0;
$code = $_GET['code'];
$payable = 0;
$cancelled_amount = 0;
$total_amount = 0;
$subtotal = 0;
$amount_paid = 0;
$cancelled_addons_amount = 0;
$total_addons_amount = 0;
$damage_amount = 0;
$partial = 0;

$totalfood = 0;
$totalfood_amount = 0;

$query = "SELECT  *
FROM  `tblpayment` p,  `tblguest` g
WHERE p.`GUESTID` = g.`GUESTID` AND `CONFIRMATIONCODE`='" . $code . "'";
$mydb->setQuery($query);
$res = $mydb->loadSingleResult();

$damage_amount = $res->DPRICE;

$sql = "UPDATE `tblpayment` SET `MSGVIEW`=0 WHERE `CONFIRMATIONCODE` ='" . $code . "'";
$mydb->setQuery($sql);
$mydb->executeQuery();

$query2 = "SELECT  PAYMENT_STATUS
FROM  tblreservation
WHERE `CONFIRMATIONCODE`='" . $code . "'";
$mydb->setQuery($query2);
$res2 = $mydb->loadSingleResult();

?>
<style type="text/css">
  td img {
    width: 100%;
    height: 800px;
  }

  #damage-modal .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4) !important;
  }

  #damage-modal .modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 250px;
  }


  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-left: 10px;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>

<form method="post" action="controller.php?action=confirm">
  <div class="container">

    <div class="row">
      <div class="col-md-8 col-sm-4">
        <div class="col-md-12">
          <label>Guest Information</label>
        </div>
        <div class="col-md-12">
          <label>Name:</label>
          <?php echo $res->G_FNAME . ' ' . $res->G_LNAME; ?>
        </div>
        <div class="col-md-12">
          <label>Address:</label>
          <?php echo $res->G_ADDRESS; ?>
        </div>
        <div class="col-md-12">
          <label>Phone #:</label>
          <?php echo $res->G_PHONE; ?>
        </div>
      </div>
      <div class="col-md-4 col-sm-2">
        <div class="col-md-12">
          <label>Transaction Details</label>
        </div>
        <div class="col-md-12">
          <label>Date:</label>
          <?php echo  $res->TRANSDATE; ?>
        </div>
        <div class="col-md-12">
          <label>Transaction Code:</label>
          <input type="hidden" name="TransactionCode" id="TransactionCode" value="<?php echo  $res->CONFIRMATIONCODE; ?> ">
          <?php echo  $res->CONFIRMATIONCODE; ?>
        </div>
        <div class="col-md-12">
          <label>Payment Status:</label>
          <?php echo  $res2->PAYMENT_STATUS == null ? "No Payment Done" : ($res2->PAYMENT_STATUS == "Partial Done" ? "Partial Payment Done" : "Full Payment Done") ; ?>
        </div>

      </div>
    </div>

    <div class="panel panel-primary">
      <div class="panel-heading">Resevation Details</div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table" style="font-size: 12px">
            <thead>
              <tr>
                
                <td></td>
                <td>Room</td>
                <td>Arrival</td>
                <td>Departure</td>
                <td>Rates</td>
                <td>Time to be Consume</td>
                <td>Amount</td>
                <td>Discount</td>
                <td>Status</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * 
        FROM  `tblreservation` r,  `tblguest` g,  `tblroom` rm 
        WHERE r.`ROOMID` = rm.`ROOMID`  
        AND g.`GUESTID` = r.`GUESTID`  
        AND  `CONFIRMATIONCODE` = '" . $code . "'";
              $mydb->setQuery($query);
              $result = $mydb->loadResultList();

              foreach ($result as $cur) {
                $image = WEB_ROOT . 'admin/mod_room/' . $cur->ROOMIMAGE;

                $days = $cur->REMARKS;

                $partial = $cur->PARTIAL;

                $arrival = $cur->ARRIVAL;
                $departure = $cur->DEPARTURE;
                $hr = date_time_diff($arrival, $departure, 'h');
                $min = date_time_diff($arrival, $departure, 'i');

              ?>

                
                <?php
                

                if ($cur->STATUS == 'Confirmed' && $res2->PAYMENT_STATUS == null) {
                  $stats = '<a type="submit"  class="btn btn-primary btn-xs" id="partial-btn">Partial Payment &rarr;</a> <a class="btn btn-danger  btn-xs" href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?id=' . $cur->RESERVEID . '&action=cancelroom">✕ Cancel</a>';
                  $status = "Confirmed";
                } elseif($res2->PAYMENT_STATUS == "Partial Done" && $cur->STATUS == 'Confirmed') {
                  $stats = '<a href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?action=checkin&id=' . $cur->RESERVEID . '" class="btn btn-primary btn-xs">CheckIn &rarr;</a> <a class="btn btn-danger  btn-xs" href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?id=' . $cur->RESERVEID . '&action=cancelroom">✕ Cancel</a>';
                  $status = "Confirmed";
                } elseif ($cur->STATUS == 'Checkedin' && $res2->PAYMENT_STATUS == "Partial Done") {
                  $stats = '<button type="submit" name="fullpay-btn" form="fullpay-form" class="btn btn-primary btn-xs" id="full-btn">Full Payment &rarr;</button> <a class="btn btn-danger  btn-xs" href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?id=' . $cur->RESERVEID . '&action=cancelroom">✕ Cancel</a>';
                  $status = "Checked-In";
                } elseif ($res2->PAYMENT_STATUS == "Full Done" && $cur->STATUS == 'Checkedin'){
                  $stats = '<a href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?action=checkout&id=' . $cur->RESERVEID . '" class="btn btn-primary btn-xs">Checked Out &rarr;</a>';
                  $status = "Checked-In";
                } elseif ($cur->STATUS == 'Checkedout') {
                  $stats = "";
                  $status = "Checked-Out";
                } elseif ($cur->STATUS == 'Cancelled') {
                  $stats = "";
                  $status = "Cancelled";
                } else {

                  $stats = '<a href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?action=confirm&id=' . $cur->RESERVEID .
                    '" class="btn btn-primary btn-xs" >Confirm Reservation &rarr;</a> <a class="btn btn-danger btn-xs" href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?id=' . $cur->RESERVEID . '&action=cancelroom">X Cancel</a>';
                  $status = "Pending";
                }


                if ($status == 'Cancelled') {
                  // code...
                  echo '<tr style="text-decoration: line-through">';
                } else {
                  echo '<tr>';
                }

                ?>



                <td width="100px"><img class="img-responsive img-hover" src="<?php echo $image; ?>" alt="" /></td>
                <?php
                echo '<td>' . $cur->ROOM . ' ' . $cur->ROOMDESC . '  (' . $cur->NUMPERSON . ' PAX) <br/><b> Location: ' . $cur->AccomodationType . '</b></td>';

                if ($cur->AccomodationType == 'Private Pool' || $cur->AccomodationType == 'Public Pool' || $cur->AccomodationType == 'Function Hall') {
                  echo '<td>' . date_format(date_create($cur->ARRIVAL), "m/d/Y") . '</td>';
                  echo '<td>' . date_format(date_create($cur->DEPARTURE), "m/d/Y") . '</td>';
                } else {
                  echo '<td>' . date_format(date_create($cur->ARRIVAL), "m/d/Y h:i a") . '</td>';
                  echo '<td>' . date_format(date_create($cur->DEPARTURE), "m/d/Y h:i a") . '</td>';
                }
                ?>

                <td>
                  <?php
                  $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing`  WHERE `RoomID`=" . $cur->ROOMID;
                  $mydb->setQuery($sql);
                  $pricing = $mydb->loadResultList();
                  foreach ($pricing as $pr) {
                    if ($pr->WeekRates == 'NotApplicable') {
                      echo  $pr->Description . '  &#8369 ' . $pr->Prices . '<br>';
                    } else {

                      echo $pr->Description . ' [ ' . $pr->WeekRates . ' ]:  &#8369 ' . $pr->Prices . ' <br/>';
                    }
                  }

                  ?>
                </td>
                <td><?php echo  $days; ?></td>
                <td><?php echo ' &#8369 ' .  $cur->RPRICE - ($cur->RPRICE * $cur->Discount); ?></td>
                <td><?php echo $cur->Discount * 100 ?>%</td>
                <td><?php echo $status; ?></td>
                <td><?php echo $stats; ?><br>
                  <?php echo ($status == 'Checked-In') ? '<button type="button" id="damage-btn" class="btns btn-danger" style="border: 0; margin-top: 2px; border-radius: 3px; padding: 3px 6px">Add Damages &rarr;</button>' : '' ?></td>
                </tr>
                <?php

                $sql = "SELECT tblfood.*, tblfoodorders.* FROM tblfood INNER JOIN tblfoodorders ON tblfood.id = tblfoodorders.food_id WHERE code = '$cur->CONFIRMATIONCODE' ORDER BY tblfoodorders.id";
                $mydb->setQuery($sql);
                $max_foods = $mydb->num_rows($mydb->executeQuery());
                if ($max_foods > 0) {
                ?>

                  <tr>
                    <td colspan="10">
                      <p style="font-weight: bold; text-align: right; font-size: 14px">Food Ordered</p>
                      <table class="tbl" style="font-size: 13px; float: right">
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
                            <?php
                            if ($status != "Checked-Out") {

                              if ($fo->status == 'Pending') {
                            ?>
                                <td>
                                  <a style="cursor: pointer" href="managefood.php?action=approve&id=<?php echo $fo->id ?>&code=<?php echo $cur->CONFIRMATIONCODE ?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                  <a style="cursor: pointer" href="managefood.php?action=deny&id=<?php echo $fo->id ?>&code=<?php echo $cur->CONFIRMATIONCODE ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                </td>
                            <?php
                              } else {
                                echo "<td></td>";
                              }
                            }
                            ?>
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

                $sql = "SELECT `ID`, `BookingNo`, `RoomID`, `AddOns`, `Price`,  Qty , Total, `DateCreated` FROM `tblbookingaddons` WHERE `RoomID`='" . $cur->ROOMID . "' AND `BookingNo`='" . $res->CONFIRMATIONCODE . "'";
                $mydb->setQuery($sql);
                $max_addons = $mydb->num_rows($mydb->executeQuery());
                if ($max_addons > 0) {
                ?>

                  <tr>
                    <td colspan="10">
                      <p style="font-weight: bold; text-align: right; font-size: 14px">Addons</p>
                      <table class="tbl" style="font-size: 13px; float: right">
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
                            <textarea readonly name="occupants" form="goprocess" required style="width: 250px; padding: 4px 6px;" rows="4"><?php echo $cur->OCCUPANTS ?></textarea>
                          </td>
                        </tr>
                <?php
                  $sql = "SELECT * FROM tbldamages WHERE confirmation_code = '$cur->CONFIRMATIONCODE'";
                  $mydb->setQuery($sql);
                  ?>
                  <tr>
                    <td colspan="10">
                      <p style="font-weight: bold; text-align: right; font-size: 14px">Damages</p>
                      <table class="tbl" style="font-size: 13px; float: right">
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

                $subtotal += $cur->RPRICE - ($cur->RPRICE * $cur->Discount);

                if ($status == 'Cancelled') {
                  // code... 
                  $cancelled_amount += $cur->RPRICE - ($cur->RPRICE * $cur->Discount);
                } else {
                  $payable += $cur->RPRICE - ($cur->RPRICE * $cur->Discount);
                }
              }

              $total_amount = $subtotal  + $total_addons + $totalfood;

              $cancelled_amount = $cancelled_amount + $cancelled_addons_amount;

              $amount_paid = $payable + $total_addons_amount + $damage_amount + $totalfood_amount - $partial;

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <h3 align="right" style="font-size: 15px">Total Amount: <text align="left" style="width: 70px; display: inline-block">&#8369 <?php echo    $total_amount; ?></text></h3>
      <h3 align="right" style="font-size: 15px">Paid Amount: <text align="left" style="width: 70px; display: inline-block">&#8369 <?php echo    $partial; ?></text></h3>
      <h3 align="right" style="font-size: 15px">Damage Amount: <text align="left" style="width: 70px; display: inline-block">&#8369 <?php echo    $damage_amount; ?></text></h3>
      <h3 align="right" style="font-size: 15px">Cancelled Amount: <text align="left" style="width: 70px; display: inline-block;">&#8369 <?php echo    $cancelled_amount; ?></text></h3>
      <h3 align="right" style="font-size: 15px; font-weight: bold">Total Payment: <text align="left" style="width: 70px; display: inline-block">&#8369 <?php echo  $amount_paid; ?></text></h3>
      <!-- <h3 align="right">Balance: &#8369 <?php echo   0; ?></h3> -->
    </div>
    
    <div class="row">
      <ul class="pager">
        <li class="previous"><a href="<?php echo WEB_ROOT . 'admin/mod_reservation/index.php'; ?>">&larr; Back</a>
        </li>
        <?php
       

        ?>
      </ul>
    </div>


</form>

<div id="damage-modal" class="modal">
  
  <div class="modal-content" style="width: 500px;">
    <span class="close" id="close">&times;</span>
    <div>
      <form method="POST" action="damages.php">
        <h3 style="font-size: 14px;">Enter Damages (&#8369;): </h3>
        <input hidden name="code" value="<?php echo $code ?>">
        <div  class="damage-container">
          <div class="damage-div" style="display: flex; flex-direction: row">
            <input required name="d-name[]" type="text" style="padding: 4px 8px; border: 1px grey solid; width: 100%; margin-bottom: 12px" placeholder="Enter Damage Name">
            <input required oninput="updateTotalAmount()" name="d-amount[]" min=0 type="number" style="padding: 4px 8px; border: 1px grey solid; width: 75%; margin-bottom: 12px; margin-left: 6px" placeholder="Enter Damage Amount">
            <button type="button" class="btn btn-danger remove-row" style="width: 10%; margin-bottom: 12px; margin-left: 6px">X</button>
          </div>
        </div>
        
        <div style="display: flex; flex-direction: column">
          <p style="margin: 0">Total: </p>
          <input value="0" type="number" name="damage_amount" style="padding: 4px 8px; border: 1px grey solid; width: 30%; margin-bottom: 12px" readonly>
        </div>
        <button type="button" class="btn btn-primary" style="width: 100%; padding: 4px; margin-bottom: 4px" id="add-another">Add Another</button>
        <button type="submit" name="submit" class="btn btn-success" style="width: 100%; padding: 4px">Confirm</button>
      </form>
    </div>
  </div>

</div>

<div class="modal" style=" top: 0;z-index: 9999;" id="mpartial" tabindex="-1">
  <div class="modal-dialog" style="width: 250px !important">
    <div class="modal-content">
      <form id="partial-form" method="POST" action="partialpay.php">
        <div class="modal-header">
          Partial Payment
        </div>
        <div class="modal-body">
          <input hidden name="code" value="<?php echo $code ?>">
          <p><b>Enter Amount:</b></p>
          <input name="partial-amount" style="padding: 4px 6px">
        <div class="modal-footer">
          <button type="button" class="btn-default" data-dismiss="modal" id="close-mpartial" aria-hidden="true" style="width: 60px; height: 30px"><i class="icon-remove"></i> Close</button>
          <button type="submit" name="partialSave" class="btn-info" style="width: 60px; height: 30px"><i class="icon-off"></i>Confirm</button>
        </div>

      </form>
    </div>
  </div>
</div>

<div class="modal" style=" top: 0;z-index: 9999;" id="fpartial" tabindex="-1">
  <div class="modal-dialog" style="width: 250px !important">
    <div class="modal-content">
      <form id="fullpay-form" method="POST" action="fullpay.php">
        <div class="modal-header">
          Full Payment
        </div>
        <div class="modal-body">
          <input hidden name="code" value="<?php echo $code ?>">
          <p><b>Enter Amount:</b></p>
          <input name="fullpay-amount" value="<?php echo $total_amount ?>" style="padding: 4px 6px">
        <div class="modal-footer">
          <button type="button" class="btn-default" data-dismiss="modal" id="close-fpartial" aria-hidden="true" style="width: 60px; height: 30px"><i class="icon-remove"></i> Close</button>
          <button type="submit" name="fullpaySave" class="btn-info" style="width: 60px; height: 30px"><i class="icon-off"></i>Confirm</button>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
  var modalP = document.getElementById("mpartial");
  var btnP = document.getElementById("partial-btn");
  var spanP = document.getElementById("close-mpartial");

  if(btnP){
    btnP.onclick = function() {
      modalP.style.display = "block";
    }
  }
  
  spanP.onclick = function() {
    modalP.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modalP) {
      modalP.style.display = "none";
    }
  }

  var modal = document.getElementById("damage-modal");
  var btn = document.getElementById("damage-btn");
  var span = document.getElementById("close");

  if(btn){
    btn.onclick = function() {
      modal.style.display = "block";
    }
  }
  
  span.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  
  const totalAmountInput = document.querySelector("input[name='damage_amount']");
  document.addEventListener("DOMContentLoaded", function () {
  const addButton = document.getElementById("add-another");
  const damageContainer = document.querySelector(".damage-container");
  const originalDamageDiv = document.querySelector(".damage-div");
  

  
  let totalAmount = 0;

  addButton.addEventListener("click", function () {
    
    const newDamageDiv = originalDamageDiv.cloneNode(true);

    
    const inputs = newDamageDiv.querySelectorAll("input[type='text'], input[type='number']");
    inputs.forEach((input) => (input.value = ""));

    
    damageContainer.appendChild(newDamageDiv);

   
    const removeButton = newDamageDiv.querySelector(".remove-row");
    removeButton.addEventListener("click", function () {
      damageContainer.removeChild(newDamageDiv);
      updateTotalAmount();
    });

   
    updateTotalAmount();
  });

  
});
function updateTotalAmount() {
    totalAmount = 0;
    const amountInputs = document.querySelectorAll("input[name='d-amount[]']");
    amountInputs.forEach((input) => {
      totalAmount += parseFloat(input.value) || 0;
    });

    
    totalAmountInput.value = totalAmount;
  }
</script>