<?php 
$acomtype= isset($_GET['view']) ? $_GET['view']: '';

if(isset($_POST['booknowA'])){  


$_SESSION['arrival'] = date_format(date_create( $_POST['arrival']),"Y-m-d");
$_SESSION['departure'] =date_format(date_create($_POST['departure']),"Y-m-d"); 
$_SESSION['start_time'] ="00:00:00";
$_SESSION['end_time'] ="00:00:00";
$_SESSION['person'] =$_POST['person'];
$_SESSION['ratesType'] = 'Single';
 

 $days = dateDiff($_POST['arrival'],$_POST['departure']) + 1; 

$arrival =  $_SESSION['arrival']. ' ' . $_SESSION['start_time'];
$departure =  $_SESSION['departure']. ' ' . $_SESSION['end_time'];



 
    $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID` AND AccomodationType='{$type}' AND  `NUMPERSON` >= '" . $_POST['person']."'";
    
 
}else{ 
     if(!isset($_SESSION['arrival'])){
    $_SESSION['arrival'] = Date('Y-m-d');
    }
    if(!isset($_SESSION['departure'])) {  
    $_SESSION['departure'] =  Date('Y-m-d');
    }
    if(!isset($_SESSION['ratesType'])) {  
        $_SESSION['ratesType'] = '';
    }


    if(!isset($_SESSION['start_time'])){
        $_SESSION['start_time'] ="00:00:00";
    }
    if(!isset($_SESSION['end_time'])){
        $_SESSION['end_time'] ="00:00:00";
    }
 
$arrival =  $_SESSION['arrival']. ' ' . $_SESSION['start_time'];
$departure =  $_SESSION['departure']. ' ' . $_SESSION['end_time'];
 
    $days = dateDiff($_SESSION['arrival'],$_SESSION['departure']) + 1;  
        
 
          
    if (isset($_SESSION['person'])) {
        
        $pax =  $_SESSION['person'];
         $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID` AND  AccomodationType='{$type}' AND  `NUMPERSON` >=$pax";
    }else{

        $query = "SELECT * FROM `tblroom` r,`tbluseraccount` u WHERE ResortID=`USERID` AND  AccomodationType='{$type}' ";
    }


}

if($days==1){
        $msg = 'Available '.$type.' for ' .$days .'day';
       
}else{ 
        $msg = 'Available '.$type.' for ' .$days .'day(s)';
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
                    <div class="col-md-3">
                        <fieldset>
                            <label for="arrival">Check-in date:</label>
                            <input name="arrival" type="text" class="form-control date" id="arrival" placeholder="Select date..." required onchange='this.form.()' value="<?php echo isset($_SESSION['arrival']) ? date_format(date_create( $_SESSION['arrival']),"m/d/Y")   : date_format(date_create(date("Y-m-d")),"m/d/Y");?>">
                        </fieldset>
                    </div> 
                    <div class="col-md-3">
                        <fieldset>
                            <label for="departure">Check-out date:</label>
                            <input name="departure" type="text" class="form-control date" id="departure" placeholder="Select date..." required onchange='this.form.()' value="<?php echo isset($_SESSION['departure']) ? date_format(date_create($_SESSION['departure']),"m/d/Y") : date_format(date_create(date("Y-m-d"))->modify('+8 hour'), "m/d/Y H:i:s");;?>">
                        </fieldset>
                    </div> 
                    <!-- <div class="col-md-3">
                        <fieldset>
                            <label for="departure">Schedule Time:</label>
                        <select id="ratesType" required name='ratesType'   class="form-control">
                                    <option value="">Select Time</option> 
                                    <option <?php echo ($_SESSION['ratesType']=='Day') ? 'SELECTED' : '';?>  value="Day">Day Tour (9am-4pm)</option> 
                                    <option  <?php echo ($_SESSION['ratesType']=='Night') ? 'SELECTED' : '';?>  value="Night">Night Tour (3pm-10pm)</option>  
                            </select>  
                        </fieldset>
                    </div> -->
                    <div class="col-md-3"> 
                        <fieldset>
                                <label for="person"  >Person (PAX):</label>
                                <input type="number"  id="person" required name='person' onchange='this.form.()' class="form-control" value="<?php echo isset($_SESSION['person']) ?  $_SESSION['person']: '' ?>">
                         
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