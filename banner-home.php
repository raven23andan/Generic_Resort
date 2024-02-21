<?php

if (isset($_GET['id'])) {

    $_SESSION['resortID'] = isset($_GET['id']) ? $_GET['id'] : '';
}

$resortID = $_SESSION['resortID'];
?>
<?php
$sql = "SELECT * FROM `tbluseraccount` WHERE `USERID`='{$resortID}'";
$mydb->setQuery($sql);
$single_resort = $mydb->loadSingleResult();
?>
<?php
$sql = "SELECT `ID`, `DESCRIPTION`, `TYPE` FROM `tblsettings` WHERE ResortID='{$resortID}' AND TYPE='Facebook'";
$mydb->setQuery($sql);
$fb = $mydb->loadSingleResult();


$sql = "SELECT `ID`, `DESCRIPTION`, `TYPE` FROM `tblsettings` WHERE ResortID='{$resortID}' AND TYPE='Instagram'";
$mydb->setQuery($sql);
$int = $mydb->loadSingleResult();

$sql = "SELECT `ID`, `DESCRIPTION`, `TYPE` FROM `tblsettings` WHERE ResortID='{$resortID}' AND TYPE='About Us'";
$mydb->setQuery($sql);
$about = $mydb->loadSingleResult();


$sql = "SELECT `ID`, `DESCRIPTION`, `TYPE` FROM `tblsettings` WHERE ResortID='{$resortID}' AND TYPE='Contact Us'";
$mydb->setQuery($sql);
$contact = $mydb->loadSingleResult();

$sql = "SELECT `ID`, `DESCRIPTION`, `TYPE` FROM `tblsettings` WHERE ResortID='{$resortID}' AND TYPE='FAQ'";
$mydb->setQuery($sql);
$faq = $mydb->loadSingleResult();



$sql = "SELECT `ID`, `DESCRIPTION`, `TYPE` FROM `tblsettings` WHERE ResortID='{$resortID}' AND TYPE='Map'";
$mydb->setQuery($sql);
$map = $mydb->loadSingleResult();



?>

<div class="panel panel-default" style="border: 2px solid #ddd;margin-top: 50px;margin-bottom: 0px;  position: -webkit-sticky;
  position: sticky;
  top: 0;z-index: 9999;">
    <div class="panel-body">
        <div class="col-md-2">
            <div class="logo" style="text-align:center">
                <a rel="noopener" href="<?php echo WEB_ROOT; ?>index.php?p=resorts">
                    <img width="100px" heigth="100px" class="img-rounded" src="<?php echo WEB_ROOT; ?>admin/mod_users/<?php echo $single_resort->Logo; ?>"><br />
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="submit-form  ">
                <form id="form-submit" action="<?php echo  WEB_ROOT; ?>index.php?p=availability" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-2">
                            <i for="arrival">Check-in date:</i>
                            <input name="arrival" type="text" class="form-control date" id="arrival" placeholder="Select date..." required onchange='this.form.()' value="<?php echo isset($_SESSION['arrival']) ? date_format(date_create($_SESSION['arrival']), "m/d/Y")   : ''; ?>">
                        </div>
                        <div class="col-md-2" style="margin:0;padding: 0;">
                            <i for="start_time">Time:</i>
                            <input type="text" id="start_time" class="form-control" name="start_time" autocomplete="off" value="<?php echo isset($_SESSION['start_time']) ? date_format(date_create($_SESSION['start_time']), "h:i a") : '' ?>" />
                        </div>
                        <div class="col-md-2">
                            <i for="departure">Check-out date:</i>
                            <input name="departure" type="text" class="form-control date" id="departure" placeholder="Select date..." required onchange='this.form.()' value="<?php echo isset($_SESSION['departure']) ? date_format(date_create($_SESSION['departure']), "m/d/Y") : ''; ?>">
                        </div>
                        <div class="col-md-2" style="margin:0;padding: 0;">
                            <i for="end_time">Time:</i>
                            <input type="text" id="end_time" class="form-control" name="end_time" autocomplete="off" value="<?php echo isset($_SESSION['end_time']) ? date_format(date_create($_SESSION['end_time']), "h:i a") : '' ?>" />
                        </div>
                        <div class="col-md-2">
                            <i>Person (PAX):</i>
                            <input type="number" id="person"  required name='person' onchange='this.form.()' min="1" class="form-control" value="<?php echo isset($_SESSION['person']) ?  $_SESSION['person'] : '1' ?>">
                        </div>
                        <div class="col-md-2">
                            <fieldset>
                                <i for="booknowA">&nbsp;</i>
                                <button type="submit" id="booknowA" name="booknowA" class="btn">UPDATE</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2">
            <!--<fieldset>   -->
            <!--     <br/>-->
            <!--     <a style="text-decoration: "    title="Booking Cart"  href="<?php echo WEB_ROOT . 'booking/index.php?p=resorts&id=' . $resortID;  ?>"> -->
            <!--      <i class="fa fa-shopping-cart fa-fw " > </i> -->
            <!--     <span class="label label-danger"><?php echo  isset($cart) ? $cart : 0; ?> </span>-->
            <!--    </a>-->
            <!--   </fieldset>-->
        </div>
    </div>

</div>
<style type="text/css">
    .title-text {
        text-align: center;
        padding-top: 55px;
        font-weight: bold;
        font-size: 30px;
        color: #fff;
        text-shadow: 1px 1px 1px rgba(252, 222, 100, 5);
        text-shadow: 1px 1px 1px rgba(252, 222, 100, 5);
        
    }

    #top {
        min-height: 350px;
        background: #FFED00 #FF0000;
    }



    .stretch img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #top #owl-suiteroom {
        width: 100%;
        height: 600px;
    }

    #owl-suiteroom .owl-pagination {
        display: none;
    }
</style>

<section class="banner" id="top">
    <div class="row resort-landing-page" style="display: flex; flex-direction: column">
        <div class="col-md-7" style="margin:0px;padding:0px; width: 100%">
            <div id="owl-suiteroom" class="owl-carousel owl-theme">
                <?php
                $sql = "SELECT * FROM `tblgallery` g,`tblroom` r WHERE g.RoomID=r.ROOMID AND ResortID='{$resortID}'";
                $mydb->setQuery($sql);
                $maxrow = $mydb->num_rows($mydb->executeQuery());
                if ($maxrow > 0) {
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $image) {
                ?>
                        <div class="item">
                            <div class="suiteroom-item stretch">
                                <img src="<?php echo WEB_ROOT; ?>admin/mod_room/<?php echo $image->RoomImages; ?>" alt="" width="100%" height="100%">
                            </div>
                        </div>

                    <?php
                    }
                } else {
                    ?>
                    <div class="item">
                        <div class="suiteroom-item stretch">
                            <img src="<?php echo WEB_ROOT; ?>admin/mod_users/<?php echo $single_resort->Logo; ?>" alt="">
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-5" style="position: absolute; margin: 0px; margin-top: -210px; padding:0px; width: 100%; background-color: none">
                <div class="left-side" style="background-color: rgba(0, 0, 0, .5);">
                    <div class="logo">
                        <p class=" title-text"><?php echo $single_resort->UNAME; ?></p>

                    </div>
                    <div class="tabs-content" style="padding-bottom:10px; margin: 0">
                        <ul class="social-links" style="margin: auto; width: fit-content; padding: 12px 0 38px 0; display:flex; flex-direction: row; justify-content: center">
                            <?php
                            if (!$fb == null) {
                                echo '<li style="width: fit-content; margin: 0 8px"><a target="_blank" href="'.  $fb->DESCRIPTION . '" style="padding: 0"><i class="fa fa-facebook"></i></a></li>';
                            }

                            if (!$int == null) {
                                echo '<li style="width: fit-content; margin: 0 8px"><a target="_blank" href="' . $int->DESCRIPTION . '" style="padding: 0"><i class="fa fa-instagram"></i></a></li>';
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>


</section>