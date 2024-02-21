<?php
require_once("includes/initialize.php");


$sql = "SELECT *  FROM `tblguest` WHERE  `GUESTID`='".$_POST['token']."'";
$mydb->setQuery($sql);

$maxRow = $mydb->num_rows($mydb->executeQuery()); 
if ($maxRow > 0) {
    // code... 
$sql = "UPDATE `tblguest` SET `G_PASS`='".sha1($_POST['new_password'])."' WHERE  `GUESTID`='".$_POST['token']."'";
$mydb->setQuery($sql);
$res = $mydb->executeQuery();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
 </head>
 <body  > 
</div> 
 </body>
        <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> 
        <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
 </html>

 

<script type="text/javascript"> 
 window.addEventListener('load', function() { 
     swal({
            title: 'Well done!',
            text: 'You successfully change your password.',
            type: 'success', 
            confirmButtonText: 'Click here to Login!', 
            button: { 
              value: true,
              visible: true,
              className: "btn btn-primary" 
            }
         },
         function(isConfirm){ 
           if (isConfirm){
                 window.location = "index.php?p=login&q=guest";
            }  
      });
 
})


</script>
<?php 
}else{ 
    $sql = "UPDATE `tbluseraccount` SET `UPASS`='".sha1($_POST['new_password'])."' WHERE  `USERID`='".$_POST['token']."'";
$mydb->setQuery($sql); 
$res = $mydb->executeQuery();


    ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
 </head>
 <body  > 
</div> 
 </body>
        <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> 
        <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
 </html>

 

<script type="text/javascript"> 
 window.addEventListener('load', function() { 
     swal({
            title: 'Well done!',
            text: 'You successfully change your password.',
            type: 'success', 
            confirmButtonText: 'Click here to Login!', 
            button: { 
              value: true,
              visible: true,
              className: "btn btn-primary" 
            }
         },
         function(isConfirm){ 
           if (isConfirm){
                 window.location = "index.php?p=login&q=resort";
            }  
      });
 
})


</script>
<?php } ?>