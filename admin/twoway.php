<?php
require_once("../includes/initialize.php");

?>
<style type="text/css">
    .form-gap {
        padding-top: 70px;
    }

    .container{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<head>
    <title>The Generic Resort</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-envelope fa-4x"></i></h3>
                        <?php echo isset($_GET["error"]) ? '<p class="label-danger" style="color:#fff">Code is not correct</p>' : '' ?>
                        <h2 class="text-center">Email Verification</h2>
                        <p>Your verification code has been sent in your email account!</p>
                        <div class="panel-body">

                            <form id="register-form" role="form" class="form" method="post" action="verify-twoway.php">

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="">G-</i></span>
                                        <input id="auth" required name="auth" placeholder="6 digit code" class="form-control" type="text" value="">
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