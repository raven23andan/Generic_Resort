
<form class="form-horizontal well span6" action="controller.php?action=add" enctype="multipart/form-data" method="POST">

	<fieldset>
		<legend>New Addons</legend>
											
         <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" for=
            "ROOMNUM">Type:</label>

            <div class="col-md-8">
               <select class="form-control input-sm" id="Type" name="Type" required  >
                <option value="">Select</option>
                 <option>Room</option> 
                 
               </select>
            </div>
          </div>
        </div>

        

          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "Addons">Name:</label>

              <div class="col-md-8">
              	<input name="" type="hidden" value="">
                 <input class="form-control input-sm" id="Addons" name="Addons" placeholder=
									  "Addons Name" type="text" value="">
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
                    "Addons Price" type="text" value="" required onkeyup="javascript:checkNumber(this);" >
              </div>
            </div>
          </div>

 
		 <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" id="btnaddonsave" name="save" type="submit"  >Save</button>
              </div>
            </div>
          </div>

			
	</fieldset>	
	
</form>


</div>
			
