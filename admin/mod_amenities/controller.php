<?php
require_once("../../includes/initialize.php");
require_once("../../includes/amenities.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;

	case 'editimage' :
	editImg();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'insertgallery' :
	doInsertImage();
	break;
	
	case 'deleteimages' :
	doDeleteImage();
	break;


	}

function doInsert(){
    global $mydb;
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=add");
		}else{
				$file=$_FILES['image']['tmp_name'];
				$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name= addslashes($_FILES['image']['name']);
				$image_size= getimagesize($_FILES['image']['tmp_name']);
				if ($image_size==FALSE) {
					message("That's not an image!", "error");
					redirect("index.php?view=add");
				}else{
			
			$location = "./pics/".$_FILES["image"]["name"];
			if(false){
		    	message("Image name already exist!. Please select another one!", "error");
				redirect("index.php?view=add");	
			}else{
    			move_uploaded_file($_FILES["image"]["tmp_name"], $location);
    
    			if ($_POST['name'] == "" OR $_POST['description'] == "") {
    				
    					message("All fields required!", "error");
    					redirect("index.php?view=add");
    				
    			}else{
    				$amen = new Amenities();
    				       
    				$amen_name		= $_POST['name'];
    				$description	= $_POST['description'];
    				$amen_image 		= $location;
					
					
    				
    				$sql = "SELECT `amen_id`, `amen_name`, `amen_desp`, `amen_image`, `Price`, `Free`, `ResortID` FROM `tblamenities` WHERE `amen_name`='{$amen_name}' AND `ResortID`='{$_SESSION['ADMIN_ID']}'";
    				$mydb->setQuery($sql);
    				$res = $mydb->num_rows($mydb->executeQuery());
    
    				
    				
    				
    				if ($res >=1) {
    					message("Amenity name already exist!", "error");
    					redirect("index.php?view=add");
    				}else{
    				
    					$amen->amen_name = $amen_name;
    					$amen->amen_desp = $description;
    					$amen->amen_image = $location;
						
						
    					$amen->ResortID = $_SESSION['ADMIN_ID'];
    					
    					  $amen->create();  
    					 	message("New [". $amen_name ."] created successfully!", "success");
    					 	redirect('index.php');
    				 
    				}	 
    
    		
    			}	



		}
	}
  }
}


 function doEdit(){
 	
        		$amen = new Amenities();
          		$rm_id			= $_POST['amen_id'];
				$rm_name		= $_POST['name'];
				$rm_description = $_POST['description'];
				
				$amen->amen_id = $rm_id;
				$amen->amen_name = $rm_name;
				$amen->amen_desp = $rm_description;
				
				$amen->update($rm_id); 
				
			 	message("New [". $rm_name ."] Updated successfully!", "success"); 
			 	redirect('index.php');
}

function doDelete(){
@$id=$_POST['selector'];
		  $key = count($id);
		
		
	for($i=0;$i<$key;$i++){
	 
		$rm = new Amenities();
		$rm->delete($id[$i]);
	}

		message("Amenity already Deleted!","info");
		redirect('index.php');
 }
 
 
 
function editImg (){
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=list");
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE) {
				message("That's not an image!");
				redirect("index.php?view=list");
		   }else{
			
		
				$location="pics/".$_FILES["image"]["name"];
				

	 				$amen = new Amenities();
	          		$rm_id		= $_POST['id'];
				
			    	move_uploaded_file($_FILES["image"]["tmp_name"],"pics/".$_FILES["image"]["name"]);
					
					$amen->amen_image = $location;
					$amen->update($rm_id); 
					
				 	message("Amenity Image Upadated successfully!", "success");
				 	unset($_SESSION['id']);
				 	 redirect("index.php");
 			}
 		}
 }			 

function _deleteImage($catId)
{
   
    $deleted = false;

	
    $sql = "SELECT * 
            FROM amenities
            WHERE amen_id ";
	
	if (is_array($catId)) {
		$sql .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql .= " = {$catId}";
	}
global $mydb;
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
foreach ($cur as $value) {
	$deleted = @unlink($value->amen_image);

}
    
    
return $deleted;
}

function doInsertImage(){
	global $mydb;

		$id = $_POST['RoomID'];
		$caption = $_POST['caption'];

		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=list");
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE) {
				message("That's not an image!");
				redirect("index.php?view=list");
		   }else{
				
		
				$randnum = date('Ymdis').rand(5, 30);
				$location="pics/".$randnum. $_FILES["image"]["name"]; 
			    move_uploaded_file($_FILES["image"]["tmp_name"],$location);
				 
				$sql = "INSERT INTO `tblgallery`( `RoomID`, `RoomImages`, `Caption`,`Category`) VALUES ('{$id}','{$location}','{$caption}','Amenities')";
				$mydb->setQuery($sql);
				$mydb->executeQuery();

				message("New Image saved successfully!", "success"); 
				redirect("index.php?view=gallery&id=".$id);
 			}
 		}
}

function doDeleteImage(){
	global $mydb;
	$id=$_GET['id']; 
	$roomid=$_GET['roomid']; 
		 $sql ="DELETE FROM `tblgallery` WHERE `GalleryID`='{$id}'";
		$mydb->setQuery($sql);
	    $mydb->executeQuery();

		message("Image already Deleted!","info");
		redirect('index.php?view=gallery&id='.$roomid);
}
?>
