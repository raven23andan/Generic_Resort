<?php
$guest = new Guest();
$res = $guest->single_guest($_SESSION['GUESTID']);


?>
<style>
  .btns {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    text-decoration: none;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
  }

  .h4 {
    white-space: normal;
    font-weight: bold;

    font-size: 14px;
  }

  a:hover {
    text-decoration: none;
  }
</style>
<section class="services">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="panel panel-primary">
          <div class="panel-heading">Profile</div>
          <div class="panel-body">
            <section id="first-tab-group" class="tabgroup">
              <div id="tab1">
                <div class="submit-form">
                  <div class="col-md-12">
                    <fieldset>
                      <p for="arrival">Fullname: </p>
                      <p class="h4"><?php echo $res->G_FNAME . ' ' . $res->G_LNAME; ?></p>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <p for="">Address:</p>

                      <p class="h4"><?php echo $res->G_ADDRESS; ?></p>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <p for="">Contact Number:</p>

                      <p class="h4"><?php echo $res->G_PHONE; ?></p>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <p for="">Email Address:</p>

                      <p class="h4"><?php echo $res->EMAILADDRESS; ?></p>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <p for="">Username:</p>

                      <p class="h4"><?php echo $res->G_UNAME; ?></p>
                    </fieldset>
                  </div>

                </div>
                </form>
              </div>
          </div>
        </div>

      </div>
      <div class="col-md-9">
        <?php require_once $content_profile; ?>
      </div>
    </div>
  </div>
</section>