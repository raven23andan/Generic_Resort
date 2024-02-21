<?php include("../banner-home.php"); ?>

<div class="container">
  <div class="row">
    <div class="row">
      <ul class="pager">
        <li class="previous"><a href="index.php?p=resorts">&larr; Back</a>
        </li>

      </ul>
    </div>

    <div id="accom-title">
      <div class="pagetitle">
        <h1>Billing Details

        </h1>
      </div>
    </div>

    <!-- <div id="bread">
   <ol class="breadcrumb">
      <li><a href="<?php echo WEB_ROOT; ?>index.php">Home</a> </li> 
      <li><a href="<?php echo WEB_ROOT; ?>booking/">Booking Cart</a></li>  
       <li class="active">Booking Details</li>
   </ol> 
</div> 
 -->

    <form action="index.php?view=payment" method="post" name="personal">


      <div class="col-md-12">

        <div class="row">
          <div class="col-md-8 col-sm-4">
            <div class="col-md-12">
              <label>Name:</label>
              <?php echo $_SESSION['name'] . ' ' . $_SESSION['last'];
              ?>
            </div>
            <div class="col-md-12">
              <label>Address:</label>
              <?php echo  isset($_SESSION['address'])  ? $_SESSION['address'] : ' '; ?>
            </div>
            <div class="col-md-12">
              <label>Phone #:</label>
              <?php echo $_SESSION['phone']; ?>
            </div>
          </div>
          <div class="col-md-4 col-sm-2">
            <div class="col-md-12">
              <label>Transaction Date:</label>
              <?php echo date("m/d/Y"); ?>
            </div>

          </div>
        </div>
        <br />




        <div class="row">
          <div class="table-responsive">
            <table class="table" style="font-size: 13px">
              <thead>
                <tr>
                  <td>Room</td>
                  <td>Arrival</td>
                  <td>Departure</td>
                  <td>Rates</td>
                  <td>Discount</td>
                  <td>Time to be Consume</td>
                  <td>Amount</td>
                </tr>
              </thead>
              <tbody>
                <?php
                $payable = 0;
                $total_amount = 0;
                if (isset($_SESSION['m_cart'])) {
                  $count_cart = count($_SESSION['m_cart']);


                  for ($i = 0; $i < $count_cart; $i++) {

                    $query = "SELECT * FROM `tblroom`  WHERE   ROOMID=" . $_SESSION['m_cart'][$i]['mroomid'];
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $result) {


                ?>


                      <tr>

                        <?php
                        echo '<td>' . $result->ROOM . ' ' . $result->ROOMDESC . '  (' . $result->NUMPERSON . ' PAX) <br/><b> Location: ' . $result->AccomodationType . '</b></td>';
                        if ($result->AccomodationType == 'Private Pool' || $result->AccomodationType == 'Public Pool' || $result->AccomodationType == 'Function Hall') {
                          echo '<td>' . date_format(date_create($_SESSION['m_cart'][$i]['mcheckin']), "m/d/Y") . '</td>';
                          echo '<td>' . date_format(date_create($_SESSION['m_cart'][$i]['mcheckout']), "m/d/Y") . '</td>';
                        } else {
                          echo '<td>' . date_format(date_create($_SESSION['m_cart'][$i]['mcheckin']), "m/d/Y h:i a") . '</td>';
                          echo '<td>' . date_format(date_create($_SESSION['m_cart'][$i]['mcheckout']), "m/d/Y h:i a") . '</td>';
                        }
                        echo '<td>';
                        $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing`  WHERE `RoomID`=" . $result->ROOMID;
                        $mydb->setQuery($sql);
                        $pricing = $mydb->loadResultList();
                        foreach ($pricing as $pr) {
                          if ($pr->WeekRates == 'NotApplicable') {
                            echo  $pr->Description . '  &#8369 ' . $pr->Prices . ' <br/>';
                          } else {

                            echo $pr->Description . ' [ ' . $pr->WeekRates . ' ]:  &#8369 ' . $pr->Prices . ' <br/>';
                          }
                        }
                        echo  '</td>';
                        echo '<td>' . $result->Discount * 100 . '%</td>';
                        ?>
                        <td><?php echo   $_SESSION['m_cart'][$i]['mday']; ?></td>
                        <td><?php echo ' &#8369 ' .   $_SESSION['m_cart'][$i]['mroomprice'] - ($_SESSION['m_cart'][$i]['mroomprice'] * $result->Discount); ?></td>
                      </tr>
                      <tr>
                          <td colspan="4">
                            <p><b>Names of Occupants:</b></p>
                            <textarea name="occupants" form="goprocess" required style="width: 250px; padding: 4px 6px;" rows="4"></textarea>
                          </td>
                        </tr>
                      <?php
                      if ($result->AccomodationType == 'Private Pool' || $result->AccomodationType == 'Public Pool' || $result->AccomodationType == 'Room') {
                      ?>
                        
                        <tr>
                          <td colspan="3">
                            <p>Addons <!--  <?php
                                            echo '<button class="toggle-modal-reserve"  data-id="' . $result->ROOMID . '" >Add New <i class="fa fa-plus"></i></button>';
                                            ?> --> </p>

                            <table class="table" style="font-size: 13px;">
                              <tr>
                               
                                <th>Description</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                              </tr>

                              <?php
                              if (isset($_SESSION['addons_cart'])) {
                                $count_addons = count($_SESSION['addons_cart']);

                                for ($ads = 0; $ads < $count_addons; $ads++) {
                                  if ($_SESSION['addons_cart'][$ads]['roomID'] == $result->ROOMID) {

                                    $sql = "SELECT `AddonsID`, `Addons`, `Price`, `AddonsType` FROM `tbladdons` WHERE `AddonsID`='" . $_SESSION['addons_cart'][$ads]['id'] . "'";
                                    $mydb->setQuery($sql);
                                    $ba = $mydb->loadSingleResult();
                              ?>
                                    <tr>
                                      <!-- <td style="white-space: nowrap;width: 1px"><a class="btn-danger" href="addtocart.php?action=deleteaddons&id=<?php echo $ba->AddonsID . '&ROOMID=' . $result->ROOMID; ?>"><i class="fa fa-trash-o"></i> Remove</a></td>  -->
                                      <td><?php echo   $ba->Addons; ?></td>
                                      <td><?php echo ' &#8369 ' .   $ba->Price; ?></td>
                                      <td><?php echo    $_SESSION['addons_cart'][$ads]['qty']; ?></td>
                                      <td><?php echo ' &#8369 ' .   $_SESSION['addons_cart'][$ads]['total']; ?></td>
                                    </tr>
                              <?php
                                    $total_amount += $_SESSION['addons_cart'][$ads]['total'];
                                  }
                                }
                              }

                              ?>

                            </table>
                          </td>
                          <td colspan="4"></td>
                        </tr>


                <?php




                      }


                      $payable += $_SESSION['m_cart'][$i]['mroomprice'] - ($_SESSION['m_cart'][$i]['mroomprice'] * $result->Discount);

                      $payable = $payable + $total_amount;
                    }
                  }
                  $_SESSION['pay'] = $payable;
                  
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>


        <div class="row">
          <h3 align="right">Total: &#8369 <?php echo   $_SESSION['pay']; ?></h3>
          
        </div>
      
      </div>
    </form>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">

          <label>Payment Method: </label> <br />

          <div id="myRadioGroup">
            <input type="radio" name="cars" checked="checked" value="2" /> Cash / Payment upon
            <input type="radio" name="cars" value="3" /> Paypal
            <br />
            <br />
            <div id="Cars2" class="desc">
              <form id="goprocess" method="post" action="processpayment.php">
                <button class="btn" name="submit" type="submit">Submit Booking</button>
              </form>
            </div>
            
            <div id="Cars3" class="desc" style="display: none;">
              <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
                <input type="hidden" value="genericresort@business.com" name="business">
                <input type="hidden" value="_xclick" name="cmd">
                <input type="hidden" value="Partial Payments" name="item_name">
                <input type="hidden" value="<?php echo $_SESSION['pay']; ?>" name="amount">
                <input type="hidden" name="currency_code" value="PHP">

                <input type="hidden" name="return" value="https://genericresort.online/booking/processpayment.php">
                <input type="hidden" name="cancel_return" value="https://genericresort.online/">
                <input type="image" style="height:100px;" name="submit" id="btnpay" border="0" src="<?php echo WEB_ROOT; ?>images/Make-a-Payment-button.png" alt="PayPal - The safer, easier way to pay online">
                <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
              </form>
            </div>
          </div>

          <br />
          <br />

        </div>
      </div>
    </div>

  </div>
</div>