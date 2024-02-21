<?php
require_once("../includes/initialize.php");
 if (!isset($_SESSION['ADMIN_ID'])){
 	redirect('login.php');
 	return true;
 }
 if($_SESSION['ADMIN_2WAY'] === '1' && $_SESSION["ADMIN_2WAYDONE"] === '0'){
	$code = '';
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for ($i = 0; $i < 6; $i++) {
        $isLetter = (mt_rand(0, 1) == 0); 
        if ($isLetter) {
            
            $code .= $characters[mt_rand(0, 51)];
        } else {
            
            $code .= $characters[mt_rand(52, 61)];
        }
    }

	$sql = "UPDATE `tbluseraccount` SET  `twoWayCode`='{$code}' WHERE `USERID`='{$_SESSION['ADMIN_ID']}'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	$msg = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
				<div style="margin:50px auto;width:70%;padding:20px 0">
					<div style="border-bottom:1px solid #eee">
					<a href="https://genericresort.online" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">GENERIC RESORT</a>
					</div>
					<p style="font-size:1.1em">Hi,</p>
					<p> Use the following OTP to login.</p>
					<h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">G-' . strtoupper($code) . '</h2>
					<p style="font-size:0.9em;">Regards,<br />GENERIC RESORT</p>
					<hr style="border:none;border-top:1px solid #eee" />
					<div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
					<p>GENERIC RESORT</p> 
					</div>
				</div>
			</div>';

	include '../mailSender.php'; 

	$mail->Body = $msg;
	$mail->addAddress($_SESSION["ADMIN_EMAIL"], "Verification Code");
		if($mail->send()) { 
			redirect(WEB_ROOT . "admin/twoway.php");
		}else{
			echo  '<script>alert("mail not send! Please try again.")</script>';
				echo '<script>window.location="reset-password.php"</script>';
		} 
	
 }


 include 'modal.php'; 
$content='home.php';

include 'themes/backendTemplate.php';

?>
