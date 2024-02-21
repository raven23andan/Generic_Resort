<?php   
if(isset($_GET['rid'])){
    removetocart($_GET['rid']);
}


if (isset($_POST['clear'])){
 unset($_SESSION['pay']);
 unset($_SESSION['m_cart']);
 unset($_SESSION['arrival']);
 unset($_SESSION['departure']);
 unsetSessions();
 message("The cart is empty.","success");
 redirect(WEB_ROOT."booking/");

}
   


?>

<?php
  $resortID = isset($_GET['id']) ? $_GET['id'] : '';
  $sql = "SELECT * FROM `tbluseraccount` WHERE `USERID`='{$resortID}'";
  $mydb->setQuery($sql);
  $single_resort = $mydb->loadSingleResult();
?>
<?php    include("../banner-home.php");?> 
    <div class="container">
        <div class="row">
            <div id="accom-title"  > 
                <div  class="pagetitle">   
                    <h1  >Your Booking Cart 

                    </h1> 
                </div> 
            </div> 

            <table class="table " style="font-size: 13px;">

               <thead>
                  <tr  bgcolor="#1F3646" style="color:#fff"> 
                      <th align="center">Accomodation</th>
                      <th align="center">Check In</th>
                      <th align="center">Check Out</th> 
                      <th  >Rates</th> 
                      <th>Discount</th>
                      <th align="center" width="120">Time to be Consume</th>
                      <th align="center" width="90">Amount</th>
                      <th align="center" width="90">Action</th> 
                  </tr> 
              </thead>
              <tbody>

                <?php 

                $payable = 0;
               $total_amount =0;
                if (isset( $_SESSION['m_cart'])){


                   $count_cart = count($_SESSION['m_cart']);

                   for ($i=0; $i < $count_cart  ; $i++) {  

                    $query = "SELECT * FROM `tblroom`  WHERE ROOMID=" . $_SESSION['m_cart'][$i]['mroomid'];
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList(); 
                    foreach ($cur as $result) { 

                       echo '<tr>';  
                       echo '<td>'. $result->ROOM.' '. $result->ROOMDESC.'  ('. $result->NUMPERSON.' PAX) <br/><b> Location: '.$result->AccomodationType.'</b></td>';
                        if ($result->AccomodationType=='Private Pool' || $result->AccomodationType=='Public Pool' || $result->AccomodationType=='Function Hall'){
                           echo '<td>'.date_format(date_create( $_SESSION['m_cart'][$i]['mcheckin']),"m/d/Y").'</td>';
                           echo '<td>'.date_format(date_create( $_SESSION['m_cart'][$i]['mcheckout']),"m/d/Y").'</td>';
                        }else{
                           echo '<td>'.date_format(date_create( $_SESSION['m_cart'][$i]['mcheckin']),"m/d/Y h:i a").'</td>';
                           echo '<td>'.date_format(date_create( $_SESSION['m_cart'][$i]['mcheckout']),"m/d/Y h:i a").'</td>';

                        }
                       echo '<td >';
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
                       echo  '</td>'; 
                       echo '<td>' . $result->Discount * 100 . '%</td>';
                       echo '<td>'.$_SESSION['m_cart'][$i]['mday'].'</td>';
                       echo '<td > &#8369 '. $_SESSION['m_cart'][$i]['mroomprice'] - ($_SESSION['m_cart'][$i]['mroomprice'] * $result->Discount).'</td>';
                       echo '<td ><a href="index.php?view=processcart&rid='.$result->ROOMID.'">Remove</td>';


                       echo '</tr>';  

 


                            if ($result->AccomodationType=='Private Pool' || $result->AccomodationType=='Public Pool' || $result->AccomodationType=='Room' || $result->AccomodationType=='Kids and Pool Pavillon' ){
                   ?>

                    <tr>
                        <td colspan="3">
                            <p>Addons   <?php   
                               echo '<button class="toggle-modal-reserve"  data-id="'.$result->ROOMID.'" >Add New <i class="fa fa-plus"></i></button>';    
                            ?> </p>
               
                            <table class="table">
                                    <tr>
                                    <th></th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th >Qty</th>
                                    <th >Total</th>
                                    </tr>
                                <?php 
                                if (isset($_SESSION['addons_cart'])){

                                  $count_addons = count($_SESSION['addons_cart']);
 
                                 for ($a=0; $a < $count_addons  ; $a++) {  

                                    if ($_SESSION['addons_cart'][$a]['roomID']==$result->ROOMID) { 

                                    $sql1 = "SELECT `AddonsID`, `Addons`, `Price`, `AddonsType` FROM `tbladdons` WHERE `AddonsID`='".$_SESSION['addons_cart'][$a]['id']."'";
                                      $mydb->setQuery($sql1);
                                      $ba = $mydb->loadSingleResult(); 
                                ?>
                                <tr>
                                    <td style="white-space: nowrap;width: 1px"><a class="btn-danger" href="addtocart.php?action=deleteaddons&id=<?php echo $ba->AddonsID.'&ROOMID='.$result->ROOMID;?>"><i class="fa fa-trash-o"></i> Remove</a></td> 
                                    <td><?php echo   $ba->Addons; ?></td> 
                                    <td><?php echo ' &#8369 '.   $ba->Price; ?></td> 
                                    <td><?php echo    $_SESSION['addons_cart'][$a]['qty']; ?></td> 
                                    <td><?php echo ' &#8369 '.   $_SESSION['addons_cart'][$a]['total']; ?></td> 
                                </tr> 
                               <?php
                                    $total_amount += $_SESSION['addons_cart'][$a]['total'];
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

             }
                   
                   $payable += $_SESSION['m_cart'][$i]['mroomprice'] - ($_SESSION['m_cart'][$i]['mroomprice'] * $result->Discount) ;





               }


                $payable = $payable + $total_amount;

               $_SESSION['pay'] = $payable;

           } 
           ?>

       </tbody>
       <tfoot>
        <tr>
         <td colspan="5"><h4 align="right">Total:</h4></td>
         <td colspan="5">
           <h4><b> <?php  echo isset($_SESSION['pay']) ? ' &#8369 '. $_SESSION['pay'] :'Your booking cart is empty.';?></b></h4>

       </td>
   </tr>
</tfoot>  
</table> 


            <form method="post" action="" >
               <div class="col-xs-12 col-sm-12" align="right" style="margin-bottom:15px">
                   <?php
                   if (isset($_SESSION['m_cart'])){
                      ?>
                      <a  href="<?php echo WEB_ROOT; ?>index.php?p=resorts&id=<?php echo $_SESSION['resortID'];?>" class="btn" style="text-align:center;margin:0px;padding:20px"  name="clear">Add another accomodation</a>
                      <button type="submit" class="btn" name="clear">Clear Cart</button>
                      <?php

                      if (isset($_SESSION['GUESTID'])){
                        ?>
                        <a  style="text-align:center;margin:0px;padding:20px" href="<?php echo WEB_ROOT; ?>booking/index.php?p=resorts&id=<?php echo $resortID;?>&view=payment" class="btn" name="continue">Continue Booking</a>
                        <?php 
                    }else{ ?>
                       <a style="text-align:center;margin:0px;padding:20px"  href="<?php echo WEB_ROOT; ?>booking/index.php?p=resorts&id=<?php echo $resortID;?>&view=logininfo" class="btn"   name="continue">Continue Booking</a>
                       <?php
                   }
               }else{


               }

               ?>


            </div>

            </form>

        </div>
    </div> 

