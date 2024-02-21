<?php 
if (!isset($_SESSION['m_cart'])) {

  redirect(WEB_ROOT.'index.php');
}



 ?> 
<?php    include("../banner-home.php");?>

    <div class="container">
        <div class="col-md-12">


 <div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1>
                 
            </h1> 
     </div> 
  </div>
 
  <div class="row">
    <div class="col-md-4">  <?php echo logintab(); ?></div>
    <div class="col-md-8"> 
      <div class="panel">
        <div class="panel-body">
        <?php  require_once 'personalinfo.php'; ?>

        </div>

      </div>
   </div>
  </div>


        </div>
      </div> 
 
 

 <?php

  function logintab(){

    ?>   
     <h2>Have already an account?</h2>
    <form  class="form-horizontal" action="<?php echo  WEB_ROOT."login.php" ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback" ></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
      </div>
      <div class="row"> 

          <button type="submit" name="gsubmit" class="btn btn- btn-block btn-flat">Sign In</button> 
      </div>
    </form>  
 
 

<?php
  }
 ?>

  