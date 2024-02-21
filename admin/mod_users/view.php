<?php
$id = $_SESSION['ADMIN_ID'];
$user = new User();
$result = $user->single_user($id);


?>
<style>
  .fit img {
    width: 100%;
    height: 200px;
  }
</style>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center  ">
            <a href="#" class="logo-modal fit">
              <img src="<?php echo WEB_ROOT . 'admin/mod_users/' . $result->Logo; ?>" alt="avatar" class="rounded-circle img-fluid">
            </a>

            <h5 class=" "><?php echo $result->UNAME; ?></h5>
          </div>
        </div>

      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <form class="form-horizontal  span6" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">

              <div>Account Details</div>


              <div class="form-group">
                <div class="col-md-10">
                  <label class="col-md-4 control-label" for="name">Company Name:</label>

                  <div class="col-md-8">
                    <input name="USERID" type="hidden" value="<?php echo $result->USERID; ?>">
                    <input class="form-control input-sm" id="name" name="UNAME" placeholder="Company Name" type="text" value="<?php echo $result->UNAME; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <label class="col-md-4 control-label" for="username">Username:</label>

                  <div class="col-md-8">
                    <input class="form-control input-sm" id="username" name="USERNAME" placeholder="Username" type="text" value="<?php echo $result->USER_NAME; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <label class="col-md-4 control-label" for="username">Email:</label>

                  <div class="col-md-8">
                    <input class="form-control input-sm" id="email" name="EMAIL" placeholder="Email" type="email" value="<?php echo $result->User_Email; ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <label class="col-md-4 control-label" for="username">Update Valid ID:</label>

                  <div class="col-md-8">
                    <input type="file" class="form-control input-sm" id="valid-id" name="valid-id" placeholder="Valid Id" value="../../resort/img_verification/<?php echo $result->VALID_ID ?>">
                    <a target="_blank" href="../../resort/img_verification/<?php echo $result->VALID_ID ?>" style="margin: 0; margin-top: 2px; font-size: 10px">View Current Attachment</a>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <label class="col-md-4 control-label" for="username">Update BIR Proof:</label>

                  <div class="col-md-8">
                    <input type="file" class="form-control input-sm" id="bir" name="bir" placeholder="Bir" value="../../resort/img_verification/<?php echo $result->BIR ?>">
                    <a target="_blank" href="../../resort/img_verification/<?php echo $result->BIR ?>" style="margin: 0; margin-top: 2px; font-size: 10px">View Current Attachment</a>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <label class="col-md-4 control-label" for="username">2 Way Authentication:</label>

                  <div class="col-md-8">
                    <select name="twoWay" class="p-2">
                      <option value="1" <?php echo $result->twoWayAuth === '1' ? "selected" : "" ?>>Enabled</option>
                      <option value="0" <?php echo $result->twoWayAuth === '0' ? "selected" : "" ?>>Disabled</option>
                    </select>
                  </div>
                </div>
              </div>



              <div class="form-group">
                <div class="col-md-10">
                  <label class="col-md-4 control-label" for="idno"></label>

                  <div class="col-md-8">
                    <a href="../index.php"><button type="button" name="btn_update_account" class="btn btn-danger">Cancel</button></a>
                    <button type="submit" name="btn_update_account" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>



            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>