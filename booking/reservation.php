<?php

if (!isset($_SESSION['m_cart'])) {
  
  redirect(WEB_ROOT.'index.php');
}



  $name = $_SESSION['name']; 
  $last = $_SESSION['last'];
  $city = $_SESSION['city'] ;
  $address = $_SESSION['address'];
  $zip =  $_SESSION['zip'] ;
  $phone = $_SESSION['phone'];
  $stat = $_SESSION['pending'];

?>

 <div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1  >Reservation Details
                 
            </h1> 
       </div> 
  </div>

<div class="container"> 

    <div class="col-xs-12 col-sm-11">
    
        <div class="">
           

          <td valign="top" class="body" style="padding-bottom:10px;">

           <form action="index.php?view=payment" method="post"  name="" >
            <span id="printout">
            
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Sir/Madam <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <!-- <?php echo $email;?><br/><br/> -->
          


          </p>

        <table class="table table-hover">
              <thead>
                <tr  bgcolor="#999999">
                  <th align="center" width="120">Room Type</th>
                  <th align="center" width="120">Check In</th>
                  <th align="center" width="120">Check Out</th>
                  <th align="center" width="120">Nights</th>
                  <th  width="120">Price</th>
                  <th align="center" width="120">Room</th>
                  <th align="center" width="90">Amount</th> 
                </tr> 
              </thead>
          <tbody>
          
            <?php




 
              $count_cart = count($_SESSION['m_cart']);

                for ($i=0; $i < $count_cart  ; $i++) {    
              $mydb->setQuery("SELECT * FROM `tblroom` r, `tblaccomodation` a WHERE  r.`ACCOMID`=a.`ACCOMID` AND `ROOMID` =". $_SESSION['m_cart'][$i]['mroomid']);
              $cur = $mydb->loadResultList();

              foreach ($cur as $result) {
                echo '<tr>'; 

                echo '<td>'. $result->ROOM.' '. $result->ACCOMODATION.'</td>';
                echo '<td>'.$_SESSION['m_cart'][$i]['mcheckin'].'</td>';
                echo '<td>'.$_SESSION['m_cart'][$i]['mcheckout'].'</td>';
                echo '<td>'.$_SESSION['m_cart'][$i]['mday'].'</td>';
                echo '<td> &#8369 '. $result->PRICE.'</td>';
                echo '<td >1</td>';
                echo '<td >'. $_SESSION['m_cart'][$i]['mroomprice'].'</td>'; 
                echo '</tr>';
              } 


          }
           $payable= $result->PRICE *$days;
           $_SESSION['pay']= $payable;
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="5"></td><td align="right"><h5><b>Order Total: </b></h5>
              <td align="left">
              <h5><b> <?php echo ' &#8369 ' . $payable= $days*$result->PRICE; ?></b></h5>
                           
              </td>
            </tr>
         

          </tfoot>  
        </table>

    <?php   

        ?>
<?php echo $_SESSION['confirmation']?>:

</span>
<div id="divButtons" name="divButtons">
<a href="print_reservation.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>

</div>
              </form>
 
        </div>

    </div>
   

  </div>

  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>