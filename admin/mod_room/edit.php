<?php 
// $_SESSION['id']=$_GET['id'];
$rm = new Room();
$result = $rm->single_room($_GET['id']); 

$type = $result->AccomodationType;  

?>
<form class="form-horizontal well span6" action="controller.php?action=edit" enctype="multipart/form-data" method="POST">

	<fieldset>
		<legend>Modify</legend>
      
           
         <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" for=
            "ROOMNUM">Type:</label>

            <div class="col-md-8">
              <input name="ROOMID" type="hidden" value="<?php echo $result->ROOMID; ?>">
              <input class="form-control input-sm"  type="text" readonly id="Type" name="Type"  value="<?php echo $type; ?>">
   <!--             <select class="form-control input-sm" id="Type" name="Type" required >
                <option value="">Select</option>
                 <option <?php echo ($type=='Room') ? 'SELECTED': '';?>>Room</option>
                 <option <?php echo ($type=='Function Hall') ? 'SELECTED': '';?>>Function Hall</option>
                 <option <?php echo ($type=='Private Pool') ? 'SELECTED': '';?>>Private Pool</option>
                 <option <?php echo ($type=='Public Pool') ? 'SELECTED': '';?>>Public Pool</option>
                 <option <?php echo ($type=='Kids and Pool Pavillon') ? 'SELECTED': '';?>>Kids and Pool Pavillon</option>
               </select> -->
            </div>
          </div>
        </div>

        <?php 
        if ($type!='Private Pool' && $type!='Function Hall') { 
        ?>
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ROOM">Name:</label>

              <div class="col-md-8"> 
                 <input class="form-control input-sm" id="ROOM" name="ROOM" placeholder=
                    "Room Name" type="text" value="<?php echo $result->ROOM; ?>">
              </div>
            </div>
          </div>
        <?php } ?>
 
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ROOMDESC">Description:</label>

              <div class="col-md-8">
                <input name="" type="hidden" value=""> 
                     <textarea class="form-control input-sm compose-textarea4" id="compose-textarea4" name="ROOMDESC" placeholder=
                    "Description" ><?php echo $result->ROOMDESC; ?></textarea>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for="name">Type:</label>

              <div class="col-md-8" style="padding-top: 7px">
                <select name="type" required>
                  <option value="None" <?php echo $result->type == 'None' ? "selected" : ""; ?>>N/A</option>
                  <option value="Public" <?php echo $result->type == 'Public' ? "selected" : ""; ?>>Public</option>
                  <option value="Exclusive" <?php echo $result->type == 'Exclusive' ? "selected" : ""; ?>>Exclusive</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "NUMPERSON">Number of Person (Pax):</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="NUMPERSON" name="NUMPERSON" placeholder= "Maximum Pax" type="text" value="<?php echo $result->NUMPERSON; ?>" onkeyup="javascript:checkNumber(this);"> 
              </div>
            </div>
          </div>


          <?php  
            $sql = "SELECT `PricingID`, `RoomID`, `Description`, `Prices`, `RatesType`, `AccomodationType`, `WeekRates` FROM `tblpricing`  WHERE `RoomID`=".$result->ROOMID;
            $mydb->setQuery($sql);
            $pricing = $mydb->loadResultList();
            foreach($pricing as $pr){             
           ?>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "Prices">Price for <?php echo $pr->Description; ?>:</label> 
              <div class="col-md-8"> 
              <input name="PricingID[]" id="PricingID[]" type="hidden" value="<?php echo $pr->PricingID; ?>">
                <input class="form-control input-sm" id="Prices[]" name="Prices[]" placeholder=
                    "Price" type="text" value="<?php echo $pr->Prices; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>
          <?php }  ?>

 
		    <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" name="save" type="submit" >Save</button>
              </div>
            </div>
          </div>

			
	</fieldset>	
	
</form>


</div>
			
