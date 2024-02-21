<?php    include("banner-home.php");?>
<?php 
    $id = isset($_GET['key']) ? $_GET['key'] : 0;
    $sql = "SELECT `amen_id`, `amen_name`, `amen_desp`, `amen_image`, `Price`, `Free` FROM `tblamenities` WHERE amen_id='{$id}'"; 
    $mydb->setQuery($sql); 
    $res = $mydb->loadSingleResult();
?> 

<section class="services" style="margin-top:0px">
   <style type="text/css"> 
        .stretch img {
            width: 100%; 
            height:400px;
        }
        .section-heading {
            padding:10px;
        }
   </style>
   
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2><?php echo $res->amen_name;?></h2>
                    </div> 
                        <div ><?php echo $res->amen_desp;?></div>
                </div>
            <div class="col-md-12" style="padding:5px;margin: 0px;margin-bottom:60px">
                <div id="">
                        <div class="row">
                            <div class="col-md-12">

                                <div id="owl-suiteroom" class="owl-carousel owl-theme" style="padding-bottom:0px;margin-bottom: 0px"> 
                                    <?php 
                                       $sql = "SELECT * FROM `tblgallery` WHERE `RoomID`='{$id}'";
                                    $mydb->setQuery($sql); 
                                    $maxrow = $mydb->num_rows($mydb->executeQuery());
                                    if($maxrow > 0){
                                    $cur = $mydb->loadResultList();
                                    foreach($cur as $image){
                                    ?>
                                    <div class="item">
                                        <div class="suiteroom-item stretch">
                                            <img src="<?php echo WEB_ROOT;?>admin/mod_amenities/<?php echo $image->RoomImages;?>" alt=""> 
                                        </div> 
                                    </div>

                                    <?php
                                    }
                                 }else{
                                    ?>
                                     <div class="item">
                                        <div class="suiteroom-item stretch">
                                            <img src="<?php echo WEB_ROOT;?>admin/mod_amenities/<?php echo $res->amen_image;?>" alt=""> 
                                        </div>
                                    </div>
                                  <?php
                                    } 
                                    ?>
                                </div>  
                            </div>
                        </div>
                    </div>  
          
            </div>
            
        </div>

    </div>
</section> 