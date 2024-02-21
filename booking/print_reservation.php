<!DOCTYPE html>
<?php require_once("../includes/initialize.php"); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>style.css">  
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/responsive.css">    

<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/bootstrap.css">  

<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/css/font-awesome.min.css"> 



<!-- <link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet"> -->
 
 <link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 <link href="<?php echo WEB_ROOT; ?>css/datepicker.css" rel="stylesheet" media="screen">

 <link href="<?php echo WEB_ROOT; ?>css/galery.css" rel="stylesheet" media="screen">
</head>
<body onload="window.print();">


<?php

if (!isset($_SESSION['m_cart'])) {

  redirect(WEB_ROOT.'index.php');
}


if (isset($_POST['profileCheck'])) {

    unset($_SESSION['pay']);
   unset($_SESSION['m_cart']);
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

    <form action="index.php?view=payment" method="post"  name="" >
         
            
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Sir/Madam <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <!-- <?php echo $email;?><br/><br/> -->
           


          </p>

        <table class="table table-hover" style="font-size:11px">
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




             $arival   = $_SESSION['from']; 
              $departure = $_SESSION['to']; 
              $days = dateDiff($arival,$departure);
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

    
<?php echo $_SESSION['confirmation']?>:

 
</form>
</body>
</html>