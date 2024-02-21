<?php
	function strip_zeros_from_date($marked_string="") {
		
		$no_zeros = str_replace('*0','',$marked_string);
		$cleaned_string = str_replace('*0','',$no_zeros);
		return $cleaned_string;
	}
	function redirect_to($location = NULL) {
		if($location != NULL){
			header("Location: {$location}");
			exit;
		}
	}
	function redirect($location=Null){
		if($location!=Null){
			echo "<script>
					window.location='{$location}'
				</script>";	
		}else{
			echo 'error location';
		}
		 
	}
	function output_message($message="") {
	
		if(!empty($message)){
		return "<p class=\"message\">{$message}</p>";
		}else{
			return "";
		}
	}
	function date_toText($datetime=""){
		$nicetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $nicetime);	
					
	}
	function __autoload_($class_name) {
		$class_name = strtolower($class_name);
		$path = "{$class_name}.php";
		if(file_exists($path)){
			require_once($path);
		}else{
			die("The file {$class_name}.php could not be found.");
		}
					
	}
	spl_autoload_register('__autoload_');
	function file_path(){

		$pathinfo = pathinfo(__FILE__);
		echo $pathinfo['dirname'];
	}
	
	function currentpage(){
		$this_page = $_SERVER['SCRIPT_NAME']; 
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; 
	    $this_script = $bits[0]; 
		 return $bits[3];
	  
	}
	
	function publicpage(){
		$this_page = $_SERVER['SCRIPT_NAME']; 
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; 
	    $this_script = $bits[0]; 
		 return $bits[2];
	  
	}
	
	function unsetSessions(){
	if(isset($_SESSION['arrival'])){unset($_SESSION['arrival']);}
	if(isset($_SESSION['departure'])){unset($_SESSION['departure']);}
	if(isset($_SESSION['person'])){unset($_SESSION['person']);}
	if(isset($_SESSION['roomid'])){unset($_SESSION['roomid']);}
	if(isset($_SESSION['start_time'])){unset($_SESSION['start_time']);}
	if(isset($_SESSION['end_time'])){unset($_SESSION['end_time']);}
	if(isset($_SESSION['m_cart'])){unset($_SESSION['m_cart']);}
	if(isset($_SESSION['addons_cart'])){unset($_SESSION['addons_cart']);}
	if(isset($_SESSION['ratesType'])){unset($_SESSION['ratesType']);} 
	}

	function dateDiff($start, $end) {

	$start_ts = strtotime($start);

	$end_ts = strtotime($end);

	$diff = $end_ts - $start_ts;

	return round($diff / 86400);

	}

	function date_time_diff($start,$end,$format){
		$datetime1 = new DateTime($start);
		$datetime2 = new DateTime($end);  
		$diff = $datetime1->diff($datetime2);

		return $diff->$format;
	}

 function formatDate($date,$format){
 		return date_format(date_create($date),$format);
 } 

$today = time();  
$event = mktime(0,0,0,11,07,2022);
$connection = round(($event - $today)/86400);


 
 
//******************** ENCRYPT/DECRYPT ****************//
function encrypt($data) {
    $salt ="thesis1";    
    $key = $salt.$data;
    $key = base64_encode($key);
    $encrypt = base64_encode($key);
    return $encrypt;
}
function decrypt($data){
    $salt ="thesis2";    
    $key = base64_decode($data);
    $decrypt = str_replace($salt,"",base64_decode($key));
    return $decrypt;
}
?>