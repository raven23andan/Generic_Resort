<style type="text/css">
  .strecth img {
    width: 100%;
  }

  hr {
    color: #fff;
  }
</style>
<style type="text/css">
  .gold {
    color: gold;
  }

  .rating {
    float: left;
  }


  .rating:not(:checked)>input {
    position: absolute;
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
    font-size: 200%;
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

  .tableRating tr td {
    padding: 5px 20px;

  }

  .line-row {
    border-bottom: 1px solid #939EA6;
    padding-bottom: 10px;
  }
</style>

<?php include("banner-home.php"); ?>
<?php

if (isset($_POST['submitRating'])) {
  
  $ratingNo = $_POST['ratingNo'];
  $resortID = $_POST['resortID'];
  $g_username = $_SESSION['username'];
  $fedback = $_POST['fedback'];
  $sql = "INSERT INTO `tblrating` (`RatingNo`, `StoreID`, `Customer_Username`, `RateDate`, `FeedBack`) 
         VALUES ({$ratingNo},{$resortID},'{$g_username}',NOW(),'{$fedback}')";
  $mydb->setQuery($sql);
  $mydb->executeQuery();

  redirect(WEB_ROOT . 'index.php?p=resorts&id=' . $resortID);
}
?>


<?php
$acomtype = isset($_GET['view']) ? $_GET['view'] : '';
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
    $msg = 'Available  for ' . $hr . ' hr(s) and ' .  $min . ' min(s)';
  } else {
    $msg = 'Available for ' . $days . 'day(s) and ' . $hr . ' hr(s) and ' .  $min . ' min(s)';
  }



  $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID`  AND  `NUMPERSON` >= '" . $_POST['person'] . "' AND ResortID='{$resortID}'";
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
      $msg = 'Available  for ' . $hr . ' hr(s) and ' .  $min . ' min(s)';
      
    } else {

      $msg = 'Available for ' . $days . 'day(s) and ' . $hr . ' hr(s) and ' .  $min . ' min(s)';
    }
  } else {
    $msg = 'Available  today';
  }

  if (isset($_SESSION['person'])) {
   
    $pax =  $_SESSION['person'];
    $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID`  AND  `NUMPERSON` >=$pax AND ResortID='{$resortID}'";
  } else {

    $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID` AND ResortID='{$resortID}'";
  }
}
?>





<div class="container" style="text-align:left">
  <?php echo isset($about->DESCRIPTION) ? $about->DESCRIPTION : ''; ?>
</div>

<div class="container page-header" style=" font-weight: bold">Availability Rooms and Cottages</div>
<section class="services" style="margin-top:0px">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <?php
        $status = "";



        $mydb->setQuery($query);
        $cur = $mydb->loadResultList();
        foreach ($cur as $result) {
          $resortName = $result->UNAME;

          $roomNo = $result->ROOMNUM;

          // filtering the rooms
          // ======================================================================================================
          $mydb->setQuery("SELECT * FROM `tblreservation` WHERE (STATUS<>'Pending' AND STATUS<>'Checkedout') AND ((
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
          $maxrow = $mydb->num_rows($mydb->executeQuery());

          $resNum =  $roomNo - $maxrow;
          if ($maxrow > 0) {
            $rs  = $mydb->loadSingleResult();
            $status = $rs->STATUS;
          }


          if ($resNum > 0 || $status == 'Checkedout' || $status == null || $result->type == 'Public') {
            $btn =  '<div class="form-group">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12">
                            <button style="width:150px"  type="submit" class="btn" id="booknow" name="booknow" onclick=""><span style="font-size:20px">BOOK NOW!</span></button>                 
                           </div>
                        </div>
                      </div>';
          } else {
            if ($status == 'Confirmed') {

              $btn =  '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Reserved!</strong></div>';
              $img_title = '<figcaption class="img-title-active">
                                    <h5>Reserve!</h5>    
                                </figcaption>';
            } elseif ($status == 'Checkedin') {
              $btn =  '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Booked!</strong></div>';
              $img_title = '<figcaption class="img-title-active">
                                    <h5>Booked!</h5>    
                                </figcaption>';
            }
          }

        ?>
          <form method="POST" action="booking/addtocart.php" style="display: <?php echo ($result->ShowRoom == 1) ? ' block;' : ' none;' ?>">

            <input type="hidden" name="ResortID" value="<?php echo $resortID; ?>">
            <input type="hidden" name="ROOMID" value="<?php echo $result->ROOMID; ?>">

            <div class="panel panel-primary">
              <div class="panel-body" style="padding: 0px;">
                <a style="cursor: pointer;" onclick="showModal(<?php echo $result->ROOMID ?>)">
                  <div class="col-md-4 strecth" style="padding: 0px;margin:0px">
                    <img src="<?php echo WEB_ROOT . 'admin/mod_room/' . $result->ROOMIMAGE; ?>">
                  </div>
                </a>
                <div class="col-md-6">
                  <h3><?php echo $result->ROOM; ?></h3>
                  <h5><?php echo $result->type == "None" ? "" : $result->type; ?></h5>
                  <?php echo $result->ROOMDESC; ?>
                  <h5><i class="fa fa-users"></i> Pax <?php echo $result->NUMPERSON; ?></h5>
                </div>
                <div class="col-md-2">
                  <p>Great Offer</p>
                  <div style="padding-bottom: 10px;">
                    <?php
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
                    ?>
                  </div>
                  <?php echo $btn; ?>
                </div>
              </div>
            </div>


          </form>

          <style>
            * {
              box-sizing: border-box
            }

            .room-modal {
              display: none;
              position: fixed;
              z-index: 9999999;
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              overflow: hidden;
              background-color: rgb(0, 0, 0);
              background-color: rgba(0, 0, 0, 0.4);
            }

           
            .room-modal .modal-content {
              position: absolute;
              left: 50%;
              top: 40%;
              transform: translate(-50%, -50%);
              background-color: #fefefe;
              margin: 5% auto;
              padding: 20px;
              border: 1px solid #888;
              width: 700px;
              height: 600px;
            
            }

            
            .close {
              color: #aaa;
              float: right;
              font-size: 28px;
              font-weight: bold;
              margin-left: 10px;
              z-index: 999;
            }

            .close:hover,
            .close:focus {
              color: black;
              text-decoration: none;
              cursor: pointer;
            }

            .slideshow-container {
              position: relative;
              margin-top: 25px;
              width: 100%;
              height: 95%;
            }

            .slide {
              position: absolute;
              width: 100%;
              height: 100%;
              display: none;
            }

            .slide:first-child {
              display: block;
            }

            .prev,
            .next {
              position: absolute;
              top: 50%;
              transform: translateY(-50%);
              width: auto;
              margin-top: -22px;
              padding: 16px;
              color: white;
              font-weight: bold;
              font-size: 24px;
              transition: 0.6s ease;
              border-radius: 0 3px 3px 0;
              cursor: pointer;
            }

            .next {
              right: 0;
              border-radius: 3px 0 0 3px;
            }
          </style>

          <div id="room-modal<?php echo $result->ROOMID ?>" class="room-modal modal">
            <div class="modal-content">
              <span class="close" id="close<?php echo $result->ROOMID ?>" style="position: relative">&times;</span>
              <div class="slideshow-container">
                  
                  <div class="slide">
                    <img src="./admin/mod_room/<?php echo $result->ROOMIMAGE ?>" alt="Image" height="100%" width="100%" style="object-fit: cover;">
                  </div>

                <?php
                  $roomid = $result->ROOMID;

                  $sql = "SELECT * FROM tblgallery WHERE RoomID = $result->ROOMID";
                  $mydb->setQuery($sql);
                  $cur = $mydb->loadResultList();

                  foreach ($cur as $result) {
                ?>
                    <div class="slide">
                      <img src="./admin/mod_room/<?php echo $result->RoomImages ?>" alt="Image" height="100%" width="100%" style="object-fit: cover;">
                    </div>
                <?php
                  }
                ?>
                
                <a class="prev" onclick="prevSlide('room-modal<?php echo $roomid ?>')">&#10094;</a>
                <a class="next" onclick="nextSlide('room-modal<?php echo $roomid ?>')">&#10095;</a>
                
              </div>

            </div>
          </div>

      
    <?php } ?>
    </div>
  </div>
  </div>
  <div class="container">
    <div class="row">

      <div class="container page-header" style=" font-weight: bold">Amenities</div>
      <?php
      $sql = "SELECT `amen_id`, `amen_name`, `amen_desp`, `amen_image`, `amen_type`, `pax`, `Price`, `Free`, `ResortID` FROM `tblamenities` WHERE `ResortID`='{$resortID}'";
      $mydb->setQuery($sql);
      $amen = $mydb->loadResultList();
      foreach ($amen as $result) {
      ?>
        <!--<a href="index.php?p=amen&key=<?php echo $result->amen_id; ?>">-->
        <div class="col-md-2">
          <div class="panel panel-primary  ">
            <div class="panel-body stretch" style="padding:0px">
              <img style="height:100px" src="<?php echo WEB_ROOT . 'admin/mod_amenities/' . $result->amen_image; ?>">
            </div>
            <div class="panel-footer">
              <?php echo $result->amen_name; ?>
              <br>
              <?php echo $result->amen_desp; ?>
              <br>
            </div>
          </div>
        </div>
       
      <?php
      }
      ?>

    </div>
    <div class="line-row row" style="margin-bottom: 25px;"></div>
    <div class="row">
      <?php echo isset($contact->DESCRIPTION) ? $contact->DESCRIPTION : ''; ?>
    </div>
    <div class="line-row row"></div>

    <div class="row">
      <h3>Location</h3>
      <?php echo isset($map->DESCRIPTION) ? $map->DESCRIPTION : ''; ?>
    </div>

    <div class="line-row row"></div>
    <div class="row">
      <h3>FAQ</h3>
      <?php echo isset($faq->DESCRIPTION) ? $faq->DESCRIPTION : ''; ?>
    </div>


    <div class="line-row row"></div>
    <div class="row">
      <h3>Feedback</h3>
      <div class="col-md-6">
        <div class="col-lg-12">
          <div class="info-blocks-in">
            <?php
            $sql = "SELECT count(*) as comment, SUM(RatingNo) as Ratings FROM `tblrating` WHERE `StoreID`=" . $resortID . " GROUP BY StoreID;";
            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();
            $maxrow = $mydb->num_rows($cur);
            if ($maxrow > 0) {
              
              $rating = $mydb->loadSingleResult();
              if ($rating->Ratings >= 100) {
               
                $ratings = (100 * 5) / 100;
              } else {
                $ratings = ($rating->Ratings / 100) * 5;
              }


              echo 'Ratings:&nbsp;&nbsp;';
              for ($i = 0; $i < $ratings; $i++) {
               
                echo  '<i style = "font-size:20px" class="fa fa-star gold"></i>';
              }
              echo  '<div class="comment">FeedBack:&nbsp;&nbsp;<i class="fa fa-comment-o"></i>
                                   <span>' . $rating->comment . '</span></div>';
            } else {
              echo 'Ratings:&nbsp;&nbsp;';
              $ratings = 5;
              for ($i = 0; $i < $ratings; $i++) {
                echo  '<i style = "font-size:20px" class="fa fa-star"></i>';
              }
              echo  '<div class="comment">FeedBack:&nbsp;&nbsp;<i class="fa fa-comment-o"></i>
                                   <span  >0</span></div>';
            }

            ?>
          </div>
          <hr />
          <div>

            <?php
            $sql = "SELECT * FROM `tblrating` r,tblguest g WHERE r.Customer_Username=g.G_UNAME AND `StoreID`=" . $resortID;
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
            ?>
              <div class="col-md-12">
                <div class="direct-chat-msg  '.$position.'">
                  <div class="direct-chat-success clearfix">
                    <span class="direct-chat-name pull-left"><?php echo $result->G_UNAME ?></span>
                    <span class="direct-chat-timestamp pull-right"><?php for ($i = 0; $i < $result->RatingNo; $i++) { ?>
                        <i class="glyphicon glyphicon-star gold"></i>
                      <?php } ?></span>
                  </div>
                  <img class="direct-chat-img" src="https://www.shareicon.net/data/128x128/2016/06/10/586098_guest_512x512.png" alt="Message User Image">
                  <div class="direct-chat-text">
                    <?php echo $result->FeedBack ?>
                  </div>
                </div>
              </div>
            <?php  }  ?>

          </div>
          <div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <form action="index.php?p=resorts&id=<?php echo $resortID; ?>" method="POST">

              <h1>Leave Feedback</h1>
              <label class="">Feed Back</label>
              <div><textarea name="fedback" class="form-control" rows="9"></textarea></div>
              <br />
              <div class="rating">
                <input type="radio" id="star5" name="ratingNo" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                <input type="radio" id="star4" name="ratingNo" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                <input type="radio" id="star3" name="ratingNo" value="3" /><label for="star3" title="Not Bad">3 stars</label>
                <input type="radio" id="star2" name="ratingNo" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                <input type="radio" id="star1" name="ratingNo" value="1" /><label for="star1" title="Mahal Masyado">1 star</label>
              </div>
              <div style="clear: all;"></div>
              <?php if (isset($_SESSION['GUESTID'])) { ?>

                <input type="hidden" name="resortID" value="<?php echo $resortID; ?>" />
                <div class="col-lg-12 row"> <button type="submit" name="submitRating" class="btn">Submit</button></div>
              <?php } else {
                echo '<div class="col-lg-12 row" ><a href="index.php?p=login&q=guest&id=' . encrypt($resortID) . '"  class="btn" id="storeID_rating">Login Guest</a></div>';
              } ?>
            </form>

          </div>
        </div>
      </div>
    </div>

    <br />
    <br />
    <br />
    <br />
  </div>
</section>

<script>
  function showModal(id) {
    var modal = document.getElementById("room-modal" + id);
    var span = document.getElementById("close" + id);

    modal.style.display = "block";


    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

  }

  let slideIndex = 1;

  function plusSlide(n, modalid) {
    showSlides(slideIndex += n, modalid);
  }

  function showSlides(n, modalid) {
    let i;
    const slides = document.getElementById(modalid).getElementsByClassName("slide");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
  }

  function prevSlide(modalid) {
    plusSlide(-1, modalid);
    console.log(slideIndex)
  }

  function nextSlide(modalid) {
    plusSlide(1, modalid);
    console.log(slideIndex)
  }
</script>