  <?php 
  $type = isset($_POST['Type']) ? $_POST['Type'] : '';

  if ($type=='Room' || $type == 'Private Pool') { 
  ?>
      <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "Addons">Name:</label>

              <div class="col-md-8"> 
                 <select class="form-control input-sm" id="Addons" name="Addons" placeholder=
                    "Addons Name" required>
                     <option value="">Select</option>
                     <option value="1">Extra Per Person</option>
                     <option value="2">Extend Per Hour</option>
                  </select>
              </div>
            </div>
          </div> 
  <?php
   }else{ 
  ?>   

    <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "Addons">Name:</label>

              <div class="col-md-8">
                <input name="" type="hidden" value="">
                 <input class="form-control input-sm" id="Addons" name="Addons" placeholder=
                    "Addons Name" type="text" value="" required>
              </div>
            </div>
          </div> 

   <?php
   } 
  ?>


          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "Price">Price:</label> 
              <div class="col-md-8">
                <input name="" type="hidden" value="">
                 <input class="form-control input-sm" id="Price" name="Price" placeholder=
                    "Addons Price" type="text" value="" required>
              </div>
            </div>
          </div>