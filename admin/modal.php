<!--Modal Log-out -->  
  <div class="modal fade" id="logout" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
		  </div>
		  <div class="modal-body">
		  <div class="alert alert-info">Are you Sure you Want to <strong>Logout</strong>?</div>
		  </div>
		  <div class="modal-footer">
		      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
		      <a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i> Logout</a>
		  </div>
		</div> 
    </div>
</div>      
                            


  <div class="modal fade"  id="reservation" tabindex="-1">

	<div class="modal-dialog">
		<div class="modal-content">
		  <form  method="post" action="controller.php?action=addons">
		  <div class="modal-header">
		  	Addons
		  </div>
		  <div class="modal-body"> 
		  	<input type="hidden" name="roomID" id="roomID"> 
		  <input type="hidden" name="Code" id="Code">
		  	<div id="showAddons"></div> 


		  </div>
		  <div class="modal-footer">
		      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
		      <button type="submit" class="btn btn-info"><i class="icon-off"></i> Add</button>
		  </div>
		  
 </form>   
		</div> 
    </div>
</div>                       

<div class="modal fade" id="logoModal" tabindex="-1" >
  <div class="modal-dialog" role="document">
      
        <form class="form-horizontal   span6" action="controller.php?action=upload" enctype="multipart/form-data" method="POST">  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
              <input type="file" name="image" value="" id="image"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
      
	
</form>
    </div>
  </div>
</div>
 
 