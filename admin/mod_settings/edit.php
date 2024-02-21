<?php

 
$setting = new Setting();
$result = $setting->single_setting($_GET['id']);

?>
<form class="form-horizontal well span6" action="controller.php?action=edit" method="POST" >
 
		<legend>Modify <?php echo $result->TYPE;?> </legend> 
 
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "DESCRIPTION">Description:</label>

              <div class="col-md-8"> 
              <input type="hidden" id="ID" name="ID" type="text" value="<?php Echo $result->ID;?>">
              <input type="hidden" id="type" name="type" type="text" value="<?php Echo $result->TYPE;?>"> 
                 <textarea class="form-control input-sm" id="compose-textarea4" name="DESCRIPTION" placeholder=
                    "Description" type="text" rows="10"><?php Echo $result->DESCRIPTION;?></textarea>  
              </div>
            </div>
          </div>   
          
          <?php 
          if($result->TYPE=="Chatbot"){
          ?>
            <div id="chatkeyword" class="form-group" >
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "DESCRIPTION">Keyword:</label>

              <div class="col-md-8"> 
                <input type="text" class="form-control input-sm" id="ChatKeyword" name="ChatKeyword" placeholder=
                    "Keyword" value="<?php Echo $result->ChatKeyword;?>"> 
              </div>
            </div>
          </div>  
		<?php
          }
          ?>
		 <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" name="save" type="submit"  >Save</button>
              </div>
            </div>
          </div>

			 
	
</form>
			
