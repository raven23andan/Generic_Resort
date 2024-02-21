	<?php
	if (isset($_POST['submit'])) {

		

		$user = new User();
		$user->UNAME 		= $_POST['name'];
		$user->USER_NAME 	= $_POST['username'];
		$user->User_Email 	= $_POST['emailadd'];
		$user->UPASS 		= sha1($_POST['pass']);
		$user->ROLE 		=  'Resort';
		$user->PHONE        = $_POST['phone'];
		$user->ADDRESS      = $_POST['address'];
		$imagePaths = [];
		foreach (['valid-id', 'bir'] as $inputName) {
			if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
				$targetDir = './resort/img_verification/';
				$targetFile = $targetDir . basename($_FILES[$inputName]['name']);
				

				if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
					$imagePaths[$inputName] = $targetFile;
				}
			}
		}
		$user->VALID_ID     = basename($_FILES['valid-id']['name']);
		$user->BIR     = basename($_FILES['bir']['name']);
		$istrue = $user->create();






		$email = trim($_POST['username']);
		$upass  = trim($_POST['pass']);
		$h_upass = sha1($upass);


		$user = new User();

		$res = $user::AuthenticateUser($email, $h_upass);

		if ($res == true) {
			redirect(WEB_ROOT . "admin/");
		}
	}
	?>
	<section class="contact-us">
		<div class="container">
			<div class="row">
				<div class="section-heading">
					<h2>Register Resort</h2>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8">




					<form class="form-horizontal" id="form-submit" action="" method="post" name="personal" enctype="multipart/form-data">

						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="name">RESORT NAME:</label>

								<div class="col-md-8">
									<input name="" type="hidden" value="">
									<input name="name" type="text" class="form-control " id="name" required onkeydown="return /[a-z, ]/i.test(event.key)" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="emailadd">E-MAIL:</label>

								<div class="col-md-8">
									<input name="emailadd" type="email" class="form-control " id="emailadd" oninput="this.setCustomValidity('')" />
								</div>
							</div>
						</div>



						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="username">USERNAME:</label>

								<div class="col-md-8">
									<input name="username" type="text" class="form-control " id="username" oninput="this.setCustomValidity('')" />
								</div>
							</div>
						</div>



						<div class="form-group" style="border-bottom: 1px grey solid; padding-bottom: 24px">
							<div class="col-md-12">
								<label class="col-md-3 " for="password">PASSWORD:</label>

								<div class="col-md-8">
									<input name="pass" type="password" class="form-control " id="password" oninput="this.setCustomValidity('')" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="phone">CONTACT NO:</label>

								<div class="col-md-8">
									<input required name="phone" type="text" class="form-control " id="phone" oninput="this.setCustomValidity('')" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="address">ADDRESS:</label>

								<div class="col-md-8">
									<input required name="address" type="text" class="form-control " id="address" oninput="this.setCustomValidity('')" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="valid-id">OWNER VALID ID (IMG):</label>

								<div class="col-md-8">
									<input required name="valid-id" type="file" class="form-control " id="valid-id" oninput="this.setCustomValidity('')" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="bir">BIR RECEIPT (IMG):</label>

								<div class="col-md-8">
									<input required name="bir" type="file" class="form-control " id="bir" oninput="this.setCustomValidity('')" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="zip">Terms:</label>

								<div class="col-md-8">
									<input type="checkbox" name="condition" value="checkbox" required value="" /> I
									<small>Agree the <a href="#" class="toggle-modal" onclick="OpenPopupCenter('./booking/terms_condition.php','Terms And Codition','600','600')"><b>TERMS AND CONDITION</b></a> of this Resort</small>
								</div>
							</div>
						</div>




						<div class="form-group">
							<div class="col-md-12">
								<label class="col-md-3 " for="zip"> </label>

								<div class="col-md-8">
									<input name="submit" type="submit" value="Confirm" class="btn btn-" onclick="return personalInfo();" />
								</div>
							</div>
						</div>






					</form>

				</div>

				<div class="col-md-2"></div>
			</div>
		</div>
	</section>