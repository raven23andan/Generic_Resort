<?php include 'availability_search.php'; ?>
 <style type="text/css">
 .col-xs-12 button {
     width: 90%;
 }

</style>
 <section class="services" style="margin-top:0px">
        <div class="container">
            <div class="row">
                 <!--   <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Room and Rates</h2>
                        <p class="col-md-12" style=" background-color: #FCDE64; text-align: center;padding:5px;color:#000;font-weight:bolder; border-radius: 5px"><?php echo $msg;?></p>
                    </div>
                </div> -->
                <div class="col-md-12"> 

  <?php 
                  $status ="";
                  $arrival =  $_SESSION['arrival']. ' ' . $_SESSION['start_time'];
                  $departure =  $_SESSION['departure']. ' ' . $_SESSION['end_time'];

 
                   $mydb->setQuery($query);
                   $cur = $mydb->loadResultList(); 
      foreach ($cur as $result) { 

        $roomNo = $result->OROOMNUM;

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
        )
        AND ROOMID =".$result->ROOMID);

    

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
                                            <h5>'.$result->ROOM . ' <br/> '.$result->ROOMDESC.'  <br/> 
                                            Number of Person:' . $result->NUMPERSON .' <br/> 
                                            Price:'.$result->PRICE.'</h5>    
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
                 <input type="hidden" name="ROOMPRICE" value="<?php echo $result->PRICE ;?>">
                  <input type="hidden" name="ROOMID" value="<?php echo $result->ROOMID ;?>">  

                    <div class="col-md-4" style="margin:0px;padding: 5px;">
                        <div class="service-item  " style="margin-bottom: 5px;border-radius: 10px;min-height: 550px;">
                            <div class="service-image"><a  href="index.php?p=single-room&id=<?php echo $result->ROOMID ;?>"><img  src="<?php echo WEB_ROOT .'admin/mod_room/'.$result->ROOMIMAGE; ?>"></a></div>
                            <h4><a href="index.php?p=single-room&id=<?php echo $result->ROOMID ;?>"><?php echo $result->ROOM ;?> </a></h4>  
                            <p ><?php echo $result->AccomodationType ;?> </p>
                            <p style="min-height: 100px;"> 
                            <?php
                             $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing`  WHERE `RoomID`=".$result->ROOMID;
                              $mydb->setQuery($sql);
                              $pricing = $mydb->loadResultList();
                              foreach($pricing as $pr){
                                    if($pr->WeekRates=='NotApplicable'){
                                          echo  $pr->Description.'  &#8369 '. $pr->Prices.' <br/>';

                                    }else{
         
                                            echo $pr->Description.' [ '. $pr->WeekRates. ' ]:  &#8369 '. $pr->Prices.' <br/>';  
                                      
                                    }
                              } 
                            ?>     
                            </p>
                        <div class="row" style="margin-top:20px">
                          <?php echo $btn ; ?>
                        </div>
                        </div>
                    </div> 
              </form>
      <?php } ?>            
            </div>
        <!--     <div class="col-md-3" >
                <?php //include 'availability_time.php'; ?>
            </div> -->
        </div>
        </div>
    </section>

 