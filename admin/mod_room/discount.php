<?php 
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    ?>
    <style type="text/css">
  .btn:focus, .btn:active, button:focus, button:active {
      outline: none !important;
      box-shadow: none !important;
    }

    #image-gallery .modal-footer{
      display: block;
    }

    .thumb{
      margin-top: 15px;
      margin-bottom: 15px;
    }

    #image-gallery-image{
      height: 400px;
    }

    .thumbnail img{
      width: 100%;
      height: 300px;
    }
</style>
  <?php
    check_message();
      
    ?>
<form class="form-horizontal well span6" action="controller.php?action=discount" method="POST"> 
	<fieldset>
		<legend>Add Discount</legend>
											 
          <input type="hidden" name="RoomID"   id="RoomID" value="<?php echo $id;?>">
          


          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "caption">Discount (%):</label> 
              <div class="col-md-8">
              <input type="number" min=0 max=100 step="1" name="discount_val" value="" id="discount_val" placeholder="Discount" class="form-control">
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
