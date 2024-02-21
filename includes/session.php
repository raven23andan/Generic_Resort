<?php

	
	session_start();
	

	function logged_in() {
		return isset($_SESSION['GUESTID']);
        
	}

	function confirm_logged_in() {
		if (!logged_in()) {?>
			<script type="text/javascript">
				window.location = "admin/index.php";
			</script>

		<?php
		}
	}
	function admin_logged_in() {
		return isset($_SESSION['ADMIN_ID']);
        
	}

	function admin_confirm_logged_in() {
		if (!admin_logged_in()) {?>
			<script type="text/javascript">
				window.location = "index.php";
			</script>

		<?php
		}
	}
	
	function message($msg="", $msgtype="") {
	  if(!empty($msg)) {

	    $_SESSION['message'] = $msg;
	    $_SESSION['msgtype'] = $msgtype;
	  } else {

			return $message;
	  }
	}
	function check_message(){
	
		if(isset($_SESSION['message'])){
			if(isset($_SESSION['msgtype'])){
				if ($_SESSION['msgtype']=="info"){
	 				echo  '<div class="alert alert-info">'. $_SESSION['message'] . '</div>';
	 				 
				}elseif($_SESSION['msgtype']=="error"){
					echo  '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
									
				}elseif($_SESSION['msgtype']=="success"){
					echo  '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
				}	
				unset($_SESSION['message']);
	 			unset($_SESSION['msgtype']);
	   		}
  
		}	

	}
function product_exists($pid,$day,$checkin,$checkout,$price){
    $pid=intval($pid);
    $max=count($_SESSION['m_cart']);
    $flag=0;
    for($i=0;$i<$max;$i++){
      if($pid==$_SESSION['m_cart'][$i]['mroomid']){
        $flag=1;

 


      	if($day<>""){

      		  	$_SESSION['m_cart'][$i]['mday']=$day;  
				      $_SESSION['m_cart'][$i]['mcheckin']=$checkin;
				      $_SESSION['m_cart'][$i]['mcheckout']=$checkout;
      				$_SESSION['m_cart'][$i]['mroomprice']=$price;
     
            $flag=1;
            

              break;
          }


        break;
      }
    }
    return $flag;
  }
 function addtocart($pid,$day, $price,$checkin,$checkout){
    if($pid<1 or $day<1) return;
    if (!empty($_SESSION['m_cart'])){


    if(is_array($_SESSION['m_cart'])){
      if(product_exists($pid,$day,$checkin,$checkout,$price)) return;
      $max=count($_SESSION['m_cart']);
      $_SESSION['m_cart'][$max]['mroomid']=$pid; 
       $_SESSION['m_cart'][$max]['mday']=$day; 
      $_SESSION['m_cart'][$max]['mroomprice']=$price;
      $_SESSION['m_cart'][$max]['mcheckin']=$checkin;
      $_SESSION['m_cart'][$max]['mcheckout']=$checkout;
    }
    else{
     $_SESSION['m_cart']=array();
      $_SESSION['m_cart'][0]['mroomid']=$pid; 
       $_SESSION['m_cart'][0]['mday']=$day; 
      $_SESSION['m_cart'][0]['mroomprice']=$price;
      $_SESSION['m_cart'][0]['mcheckin']=$checkin;
      $_SESSION['m_cart'][0]['mcheckout']=$checkout;
    }
}else{
     $_SESSION['m_cart']=array();
      $_SESSION['m_cart'][0]['mroomid']=$pid; 
       $_SESSION['m_cart'][0]['mday']=$day; 
      $_SESSION['m_cart'][0]['mroomprice']=$price;
      $_SESSION['m_cart'][0]['mcheckin']=$checkin;
      $_SESSION['m_cart'][0]['mcheckout']=$checkout;
}
}
  function removetocart($pid){
		$pid=intval($pid);
		$max=count($_SESSION['m_cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['m_cart'][$i]['mroomid']){
				unset($_SESSION['m_cart'][$i]);
				break;
			}
		}
		$_SESSION['m_cart']=array_values($_SESSION['m_cart']);
	}
function addons_exists($id,$qty,  $price,$total,$roomID){
    $id=intval($id);
    $max=count($_SESSION['addons_cart']);
    $flag=0;
    for($i=0;$i<$max;$i++){
      if($id==$_SESSION['addons_cart'][$i]['id'] && $roomID==$_SESSION['addons_cart'][$i]['roomID']){

				$_SESSION['addons_cart'][$i]['id']=$id; 
				$_SESSION['addons_cart'][$i]['qty']=$qty; 
				$_SESSION['addons_cart'][$i]['price']=$price;
				$_SESSION['addons_cart'][$i]['total']=$total;
      	$_SESSION['addons_cart'][$i]['roomID']=$roomID; 
 

        $flag=1; 
      	 
        break;
      }
    }
    return $flag;
  }
 function addtoaddons($id,$qty, $price,$total,$roomID){
    if($id<1) return;
    if (!empty($_SESSION['addons_cart'])){


    if(is_array($_SESSION['addons_cart'])){
      if(addons_exists($id,$qty,  $price,$total,$roomID)) return;
      $max=count($_SESSION['addons_cart']);
      $_SESSION['addons_cart'][$max]['id']=$id; 
       $_SESSION['addons_cart'][$max]['qty']=$qty; 
      $_SESSION['addons_cart'][$max]['price']=$price;
      $_SESSION['addons_cart'][$max]['total']=$total; 
      $_SESSION['addons_cart'][$max]['roomID']=$roomID; 
    }
    else{
     $_SESSION['addons_cart']=array();
      $_SESSION['addons_cart'][0]['id']=$id; 
       $_SESSION['addons_cart'][0]['qty']=$qty; 
      $_SESSION['addons_cart'][0]['price']=$price;
      $_SESSION['addons_cart'][0]['total']=$total; 
      $_SESSION['addons_cart'][0]['roomID']=$roomID; 

    }
}else{
     $_SESSION['addons_cart']=array();
      $_SESSION['addons_cart'][0]['id']=$id; 
       $_SESSION['addons_cart'][0]['qty']=$qty; 
      $_SESSION['addons_cart'][0]['price']=$price;
      $_SESSION['addons_cart'][0]['total']=$total; 
      $_SESSION['addons_cart'][0]['roomID']=$roomID; 

}
}
  function removetoaddons($id,$roomID){
		$id=intval($id);
		$max=count($_SESSION['addons_cart']);
		for($i=0;$i<$max;$i++){
			  if($id==$_SESSION['addons_cart'][$i]['id'] && $roomID==$_SESSION['addons_cart'][$i]['roomID']){
				unset($_SESSION['addons_cart'][$i]);
				break;
			}
		}
		$_SESSION['addons_cart']=array_values($_SESSION['addons_cart']);
	}

	function addtoMessage($msgid,$msg){
    if($msgid<1) return;
    if (!empty($_SESSION['msg_cart'])){


    if(is_array($_SESSION['msg_cart'])){ 
      $max=count($_SESSION['msg_cart']);
      $_SESSION['msg_cart'][$max]['msg_id']=$msgid; 
       $_SESSION['msg_cart'][$max]['msg']=$msg;  
    }
    else{
     $_SESSION['msg_cart']=array();
      $_SESSION['msg_cart'][0]['msg_id']=$msgid; 
       $_SESSION['msg_cart'][0]['msg']=$msg;  
    }
}else{
     $_SESSION['msg_cart']=array();
      $_SESSION['msg_cart'][0]['msg_id']=$msgid; 
       $_SESSION['msg_cart'][0]['msg']=$msg;  
}
}
?>
