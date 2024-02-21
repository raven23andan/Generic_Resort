<?php
require_once("../includes/initialize.php");
if (!isset($_SESSION['m_cart'])) {
  
  redirect(WEB_ROOT . 'index.php');
}

$tot = 0;
$total_amount = 0;
$overalltotal = 0;
function createRandomPassword()
{

  $chars = "abcdefghijkmnopqrstuvwxyz023456789";

  srand((float)microtime() * 1000000);

  $i = 0;

  $pass = '';
  while ($i <= 7) {

    $num = rand() % 33;

    $tmp = substr($chars, $num, 1);

    $pass = $pass . $tmp;

    $i++;
  }

  return $pass;
}

$confirmation = createRandomPassword();
$_SESSION['confirmation'] = $confirmation;



$count_cart = count($_SESSION['m_cart']);




if (!isset($_SESSION['GUESTID'])) {

  $guest = new Guest();
  $guest->G_FNAME          = $_SESSION['name'];
  $guest->G_LNAME          = $_SESSION['last'];
  $guest->G_ADDRESS        = $_SESSION['address'];
  $guest->DBIRTH           = date_format(date_create($_SESSION['dbirth']), 'Y-m-d');
  $guest->G_PHONE          = $_SESSION['phone'];     
  $guest->EMAILADDRESS       = $_SESSION['emailadd'];
  $guest->G_TERMS          = 1;
  $guest->G_UNAME          = $_SESSION['username'];
  $guest->G_PASS           = sha1($_SESSION['pass']);
  $guest->ZIP              = $_SESSION['zip'];
  $guest->create();

  $lastguest = $mydb->insert_id();

  $_SESSION['GUESTID'] =   $lastguest;




}

$count_cart = count($_SESSION['m_cart']);


for ($i = 0; $i < $count_cart; $i++) {



  $reservation = new Reservation();
  $reservation->CONFIRMATIONCODE  = $_SESSION['confirmation'];
  $reservation->TRANSDATE         = date('Y-m-d h:i:s');
  $reservation->ROOMID            = $_SESSION['m_cart'][$i]['mroomid'];
  $reservation->ARRIVAL           = date_format(date_create($_SESSION['m_cart'][$i]['mcheckin']), 'Y-m-d H:i');
  $reservation->DEPARTURE         = date_format(date_create($_SESSION['m_cart'][$i]['mcheckout']), 'Y-m-d H:i');
  $reservation->RPRICE            = $_SESSION['m_cart'][$i]['mroomprice'];
  $reservation->GUESTID           = $_SESSION['GUESTID'];
  $reservation->PRORPOSE          = 'Travel';
  $reservation->REMARKS          = $_SESSION['m_cart'][$i]['mday'];
  $reservation->OCCUPANTS        = $_POST["occupants"];
  $reservation->PARTIAL           = $_POST["partial-payment"];
  if (isset($_POST['submit'])) {
    
    $reservation->STATUS            = 'Pending';
  } else {

    $reservation->STATUS            = 'Confirmed';
  }
  $reservation->ResortID            = $_SESSION['resortID'];
  $reservation->create();

  $roomid = $_SESSION['m_cart'][$i]['mroomid'];

  $sql = "SELECT * FROM tblroom WHERE ROOMID = $roomid";
  $mydb->setQuery($sql);
  $discount = $mydb->loadSingleResult();

  $tot += $_SESSION['m_cart'][$i]['mroomprice'] - ($_SESSION['m_cart'][$i]['mroomprice'] * $discount->Discount) - $_POST["partial-payment"];
}


if (isset($_SESSION['addons_cart'])) {
  
  $count_addons = count($_SESSION['addons_cart']);
  for ($i = 0; $i < $count_addons; $i++) {
    
    $sql1 = "SELECT `AddonsID`, `Addons`, `Price`, `AddonsType` FROM `tbladdons` WHERE `AddonsID`='" . $_SESSION['addons_cart'][$i]['id'] . "'";

    $mydb->setQuery($sql1);
    $ba = $mydb->loadSingleResult();
    $sql = "INSERT INTO `tblbookingaddons`(`BookingNo`, `RoomID`, `AddOns`, `Price`,`Qty`,`Total`) VALUES ('{$_SESSION['confirmation']}','{$_SESSION['addons_cart'][$i]['roomID']}','" . $ba->Addons . "','" . $ba->Price . "','" . $_SESSION['addons_cart'][$i]['qty'] . "','" . $_SESSION['addons_cart'][$i]['total'] . "')";
    $mydb->setQuery($sql);
    $mydb->executeQuery();

    $total_amount += $_SESSION['addons_cart'][$i]['total'];
  }
}

$item = count($_SESSION['m_cart']);


$overalltotal = $total_amount + $tot;
if (isset($_POST['submit'])) {
  
  $STATUS            = 'Pending';
} else {

  $STATUS            = 'Confirmed';
}
$sql = "INSERT INTO `tblpayment` (`TRANSDATE`,`CONFIRMATIONCODE`,`PQTY`, `GUESTID`, `SPRICE`,`MSGVIEW`,`STATUS`,ResortID)
       VALUES ('" . date('Y-m-d h:i:s') . "','" . $_SESSION['confirmation'] . "'," . $item . "," . $_SESSION['GUESTID'] . "," . $overalltotal . ",0,'" . $STATUS . "','" . $_SESSION['resortID'] . "')";
$mydb->setQuery($sql);
$mydb->executeQuery();



unsetSessions();

unset($_SESSION['m_cart']);
unset($_SESSION['pay']);
unset($_SESSION['pass']);
unset($_SESSION['resortID']);

?>

<script type="text/javascript">
  alert("Booking is successfully submitted!");
</script>

<?php

redirect(WEB_ROOT . "index.php");
?>