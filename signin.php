<?php 
 $view_form = isset($_GET['q']) ? $_GET['q'] : '';
 ?>
<style type="text/css">
.stretch {
    margin-bottom: 30px;
}
  .stretch a {
    text-align:center;margin:0px;padding:20px;width:100%
  }
  .actives {
    background-color: #19222C;
    color: #fff;
  }
</style>
<section class="contact-us">
        <div class="container">
            <div class="row">
                        
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Sign In</h2>
                </div>
                    </div>
                <div class="col-md-4"></div>
                <div class="col-md-4" >  
                    <div class="row">
                        <div class="col-md-6 stretch">
                                    <a class="btn <?php echo ($view_form=='guest') ? 'active  actives' : '';?>"   href="<?php echo WEB_ROOT; ?>index.php?p=login&q=guest" class="  "  >Login Guest</a> 
                        </div> 
                        <div class="col-md-6 stretch"> 
                                    <a class="btn <?php echo ($view_form=='resort') ? 'active  actives' : '';?>"   href="<?php echo WEB_ROOT; ?>index.php?p=login&q=resort" class=" ">Login Resort</a>   
                        </div> 
                    </div>

                        <?php check_message();?>
                  <div class="panel panel-success">
                    <div class="panel-heading">LOGIN <?php echo strtoupper($view_form);?>
                 </div>
                    <div class="panel-body">
                      <div class="col-md-12">
                        <?php if($view_form=='resort'){ ?>
                        <form  class="form-horizontal" action="<?php echo  WEB_ROOT."login.php?token=resort" ?>" method="post">
                         <?php } ?>

                        <?php if($view_form=='guest'){ ?>
                        <form  class="form-horizontal" action="<?php echo  WEB_ROOT."login.php?token=guest" ?>" method="post">
                         <?php } ?>
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <span class="glyphicon glyphicon-user form-control-feedback" ></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
                          </div>
                          <div class="row"> 
                            
                              <button type="submit" name="lsubmit" class="btn " style="width:100%">Sign In</button> 
                          </div>
                        </form>  
                        
                      </div>
                <div class="col-md-4">  </div>
                    </div>
                    <div class="panel-footer">
                        <a href="reset-password.php">Reset Password</a>
                    </div>
                  </div>

             
                </div>
            </div>
        </div>
    </section>
