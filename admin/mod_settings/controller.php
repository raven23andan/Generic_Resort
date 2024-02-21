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


	}
function doInsert(){
		
	if ($_POST['DESCRIPTION'] == "") {
		$messageStats = false;
			message("field required to fill!", "error");
			redirect("index.php?view=add");
		
	}else{
		$setting = new Setting();
		
		$type 		= $_POST['type']; 
		$desc = $_POST['DESCRIPTION']; 
		
		if($_SESSION['ADMIN_UROLE']=='Administrator'){
		    $res = $setting->find_all_settings($type,'Administrator');
		}else{
		    $res = $setting->find_all_settings($type,$_SESSION['ADMIN_ID']);
		}

		
		 
		if ($res >=1) { 
    			message("The type is already exist!", "error");
		        if($type=='Map'){
		            
    			redirect("index.php?view=map");
		        }else{
    			redirect("index.php?view=add");
		             
		        
		    }
		}else{
			

	    
 
		
		        if($type=='Map'){
		            
    			 
			        $setting->DESCRIPTION = $desc;
		        }else{
    			
		        	$setting->DESCRIPTION = $desc;
		            
		        }
		        
		    $setting->ResortID = $_SESSION['ADMIN_ID']; 
			$setting->TYPE = $type;
			$setting->ChatKeyword = isset($_POST['ChatKeyword']) ? $_POST['ChatKeyword'] : 'N/A' ; 
			
			 $istrue = $setting->create(); 
			 if ($istrue == 1){
			 	message("New [". $type ."] created successfully!", "success");
		        if($type=='Map'){
		            
    			redirect("index.php?view=map");
		        }else{
    			redirect("index.php?view=add");
		            
		        }
			 	
			 }
		}	 

		
	}	
}
function doEdit(){
	if ($_POST['DESCRIPTION'] == "" ) {
		$messageStats = false;
			message("All fields required!", "error");
			redirect("index.php?view=edit&id=".$_POST['ID']);
		
	}else{
		$type 		= $_POST['type'];
		
		$desc = $_POST['DESCRIPTION']; 
		
		

	    
		$setting = new Setting(); 
		
		        if($type=='Map'){
		            
    			 
			        $setting->DESCRIPTION = $desc;
		        }else{
    			
		        	$setting->DESCRIPTION = $desc;
		            
		        }
			
			$setting->ChatKeyword = isset($_POST['ChatKeyword']) ? $_POST['ChatKeyword'] : 'N/A' ; 
			
			$setting->update($_POST['ID']); 
				
			 	message("New [". $type ."] Updated successfully!", "success"); 
		        if($type=='Map'){
		            
    			redirect("index.php?view=map");
		        }else{
    			redirect("index.php?view=add");
		            
		        }
			

		
	}	
		
}

function doDelete(){
	 @$id=$_POST['selector'];
		  $key = count($id);
		
		
	for($i=0;$i<$key;$i++){
	 
		$setting = new Setting();
		$setting->delete($id[$i]);
	}

		message("Type already Deleted!","info");
		redirect('index.php');

}

?>