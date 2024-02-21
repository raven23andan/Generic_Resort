 <?php include("availability.php"); ?>

 <style type="text/css">
   .panel-body #booknow {
     width: 100%;
     height: 50px;
   }

   .stretch img {
     width: 100%;
   }
 </style>
 <?php
  if (isset($_POST['booknowA'])) {


    $_SESSION['arrival'] = date_format(date_create($_POST['arrival']), "Y-m-d");
    $_SESSION['departure'] = date_format(date_create($_POST['departure']), "Y-m-d");
    $_SESSION['start_time'] = date_format(date_create($_POST['start_time']), "H:i");
    $_SESSION['end_time'] = date_format(date_create($_POST['end_time']), "H:i");
    $_SESSION['person'] = $_POST['person'];


    $days = dateDiff($_POST['arrival'], $_POST['departure']);

    $arrival =  $_SESSION['arrival'] . ' ' . $_SESSION['start_time'];
    $departure =  $_SESSION['departure'] . ' ' . $_SESSION['end_time'];
    $hr = date_time_diff($arrival, $departure, 'h');
    $min = date_time_diff($arrival, $departure, 'i');


    if ($days <= 0) {
      $msg =  $hr . ' hr(s)';
    } else {
      $msg =   $days . 'day(s) and ' . $hr . ' hr(s)';
    }



    $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE u.ResortAuth = '1' AND  r.NUMPERSON >= '" . $_POST['person'] . "' GROUP BY ResortID";
  } else {
    if (!isset($_SESSION['arrival'])) {
      $_SESSION['arrival'] = Date('Y-m-d');
    }
    if (!isset($_SESSION['departure'])) {
      
      $_SESSION['departure'] =  Date('Y-m-d');
    }

    if (!isset($_SESSION['start_time'])) {
      $_SESSION['start_time'] = Date('H:i');
    }
    if (!isset($_SESSION['end_time'])) {
      $_SESSION['end_time'] = Date('H:i', strtotime('+1 hrs'));
    }

    $arrival =  $_SESSION['arrival'] . ' ' . $_SESSION['start_time'];
    $departure =  $_SESSION['departure'] . ' ' . $_SESSION['end_time'];
    $hr = date_time_diff($arrival, $departure, 'h');
    $min = date_time_diff($arrival, $departure, 'i');

    if (isset($_SESSION['arrival'])) {
      
      $days = dateDiff($_SESSION['arrival'], $_SESSION['departure']);

      if ($days <= 0) {
        $msg = $hr . ' hr';
        
      } else {

        $msg = $days . 'day(s) and ' . $hr . ' hr(s)';
      }
    } else {
      $msg =  $type . ' today';
    }

    if (isset($_SESSION['person'])) {
      
      $pax =  $_SESSION['person'];
      $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE u.ResortAuth = '1'  AND  `NUMPERSON` >='$pax' GROUP BY ResortID";
    } else {

      $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE u.ResortAuth = '1' GROUP BY ResortID";
    }
  }
  ?>





 <section class="services" style="margin-top:0px">
   <div class="container">
     <input style="width: 100%; padding: 8px 14px; margin-bottom: 36px" placeholder="Search Rooms/Accomodations/Amenity..." id="search-accom">
     <div class="row" id="accom-row">
       <div class="col-md-12">



         <?php
          $status = "";
         


          $mydb->setQuery($query);
          $cur = $mydb->loadResultList();
          foreach ($cur as $result) {
            $resortName = $result->UNAME;
            $resortID = $result->USERID;

            $roomNo = $result->OROOMNUM;
            $type = $result->AccomodationType;
            // filtering the rooms
            // ======================================================================================================
            $mydb->setQuery("SELECT * FROM `tblreservation` WHERE STATUS<>'Pending' AND ((
        '$arrival' >= DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d %H:%i')
        AND  '$arrival' <= DATE_FORMAT(`DEPARTURE`,'%Y-%m-%d %H:%i')
        )
        OR (
        '$departure' >= DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d %H:%i')
        AND  '$departure' <= DATE_FORMAT(`DEPARTURE`,'%Y-%m-%d %H:%i')
        )
        OR (
        DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d %H:%i') >=  '$arrival'
        AND DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d %H:%i') <=  '$departure'
        )
        ) AND ROOMID =" . $result->ROOMID);



            $curs = $mydb->executeQuery();
            $maxrow = $mydb->num_rows($curs);

            $resNum =  $roomNo - $maxrow;
            if ($maxrow > 0) {
              $rs  = $mydb->loadSingleResult();
              $status = $rs->RPRICE;
            }


            if ($resNum > 0) {

          ?>



             <a href="index.php?p=resorts&id=<?php echo $resortID; ?>">
               <div class="panel panel-primary">
                 <div class="panel-body" style="padding: 0px;">
                   <div class="col-md-4 stretch" style="padding: 0px;margin:0px"><img src="<?php echo WEB_ROOT . 'admin/mod_room/' . $result->ROOMIMAGE; ?>"></div>
                   <div class="col-md-6">
                     <h4><?php echo $resortName; ?></h4>
                     <div class="col-md-12 room-name-div">
                       <?php
                        echo $result->ROOM;
                        ?>
                     </div>
                     <br />
                     <div class="col-md-12">
                       <?php
                        echo $result->ROOMDESC;
                        ?>
                     </div>
                   </div>
                   <div class="col-md-2">

                     <p>Great Offer</p>
                     <br />
                     <br />
                     <br />


                     <?php
                      echo $msg . ', <i class="fa fa-users"></i> ' . $result->NUMPERSON;


                      switch ($type) {

                        case 'Room':

                          if ($days <= 0) {



                            $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing` WHERE `RoomID`=" . $result->ROOMID;
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
                                
                                $totalprice = $pr->Prices  * $days;
                              }
                            }
                          } else {
                            $totalextend = 0;
                            $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing` WHERE ConsumeHour=24 AND  `RoomID`=" . $result->ROOMID;
                            $mydb->setQuery($sql);

                            $pr = $mydb->loadSingleResult();


                            $totalprice = $pr->Prices  * $days;


                            

                            $totalprice =  $totalprice + $totalextend;
                          }

                          break;


                        case 'Cottage':

                          $days = $days + 1;

                          $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing` WHERE  `RoomID`=" . $result->ROOMID;
                          $mydb->setQuery($sql);
                          if ($mydb->num_rows($mydb->executeQuery()) > 0) {
                            $pr = $mydb->loadSingleResult();

                            $totalprice = $pr->Prices  * $days;
                          } else {
                            $totalprice = 0;
                          }

                          break;
                      }


                      ?>
                     <div style="padding-bottom: 10px;font-size:19px;padding-top: 10px;">
                       <?php
                        
                        echo '₱ ' . $totalprice;
                        ?>
                     </div>

                     <button type="submit" class="btn" id="booknow" name="booknow" onclick="">SEE AVAILABILITY</button>

                   </div>
                 </div>
               </div>
             </a>


         <?php }
          } ?>







       </div>
     </div>


   </div>
 </section>
 <script>
  const searchInput = document.getElementById("search-accom");
  const contentDiv = document.getElementById("accom-row");
  const contentElements = contentDiv.querySelectorAll(".panel.panel-primary"); 

  searchInput.addEventListener("input", function() {
    const searchTerm = searchInput.value.toLowerCase();

    contentElements.forEach(function(element) {
      const contentText = element.textContent.toLowerCase();
      if (contentText.includes(searchTerm)) {
        element.style.display = "block"; 
      } else {
        element.style.display = "none"; 
      }
    });
  });
</script>