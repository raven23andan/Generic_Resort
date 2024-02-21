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
 
 <?php
 
 
 ?>
 
  <div class="form-gap"></div>
 <?php if (!isset($_POST['recover-submit'])) { ?> 
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-envelope fa-4x"></i></h3>
                  <h2 class="text-center">Email Verification</h2>
                  <p>Your verification code has been sent in your email account!</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form"  class="form" method="post" action="">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="">G-</i></span>
                          <input id="auth"  required name="auth" placeholder="6 digit code" class="form-control"  type="number" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Verify Code" type="submit">
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

  $sql = "SELECT * FROM `tblguest` WHERE `AUTH`='".$_POST['auth']."'";
  $mydb->setQuery($sql);
  $res = $mydb->executeQuery();
  $maxrow = $mydb->num_rows($res);

if ($maxrow>0) {

    $guest_data = $mydb->loadSingleResult(); 
?>
<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
             <div class="panel-body">
                <div class="text-center"> 
      <label id="errormsg" class="label label-danger col-md-12"></label> 
    <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Change Password</h2> 

</div>

      <form  id="register-form" role="form"   class="form"  method="POST" action="success.php" onsubmit="return validate()">
        <div class="form-group">
            <label for="new_password" class="control-label">New Password</label>
            <div class="controls">
                <input class="form-control" id="new_password" name="new_password" type="password" oninput="this.setCustomValidity('')" required>
            </div>
        </div>
        <div class="form-group">
            <label for="confirm_password" class="control-label">Confirm Password</label>
            <div class="controls">
                <input class="form-control" id="confirm_password" name="confirm_password" type="password" oninput="this.setCustomValidity('')" required>
            </div>
       </div>   
          <div class="form-group">
                 <input type="hidden" class="hide" name="token" value="<?php echo $guest_data->GUESTID;?>">
        <button  type="submit" class="btn btn-primary btn-block" name="submit" >Save changes</button>
        <a href="index.php?p=login"   >Back to Login</a> 
                      </div> 

  </form>
           
    </div>  
    
</div>
</div>
</div>
<?php

      
 }else{

$sql = "SELECT * FROM `tbluseraccount` WHERE `ResortAuth`='".$_POST['auth']."'";
  $mydb->setQuery($sql);
  $res = $mydb->executeQuery();
  $maxrow = $mydb->num_rows($res);

if ($maxrow>0) {

    $resort_data = $mydb->loadSingleResult(); 


?>
<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
             <div class="panel-body">
                <div class="text-center"> 
      <label id="errormsg" class="label label-danger col-md-12"></label> 
    <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Change Password</h2> 

</div>

      <form  id="register-form" role="form"   class="form"  method="POST" action="success.php" onsubmit="return validate()">
        <div class="form-group">
            <label for="new_password" class="control-label">New Password</label>
            <div class="controls">
                <input class="form-control" id="new_password" name="new_password" type="password" oninput="this.setCustomValidity('')" required>
            </div>
        </div>
        <div class="form-group">
            <label for="confirm_password" class="control-label">Confirm Password</label>
            <div class="controls">
                <input class="form-control" id="confirm_password" name="confirm_password" type="password" oninput="this.setCustomValidity('')" required>
            </div>
       </div>   
          <div class="form-group">
                 <input type="hidden" class="hide" name="token" value="<?php echo $resort_data->USERID;?>">
        <button  type="submit" class="btn btn-primary btn-block" name="submit" >Save changes</button>
        <a href="index.php?p=login"   >Back to Login</a> 
                      </div> 

  </form>
           
    </div>  
    
</div>
</div>
</div>
<?php }else{ ?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-envelope fa-4x"></i></h3>
                  <p class="label-danger" style="color:#fff">Code is not correct</p>
                  <h2 class="text-center">Email Verification</h2>
                  <p>Your verification code has been sent in your email account!</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" class="form" method="post" action="">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="">code</i></span>
                          <input id="auth" required name="auth" placeholder="6 digit code" class="form-control"  type="number" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="submit" type="submit">
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
 
  