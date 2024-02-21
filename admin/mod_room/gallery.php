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
<form class="form-horizontal well span6" action="controller.php?action=insertgallery" enctype="multipart/form-data" method="POST"> 
	<fieldset>
		<legend>Add Room Images</legend>
											 
              <input type="hidden" name="RoomID"   id="RoomID" value="<?php echo $id;?>">
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "image">Upload Image:</label>

              <div class="col-md-8">
              <input type="file" name="image" value="" id="image">
              </div>
            </div>
          </div> 


          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "caption">Caption:</label> 
              <div class="col-md-8">
              <input type="input" name="caption" value="" id="caption" placeholder="Caption" class="form-control">
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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<div class="container">
  <div class="row">
    <div class="row">
  <!--             <?php
 
              $directory = "../../images/gallery";
              $images= glob($directory . "/*.*"); 

              foreach($images as $image)
              { 
              ?>
                      <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="btn btn-xs btn-danger" href="controller.php?action=delete&data=<?php echo $image?>"><i class="fa fa-trash"></i> Remove</a>
                          <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                             data-image="<?php echo $image?>"
                             data-target="#image-gallery">
                              <img class="img-thumbnail"
                                   src="<?php echo $image?>"
                                   alt="Another alt text"  >
                          </a>
                          <p>Caption : <?php echo basename($image);?></p>
                      </div> 

              <?php } ?> -->
    
 
            <?php 
              
                $mydb->setQuery("SELECT * FROM `tblgallery` WHERE `RoomID`='{$id}' AND Category='Accomodation'");
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {

            ?>
              <div class="col-lg-6 thumb">
                        <a class="btn btn-xs btn-danger" href="controller.php?action=deleteimages&id=<?php echo $result->GalleryID;?>&roomid=<?php echo $result->RoomID;?>"><i class="fa fa-trash"></i> Remove</a>
                          <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                             data-image="<?php echo $result->RoomImages?>"
                             data-target="#image-gallery">
                              <img class="img-thumbnail"
                                   src="<?php echo $result->RoomImages?>"
                                   alt="Another alt text"  >
                          </a>
                          <p>Caption : <?php echo $result->Caption;?></p>
                      </div> 

<?php

 
            } 
            ?>
          
        </div>

  </div>
</div>