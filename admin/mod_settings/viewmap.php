<?php 
$mydb->setQuery("SELECT * FROM  `tblsettings` WHERE TYPE='Map' AND ResortID=".$_SESSION['ADMIN_ID']);
$maxrow = $mydb->num_rows($mydb->executeQuery());
if($maxrow > 0){
$cur = $mydb->loadSingleResult();
$description = $cur->DESCRIPTION;  
$id = $cur->ID;
}
?>

 <?php if($maxrow > 0){ ?>
    <form class="form-horizontal well span6" action="controller.php?action=edit" method="POST">
      <input type="hidden" id="ID" name="ID" type="text" value="<?php echo isset($id) ? $id :'';?>">
 <?php }else{ ?>
    <form class="form-horizontal well span6" action="controller.php?action=add" method="POST">
 <?php } ?>
	<fieldset>
		<legend>Map</legend>  
		<div class="col-md-6">
   
          <div class="form-group">
            <div class="col-md-12">
                 <label class="col-md-12" for=
              "DESCRIPTION">Get iFrame Code <a href="https://www.maps.ie/create-google-map/" target="_blank" >Here</a></label>

              <div class="col-md-12"> 
         <pre>Note: Set the location in the map and copy the iFrame code in the <a href="https://www.maps.ie/create-google-map/" target="_blank" >https://www.maps.ie/create-google-map/</a>  and paste the iFrame code in the map setting of your site. 
         </pre>  
              </div>
            </div>
          </div>  
    
		
          <div class="form-group">
            <div class="col-md-12">
              <label class="col-md-12" for=
              "DESCRIPTION">Paste iFrame Code inside the box:</label>

              <div class="col-md-12"> 
                <input type="hidden" name="type" id="type" value="Map" />
                <textarea required class="form-control input-sm" id="DESCRIPTION" name="DESCRIPTION" placeholder=
                    "Paste HTML code" type="text" rows="10"><?php echo isset($description) ? $description :'';?></textarea> 
              </div>
            </div>
          </div>  
		
		 <div class="form-group">
            <div class="col-md-12"> 
              <div class="col-md-12">
                <button class="btn btn-primary" name="save" type="submit" >Save</button>
              </div>
            </div>
          </div>

	   </div>
	   <div class="col-md-6">  
	    <label >Map View</label> 
	      <?php echo isset($description) ? $description :'';?>
	   </div>
	</fieldset>	
	
</form>



</div>
			
