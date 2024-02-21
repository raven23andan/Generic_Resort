<?php 
$_SESSION['id']=$_GET['id']; 
 $sql = "SELECT `AddonsID`, `Addons`, `Price`, `AddonsType` FROM `tbladdons` WHERE AddonsID=".$_SESSION['id'];
 $mydb->setQuery($sql);
 $result = $mydb->loadSingleResult();
?>
<form class="form-horizontal well span6" action="controller.php?action=edit" enctype="multipart/form-data" method="POST">

	<fieldset>
		<legend>Edit Addons</legend>
											
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "Addons">Name:</label>

              <div class="col-md-8">
                <input name="AddonsID" type="hidden" value="<?php echo $result->AddonsID;?>">
                 <input class="form-control input-sm" id="Addons" name="Addons" placeholder=
                    "Addons Name" type="text" value="<?php echo $result->Addons;?>">
              </div>
            </div>
          </div>        
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "Price">Price:</label> 
              <div class="col-md-8">
                <input name="" type="hidden" value="">
                 <input class="form-control input-sm" id="Price" name="Price" placeholder=
                    "Addons Price" type="text" value="<?php echo $result->Price;?>" onkeyup="javascript:checkNumber(this);" >
              </div>
            </div>
          </div>

           	
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
			
