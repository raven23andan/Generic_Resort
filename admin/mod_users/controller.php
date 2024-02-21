<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;


	
	case 'upload' :
	doInsertImage();
	break;
	}
function doInsert(){
		
	if ($_POST['UNAME'] == "" OR $_POST['USERNAME'] == "" OR $_POST['UPASS'] == "") {
		$messageStats = false;
			message("All fields required!", "error");
			redirect("index.php?view=add");
		
	}else{

		$user = new User();
		$acc_name		= $_POST['UNAME']; 
		$res = $user->find_all_user($acc_name);
		
		
		if ($res >=1) {
			message("Account name already exist!", "error");
			redirect("index.php?view=add");
		}else{
			
			
			$user = new User(); 
			$user->UNAME 		= $_POST['UNAME'];
			$user->USER_NAME 	= $_POST['USERNAME'];
			$user->UPASS 		= sha1($_POST['UPASS']);
			$user->ROLE 		=  $_POST['ROLE'];
			$istrue = $user->create(); 

			 if ($istrue == 1){
			 	message("New [".$_POST['UNAME']."] created successfully!", "success");
			 	redirect('index.php');
			 	
			 }
		}	 

		
	}	
}
function doEdit(){
	if ($_POST['UNAME'] == "" OR $_POST['USERNAME'] == "") {
		$messageStats = false;
			message("All fields required!", "error");
			redirect("index.php?view=edit&id=".$_SESSION['id']);
		
	}else{
	    	$user = new User(); 
			$user->UNAME 		= $_POST['UNAME'];
			$user->USER_NAME 	= $_POST['USERNAME'];
			$user->twoWayAuth   = $_POST['twoWay'];
			$user->User_Email = $_POST['EMAIL'];

			if($_FILES['valid-id']['name'] != '' || $_FILES['valid-id']['name'] != null){
				$fileName = $_FILES['valid-id']['name'];
				$fileTmpName = $_FILES['valid-id']['tmp_name'];
				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));
				$allowed = array('jpg', 'jpeg', 'png', 'pdf');

				if (in_array($fileActualExt, $allowed)) {
					$fileNameNew = $fileName;
					$filesDestination = '../../resort/img_verification/' . $fileNameNew;

					move_uploaded_file($fileTmpName, $filesDestination);
					$user->VALID_ID = $fileNameNew;
				} else {
					echo "File type not allowed!";
				}
			}

			if($_FILES['bir']['name'] != '' || $_FILES['bir']['name'] != null){
				$fileName = $_FILES['bir']['name'];
				$fileTmpName = $_FILES['bir']['tmp_name'];
				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));
				$allowed = array('jpg', 'jpeg', 'png', 'pdf');

				if (in_array($fileActualExt, $allowed)) {
					$fileNameNew = $fileName;
					$filesDestination = '../../resort/img_verification/' . $fileNameNew;

					move_uploaded_file($fileTmpName, $filesDestination);
					$user->BIR = $fileNameNew;
				} else {
					echo "File type not allowed!";
				}
			}
	    if(!isset($_POST['btn_update_account'])){
	        $user->UPASS 		= sha1($_POST['UPASS']);
			$user->ROLE 		=  $_POST['ROLE'];

			

	    }
		
		
			$user->update($_POST['USERID']); 
				
			 	message("[".  $_POST['UNAME'] ."] Updated successfully!", "success");

			 	
			 	  if(!isset($_POST['btn_update_account'])){
			    	redirect('index.php');
			 	  }else{
			 	      	redirect('index.php?view=view');
			 	  }
			

		
	}	
		
}

function doDelete(){
	 @$id=$_POST['selector'];
		  $key = count($id);
		
		
	for($i=0;$i<$key;$i++){
	 
		$user = new User();
		$user->delete($id[$i]);
	}

		message("User already Deleted!","info");
		redirect('index.php');

}

function doInsertImage(){
	global $mydb;

		$id = $_SESSION['ADMIN_ID']; 

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
				$location="logo/".$randnum. $_FILES["image"]["name"]; 
			    move_uploaded_file($_FILES["image"]["tmp_name"],$location);
				 
				$sql = "UPDATE `tbluseraccount` SET  `Logo`='{$location}' WHERE `USERID`='{$id}'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();

				message("Logo changed successfully!", "success"); 
				redirect("index.php?view=view&id=".$id);
 			}
 		}
}
?>