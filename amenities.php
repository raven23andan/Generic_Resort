<?php $id = isset($_GET['key']) ? $_GET['key'] : ''; ?>
<style>
    .stretch img {
        width:100%;
        height:370px;
    }
</style>
<div class="tabs-content" id="recommended-hotel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Offered Amenities</h2>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="col-md-4">
                            <ul class="tabs clearfix" data-tabgroup="third-tab-group">
                                <?php
                                $i=0;
                                 $sql = "SELECT `amen_id`, `amen_name`, `amen_desp`, `amen_image`, `Price`, `Free` FROM `tblamenities` WHERE amen_id='{$id}'";
                                 $mydb->setQuery($sql);
                                 $cur = $mydb->loadResultList();
                                 foreach ($cur as $result) {
                                     // code...
                                    $i += 1; 

                                    if ($i==1) {
                                     echo '<li ><a href="#'.$result->amen_id.'" class="active" >'.$result->amen_name.' <i class="fa fa-angle-right"></i></a></li>';
                                    }else{

                                        echo '<li><a href="#'.$result->amen_id.'"  >'.$result->amen_name.' <i class="fa fa-angle-right"></i></a></li>';
                                    }
                                 }
 
                                ?> 
                            </ul>
                        </div> 
                    <div class="col-md-8">
                        <section id="third-tab-group" class="recommendedgroup">

                                <?php
                                $i=0;
                                 $sql = "SELECT `amen_id`, `amen_name`, `amen_desp`, `amen_image`, `Price`, `Free` FROM `tblamenities`";
                                 $mydb->setQuery($sql);
                                 $cur = $mydb->loadResultList();
                                 foreach ($cur as $result) {
                                     // code...
                                    $i += 1; 
                                      ?>
                                      <div class="stretch" id="<?php echo $result->amen_id;?>" ><a href="index.php?p=amen&id=<?php echo $result->amen_id; ?>">
                                             <img src="<?php echo 'admin/mod_amenities/'. $result->amen_image;?>" alt="">
                                             </a>
                                             <div class="row">
                                                 <div class="col-md-12">
                                                     <div style="color:black;list-style-type: circle;" >
                                                         <h4><?php echo  $result->amen_name ;?></h4> 
                                                          <!--<div ><?php echo  $result->amen_desp ;?></div>-->
                                                     </div>
                                                 </div>
                                             </div>
                                         </div> 
                                 <?php 
                                     
                                 }


                                ?> 
                          
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

