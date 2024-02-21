<?php
require_once("../includes/initialize.php");
$code = isset($_POST['code']) ? $_POST['code'] : $_GET['code'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>


  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/responsive.css">

  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/custom-navbar.min.css">

 
  <!-- <link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet"> -->

  <link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo WEB_ROOT; ?>css/datepicker.css" rel="stylesheet" media="screen">

  <link href="<?php echo WEB_ROOT; ?>css/galery.css" rel="stylesheet" media="screen">
  <link href="<?php echo WEB_ROOT; ?>css/ekko-lightbox.css" rel="stylesheet">
</head>

<body onload="window.print();">
  <div class="wrapper">
    <?php
    $query = "SELECT * FROM `tblguest` g ,`tblreservation` r 
               WHERE g.`GUESTID`=r.`GUESTID` and `CONFIRMATIONCODE` ='" . $code . "'";
    $mydb->setQuery($query);
    $result = $mydb->loadsingleResult();


    ?>


    <form action="<?php echo WEB_ROOT;; ?>guest/readprint.php?>" method="POST" target="_blank">
      
      <section class="invoice">
        
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe">
                <?php
                $sql = "SELECT * FROM `tbluseraccount` WHERE `USERID`='{$result->ResortID}'";
                $mydb->setQuery($sql);
                $single_resort = $mydb->loadSingleResult();
                echo $single_resort->UNAME;
                ?>
              </i>
              <small class="pull-right">Date: <?php echo date('m/d/Y'); ?></small>
            </h2>
          </div>
         
        </div>
        
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong> <?php echo $single_resort->UNAME; ?> </strong>
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
          WHERE    RM.`ROOMID`=RS.`ROOMID` AND RS.`STATUS`<>'Cancelled' and `CONFIRMATIONCODE` ='" . $code . "'";
        $mydb->setQuery($query);
        $res = $mydb->loadResultList();


        ?>
        
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Room</th>
                  <th>Arrival</th>
                  <th>Departure</th>
                  <th>Price</th>
                  <th align="center" width="120">Time to be Consume</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($res as $result) {
                  $day = (dateDiff($result->ARRIVAL, $result->DEPARTURE) > 0) ? dateDiff($result->ARRIVAL, $result->DEPARTURE) : 0;
                  $hr = date_time_diff($result->ARRIVAL, $result->DEPARTURE, 'h');
                  $min = date_time_diff($result->ARRIVAL, $result->DEPARTURE, 'i');

                  if ($day > 0) {
                    
                    $days = $day . 'day(s) and ' . $hr . ' hr(s) and ' .  $min . ' min(s)';
                  } else {
                    $day = $hr . ' hr and ' .  $min . ' min';
                  }

                  echo '<tr>';
                  echo '<td>' . $result->ROOM . ' ' . $result->ROOMDESC . '  ' . $result->NUMPERSON . ' Pax</td>';
                  echo '<td>' . date_format(date_create($result->ARRIVAL), "m/d/Y H:i") . '</td>';
                  echo '<td>' . date_format(date_create($result->DEPARTURE), "m/d/Y H:i") . '</td>';
                  echo '<td >';
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
                  echo '<td>' . $day . '</td>';
                  echo '<td > &#8369 ' . $result->RPRICE . '</td>';

                  echo '</tr>';

                  @$tot += $result->RPRICE;
                } ?>
              </tbody>
            </table>
          </div>
         
        </div>
        

        <div class="row">
          
          <div class="col-xs-6">
      
          </div>
          
          <div class="col-xs-6">
            <p class="lead">Total Amount</p>

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Total:</th>
                  <td>&#8369 <?php echo @$tot; ?></td>
                </tr>
            
              </table>
            </div>
          </div>
         
        </div>
        

      </section>
    </form>
  
    <div class="clearfix"></div>

  </div>

</body>

</html>

<script type="text/javascript">
  window.onafterprint = window.close;
</script>