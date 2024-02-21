<?php
$acomtype= isset($_GET['view']) ? $_GET['view']: '';
if(isset($_POST['booknowA'])){  


$_SESSION['arrival'] = date_format(date_create( $_POST['arrival']),"Y-m-d");
$_SESSION['departure'] =date_format(date_create($_POST['departure']),"Y-m-d");
$_SESSION['start_time'] =date_format(date_create($_POST['start_time']),"H:i");
$_SESSION['end_time'] =date_format(date_create($_POST['end_time']),"H:i");
$_SESSION['person'] =$_POST['person'];


 $days = dateDiff($_POST['arrival'],$_POST['departure']); 

$arrival =  $_SESSION['arrival']. ' ' . $_SESSION['start_time'];
$departure =  $_SESSION['departure']. ' ' . $_SESSION['end_time'];
$hr = date_time_diff($arrival,$departure,'h');
$min = date_time_diff($arrival,$departure,'i');


if($days <= 0){
  $msg = 'Available '.$type.' for ' .$hr . ' hr(s) and ' .  $min . ' min(s)';  

}else{
$msg = 'Available '.$type.'for ' .$days .'day(s) and ' . $hr . ' hr(s) and ' .  $min . ' min(s)' ;
} 


 
    $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID` AND AccomodationType='{$type}' AND  `NUMPERSON` >= '" . $_POST['person']."'";
    
 
}else{ 
     if(!isset($_SESSION['arrival'])){
    $_SESSION['arrival'] = Date('Y-m-d');
    }
    if(!isset($_SESSION['departure'])) { 
    
    $_SESSION['departure'] =  Date('Y-m-d');
    }

    if(!isset($_SESSION['start_time'])){
    $_SESSION['start_time'] = Date('H:i');
    }
    if(!isset($_SESSION['end_time'])){
    $_SESSION['end_time'] = Date('H:i',strtotime('+1 hrs'));
    }

    $arrival =  $_SESSION['arrival']. ' ' . $_SESSION['start_time'];
    $departure =  $_SESSION['departure']. ' ' . $_SESSION['end_time'];
    $hr = date_time_diff($arrival,$departure,'h');
    $min = date_time_diff($arrival,$departure,'i');

    if (isset($_SESSION['arrival'])) {
        
        $days = dateDiff($_SESSION['arrival'],$_SESSION['departure']); 

         if ($days<=0) {
          $msg = 'Available '.$type.' for ' .$hr . ' hr(s) and ' .  $min . ' min(s)';  
             
         }else{

          $msg = 'Available '.$type.'for ' .$days .'day(s) and ' . $hr . ' hr(s) and ' .  $min . ' min(s)' ;
         }
         
    }else{
         $msg = 'Available '.$type.' today';
    }

    if (isset($_SESSION['person'])) {
        
        $pax =  $_SESSION['person'];
         $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID` AND  AccomodationType='{$type}' AND  `NUMPERSON` >=$pax";
    }else{

    $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID` AND  AccomodationType='{$type}' ";
    }


}
?> 
         <div class="container" >
            <div class="row">
                <div class="col-md-12"> 
                    <div class="panel " style="margin-top: -70px;">
                        <div class="panel-heading" style="background-color:#FCDE64;font-weight:bolder;font-size: 20px; ">
                           Availability 
                        </div>
                        <div class="panel-body" >
<div class="submit-form  " style="padding:15px;margin-bottom: 5px;margin-top: -30px;"> 
            <form id="form-submit" action="index.php?p=accomodation&view=<?php echo $acomtype;?>" method="POST" autocomplete="off">
                <div class="row"> 
                    <div class="col-md-2">
                        <fieldset>
                            <label for="arrival">Check-in date:</label>
                            <input name="arrival" type="text" class="form-control date" id="arrival" placeholder="Select date..." required onchange='this.form.()' value="<?php echo isset($_SESSION['arrival']) ? date_format(date_create( $_SESSION['arrival']),"m/d/Y")   : '';?>">
                        </fieldset>
                    </div>
                    <div class="col-md-1" style="margin:0;padding: 0;">
                        <fieldset>
                            <label for="start_time">Time:</label>
                            <input   type="text"  id="start_time" class="form-control" name="start_time" autocomplete="off"   value="<?php echo isset($_SESSION['start_time']) ? date_format(date_create($_SESSION['start_time']),"h:i a") : date_format(date_create(date("Y-m-d") . ' ' . date("h:i a")), "h:i a") ?>" />
                        </fieldset>
                    </div>
                    <div class="col-md-2">
                        <fieldset>
                            <label for="departure">Check-out date:</label>
                            <input name="departure" type="text" class="form-control date" id="departure" placeholder="Select date..." required onchange='this.form.()' value="<?php echo isset($_SESSION['departure']) ? date_format(date_create($_SESSION['departure']),"m/d/Y") : '';?>">
                        </fieldset>
                    </div>
                    <div class="col-md-1" style="margin:0;padding: 0;">
                        <fieldset>
                            <label for="end_time">Time:</label>
                            <input type="text" id="end_time" class="form-control" name="end_time" autocomplete="off"  value="<?php echo isset($_SESSION['end_time']) ? date_format(date_create($_SESSION['end_time']),"h:i a") : date_format(date_create(date("Y-m-d") . ' ' . date("h:i a"))->modify('+1 hour'), "h:i a") ?>"  />

                        </fieldset>
                    </div>
                    <div class="col-md-3"> 
                        <fieldset>
                                <label for="person"  >Person (PAX):</label>
                                <input type="number"  id="person" required name='person' onchange='this.form.()' class="form-control" value="<?php echo isset($_SESSION['person']) ?  $_SESSION['person']: '' ?>">
                                <!-- <select id="person" required name='person' onchange='this.form.()' class="form-control">
                                    <option value="">Select person</option>
                                                          <?php 

                                

                                  ?>
                                      
                            </select> -->
                           </fieldset> 
                    </div>
                    <div class="col-md-3" >
                        <fieldset>  
                            <label for="booknowA">&nbsp;</label>
                            <button type="submit" id="booknowA" name="booknowA" class="btn">Change Search</button>
                        </fieldset>
                    </div>
                </div>
            </form>
 
                            </div>
                        </div>
                        <div class="panel-footer" style=" background-color: #1F3646; text-align: center;padding:5px;color:#fff;font-weight:bolder; " >
                            <?php echo $msg;?> 
                        </div>
                    </div> 
        

 
                </div>
            </div>
        </div>