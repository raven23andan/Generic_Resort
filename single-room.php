<?php 
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
                  $arrival =  $_SESSION['arrival'];
                  $departure =  $_SESSION['departure'] ;
                  $status ="";
 
    $sql = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID` AND  `ROOMID`='{$id}'" ;
    $mydb->setQuery($sql);
    $res = $mydb->loadSingleResult();


        $resortName = $res->UNAME;

        $roomNo = $res->OROOMNUM;
        $accomodationType =  $res->AccomodationType;

 switch ($accomodationType) { 
  case 'Room' :
    $type = "Room";
    include 'availability_search.php';  
    break;
    
  case 'Function Hall' : 
    $type = "Function Hall";
    include 'availability_tour.php';  
    break;
    
  case 'Private Pool' :  
    $type = "Private Pool";
    include 'availability_tour.php';  
    break;
    
  case 'Public Pool' : 
    $type = "Public Pool";
    include 'availability_pool.php';   
    break;
    
  case 'Kids and Pool Pavillon' :
    $type = "Kids and Pool Pavillon";
    include 'availability_pool.php';   
    break; 
}

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
        ) AND ROOMID =".$res->ROOMID);

    

              $curs = $mydb->executeQuery(); 
              $maxrow = $mydb->num_rows($curs); 

              $resNum =  $roomNo - $maxrow;  
              if ($maxrow>0) { 
                $rs  = $mydb->loadSingleResult();
                 $status= $rs->RPRICE;
              }


            if($resNum<=0){ 
             if($status=='Confirmed'){
                            $btn =  '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Fully Reserve!</strong></div>';
                             $img_title = ' 

                                       <figcaption class="img-title-active">
                                            <h5>Reserve!</h5>    
                                        </figcaption>


                                ';
                          }elseif($status=='Checkedin'){
                            $btn =  '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Fully Book!</strong></div>';
                             $img_title = ' 

                                       <figcaption class="img-title-active">
                                            <h5>Book!</h5>    
                                        </figcaption>


                                ';
                          }else{
                             $btn =  '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Fully Book!</strong></div>';
                                $img_title = ' 

                                       <figcaption class="img-title">
                                            <h5>'.$res->ROOM . ' <br/> '.$res->ROOMDESC.'  <br/> 
                                            Number of Person:' . $res->NUMPERSON .' <br/> 
                                            Price:'.$res->PRICE.'</h5>    
                                        </figcaption> 
                                ';
                                $resNum=0;
                               
                          }  
              }else{
                $btn =  '
                 <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12"> 
                            <button type="submit" class="btn" id="booknow" name="booknow" onclick=""><span style="font-size:20px">BOOK NOW!</span></button> 
                                                   
                           </div>
                        </div>
                      </div>';
                   
                   

              }      

?>



 <form method="POST" action="booking/addtocart.php">
<section class="services" style="margin-top:0px">
   <style type="text/css"> 
        .stretch img {
            width: 100%;
            height: 370px;
        }
   </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="padding:5px;margin: 0px;">
                <div id="suitroom">
                        <div class="row">
                            <div class="col-md-12">

                                <div id="owl-suiteroom" class="owl-carousel owl-theme" style="padding-bottom:0px;margin-bottom: 0px"> 
                                    <?php 
                                    $sql = "SELECT `GalleryID`, `RoomID`, `RoomImages` FROM `tblgallery` WHERE RoomID='{$id}'";
                                    $mydb->setQuery($sql);
                                    $maxrow = $mydb->num_rows($mydb->executeQuery());
                                    if($maxrow > 0){
                                    $cur = $mydb->loadResultList();
                                    foreach($cur as $image){
                                    ?>
                                    <div class="item">
                                        <div class="suiteroom-item stretch">
                                            <img src="<?php echo WEB_ROOT;?>admin/mod_room/<?php echo $image->RoomImages;?>" alt=""> 
                                        </div>
                                    </div>

                                    <?php
                                    }
                                 }else{
                                    ?>
                                     <div class="item">
                                        <div class="suiteroom-item stretch">
                                            <img src="<?php echo WEB_ROOT;?>admin/mod_room/<?php echo $res->ROOMIMAGE;?>" alt=""> 
                                        </div>
                                    </div>
                                  <?php
                                    } 
                                    ?>
                                </div> 
                             <!--  <h2><?php echo $res->ROOM ;?></h2>
                                 <p><?php echo $res->ROOM ;?></p>  -->
                            </div>
                        </div>
                    </div> 
            </div>
            <div class="col-md-6" style="padding:5px;margin: 0px;"  >
                 <!-- <input type="hidden" name="ROOMPRICE" value="<?php echo $res->PRICE ;?>"> -->
                 <input type="hidden" name="AccomodationType" value="<?php echo  $type ;?>">
                  <input type="hidden" name="ROOMID" value="<?php echo $res->ROOMID ;?>">
                <h2 class="page-header"><?php echo $resortName ;?></h2>
                <h2 class="page-header"><?php echo $res->ROOM ;?></h2>
                <h4><?php echo $res->NUMPERSON ;?> Pax</h4> 
                <div style="border: 1px solid #ddd;padding: 10px;margin-bottom: 5px"><?php echo $res->ROOMDESC ;?>                
                </div>
                <div style="border: 1px solid #ddd;padding: 10px;margin-bottom: 5px">
                <p style="font-weight: bold;">Rates</p> 
                  <?php
                             $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing`  WHERE `RoomID`=".$res->ROOMID;
                              $mydb->setQuery($sql);
                              $pricing = $mydb->loadResultList();
                              foreach($pricing as $pr){
                                   if($pr->WeekRates=='NotApplicable'){
                                            echo  $pr->Description.'  &#8369 '. $pr->Prices.'<br/>';

                                    }else{
         
                                            echo $pr->Description.' [ '. $pr->WeekRates. ' ]:  &#8369 '. $pr->Prices.'<br/>';  
                                      
                                    }
                              } 
                            ?>                
                </div>
                 <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12">
                           <?php echo $btn ; ?>
                                                   
                           </div>
                        </div>
                      </div>
            </div>
            
        </div>

    </div>
</section>
</form>