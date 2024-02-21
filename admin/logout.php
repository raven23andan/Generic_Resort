<?php
require_once("../includes/initialize.php");

unset( $_SESSION['ADMIN_ID'] );
unset( $_SESSION['ADMIN_UNAME'] );
unset( $_SESSION['ADMIN_USERNAME'] );
unset( $_SESSION['ADMIN_UPASS'] );
unset( $_SESSION['ADMIN_UROLE'] );

 	

redirect(WEB_ROOT ."index.php?logout=1");
?>