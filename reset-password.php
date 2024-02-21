<?php
require_once("includes/initialize.php"); 

 ?>
<style type="text/css">
  .form-gap {
    padding-top: 70px;
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
 <?php if (!isset($_POST['email'])) { ?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-envelope-o fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>  
                  <div class="panel-body">
    
                    <form id="register-form" role="form"   class="form" method="post" action="">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Email" class="form-control"  required  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Send Email" type="submit">
                      </div> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
</div>
<?php
 }else{ 
       
  $sql = "SELECT * FROM `tblguest` WHERE  `EMAILADDRESS`='{$_POST['email']}'";
  $mydb->setQuery($sql);
  $res = $mydb->executeQuery();
  $maxrow = $mydb->num_rows($res);

  if ($maxrow>0) {
      $result = $mydb->loadSingleResult();
      
      $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 6; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    $_SESSION['gmailAuth'] = $randomString;
     
     
     
    $msg = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <a href="https://genericresort.online/" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">GENERIC RESORT</a>
    </div>
    <p style="font-size:1.1em">Hi,</p>
    <p> Use the following OTP to change password.</p>
    <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">G-'.$randomString.'</h2>
    <p style="font-size:0.9em;">Regards,<br />GENERIC RESORT</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>GENERIC RESORT</p> 
    </div>
  </div>
</div>';

        include 'mailSender.php'; 
        $mail->Body = $msg;
        $mail->addAddress($_POST['email'], "Verification Code");
          if($mail->send()) { 

               
              $guest = New Guest();
              $guest->AUTH        = $randomString; 
              $guest->update($result->GUESTID);
              
              redirect("auth.php");
            }else{
                echo  '<script>alert("mail not send! Please try again.")</script>';
                 echo '<script>window.location="reset-password.php"</script>';
            } 
     
    
?> 



<?php  }else{
// for resort 
      
  $sql = "SELECT * FROM `tbluseraccount` WHERE `User_Email`='{$_POST['email']}'";
  $mydb->setQuery($sql);
  $res = $mydb->executeQuery();
  $maxrow = $mydb->num_rows($res);

  if ($maxrow>0) {
      $result = $mydb->loadSingleResult();
      
      $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 6; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    $_SESSION['gmailAuth'] = $randomString;
     
     
     
    $msg = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <a href="https://genericresort.online/" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">GENERIC RESORT</a>
    </div>
    <p style="font-size:1.1em">Hi,</p>
    <p> Use the following OTP to change password.</p>
    <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">G-'.$randomString.'</h2>
    <p style="font-size:0.9em;">Regards,<br />GENERIC RESORT</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>GENERIC RESORT</p> 
    </div>
  </div>
</div>';

        include 'mailSender.php'; 
        $mail->Body = $msg;
        $mail->addAddress($_POST['email'], "Verification Code");
          if($mail->send()) { 

 
              $resort = New User();
              $resort->ResortAuth        = $randomString; 
              $resort->update($result->USERID);
              
              redirect("auth.php");
            }else{
                echo  '<script>alert("mail not send! Please try again.")</script>';
                 echo '<script>window.location="reset-password.php"</script>';
            } 
     
  }else{

?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-envelope-o fa-4x"></i></h3>
                  <label class="label col-md-12 label-danger text-center">Can't find Email Address!</label>
                  <h2 class="text-center">Forgot Password?</h2> 
                  <div class="panel-body">
    
                   <form id="register-form" role="form"   class="form" method="post" action="">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Email" class="form-control"  required  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Send Code" type="submit">
                      </div> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
</div>

<?php  } }


}
  ?>
  <script src="<?php echo WEB_ROOT; ?>admin/jquery/jquery.min.js"></script>

  <script type="text/javascript">
    function validate() {
     validate_new_Password();
     validate_confirm_Password();
      var newpass;
      var confirmpass;

      newpass = $("#new_password").val();
      confirmpass = $("#confirm_password").val(); 


      if (newpass==confirmpass) {
         $("#errormsg").hide();
         return true;

      }else{
          $("#errormsg").hide();
          $("#errormsg").fadeIn();
          $("#errormsg").html("Password does not match!");
          return false;
      }
      
    }
    
    
    function validate_new_Password() { 
    var pass = document.getElementById('new_password'); 
    var errors = [];
    var p = pass.value;
    
    if (p.length < 8) {
        errors.push("Your password must be at least 8 characters"); 
    }
    if (p.search(/[a-z]/i) < 0) { 
        errors.push("Your password must contain at least one letter.");
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit.");
    }
    if (errors.length > 0) { 
        pass.setCustomValidity(errors.join("\n"));

        return false;
    }
        pass.setCustomValidity("");
        return true;  
}
 function validate_confirm_Password() { 
    var pass = document.getElementById('confirm_password'); 
    var errors = [];
    var p = pass.value;
    
    if (p.length < 8) {
        errors.push("Your password must be at least 8 characters"); 
    }
    if (p.search(/[a-z]/i) < 0) { 
        errors.push("Your password must contain at least one letter.");
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit.");
    }
    if (errors.length > 0) { 
        pass.setCustomValidity(errors.join("\n"));

        return false;
    }
        pass.setCustomValidity("");
        return true;  
}
  </script>