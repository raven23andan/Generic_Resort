<style type="text/css">


	.stretch {
		min-height: 450px;
		font-size: 12px;
	}

	.stretch>.chart {
		width: 100%;
	}

	.stretch1 {
		min-height: 450px;
		font-size: 12px;
	}

	.stretch1>.chart1 {
		width: 100%;
	}
</style>
<style type="text/css">
	.gold {
		color: gold;
	}

	.rating {
		float: left;
	}


	.rating:not(:checked)>input {
		position: absolute;
		clip: rect(0, 0, 0, 0);
		height: 0;
		width: 0;
		overflow: hidden;
		opacity: 0;
	}

	.rating:not(:checked)>label {
		float: right;
		width: 1em;
		padding: 0 .1em;
		overflow: hidden;
		white-space: nowrap;
		cursor: pointer;
		font-size: 200%;
		line-height: 1.2;
		color: #ddd;
		text-shadow: 1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0, 0, 0, .5);
	}

	.rating:not(:checked)>label:before {
		content: '★ ';
	}

	.rating>input:checked~label {
		color: #f70;
		text-shadow: 1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0, 0, 0, .5);
	}

	.rating:not(:checked)>label:hover,
	.rating:not(:checked)>label:hover~label {
		color: gold;
		text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
	}

	.rating>input:checked+label:hover,
	.rating>input:checked+label:hover~label,
	.rating>input:checked~label:hover,
	.rating>input:checked~label:hover~label,
	.rating>label:hover~input:checked~label {
		color: #ea0;
		text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
	}

	.rating>label:active {
		position: relative;
		top: 2px;
		left: 2px;
	}

	.tableRating tr td {
		padding: 5px 20px;

	}

	.line-row {
		border-bottom: 1px solid #939EA6;
		padding-bottom: 10px;
	}
</style>

<?php

if (isset($_GET['rateID'])) {
	# code...
	$rateID = $_GET['rateID'];
	$resortID = $_GET['id'];
	$sql = "DELETE FROM `tblrating` WHERE `RatingID`='{$rateID}'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	redirect(WEB_ROOT . 'admin/index.php');
}
?>

<div class="container">

	<div class="row  col-md-12">
		<div class="col-md-4">

			<?php
			if ($_SESSION['ADMIN_UROLE'] == 'Administrator') {
				
				$sql = "SELECT count(*) as comment, SUM(RatingNo) as Ratings, UNAME FROM `tblrating`,tbluseraccount where USERID=StoreID GROUP BY StoreID";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$maxrow = $mydb->num_rows($cur);
				if ($maxrow > 0) {
					$cur = $mydb->loadResultList();

					foreach ($cur as $rating) {
			?>

						<div class="card radius-10 bg-info bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Ratings </p>
										<h4 class="my-1 text-white font-35">

											<?php
											if ($rating->Ratings >= 100) {
												
												$ratings = (100 * 5) / 100;
											} else {
												$ratings = ($rating->Ratings * 5) / 100;
											}


											echo  $ratings;



											?>
										</h4>
										<p class="mb-0 text-white"><?php echo $rating->UNAME; ?></p>
									</div>
									<div class="text-white ms-auto font-35"><i class="glyphicon glyphicon-star gold"></i>
									</div>
								</div>
							</div>
						</div>
				<?php }
				}
			} else {
				$sql = "SELECT count(*) as comment, SUM(RatingNo) as Ratings FROM `tblrating` WHERE `StoreID`=" . $_SESSION['ADMIN_ID'] . " GROUP BY StoreID;";

				?>
				<div class="card radius-10 bg-info bg-gradient">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white">Ratings </p>
								<h4 class="my-1 text-white font-35">

									<?php
									$mydb->setQuery($sql);
									$cur = $mydb->executeQuery();
									$maxrow = $mydb->num_rows($cur);
									if ($maxrow > 0) {
										
										$rating = $mydb->loadSingleResult();
										echo   $rating->comment;
										echo  '<br/>';
									} else {

										echo  0;
									}




									?>
								</h4>
								<p></p>
							</div>
							<div class="text-white ms-auto font-35"><i class="glyphicon glyphicon-star gold"></i>
							</div>
						</div>
					</div>
				</div>


			<?php	}
			?>
			<?php
			if ($_SESSION['ADMIN_UROLE'] == 'Administrator') {
				
				$sql = "SELECT count(*) as comment, SUM(RatingNo) as Ratings, UNAME FROM `tblrating`,tbluseraccount where USERID=StoreID GROUP BY StoreID";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$maxrow = $mydb->num_rows($cur);
				if ($maxrow > 0) {
					$cur = $mydb->loadResultList();

					foreach ($cur as $rating) {
			?>

						<div class="card radius-10 bg-success bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Feedback </p>
										<h4 class="my-1 text-white font-35">

											<?php

											echo   $rating->comment;
											echo  '<br/>';



											?>
										</h4>
										<p class="mb-0 text-white"><?php echo $rating->UNAME; ?></p>
									</div>
									<div class="text-white ms-auto font-35"><i class="glyphicon glyphicon-comment "></i>
									</div>
								</div>
							</div>
						</div>
				<?php }
				}
			} else {
				$sql = "SELECT count(*) as comment, SUM(RatingNo) as Ratings FROM `tblrating` WHERE `StoreID`=" . $_SESSION['ADMIN_ID'] . " GROUP BY StoreID;";

				?>
				<div class="card radius-10 bg-success bg-gradient">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white">Feedback </p>
								<h4 class="my-1 text-white font-35">

									<?php
									$mydb->setQuery($sql);
									$cur = $mydb->executeQuery();
									$maxrow = $mydb->num_rows($cur);
									if ($maxrow > 0) {
										
										$rating = $mydb->loadSingleResult();
										echo   $rating->comment;
										echo  '<br/>';
									} else {

										echo  0;
										echo  '<br/><i style ="font-size:20px;min-height:550px" class=""></i>';
									}




									?>
								</h4>
								<p></p>
							</div>
							<div class="text-white ms-auto font-35"><i class="glyphicon glyphicon-comment "></i>
							</div>
						</div>
					</div>
				</div>


			<?php	}
			?>

		</div>
		<div class="col-md-8">
			<div class="card radius-10">

				<div class="card-body direct-chat" style="overflow-x: hidden;height: 200px;">
					<h4 class="mb-0">Recent comments</h4>
					<p class="fw-light mb-4 pb-2">Latest Comments section by users</p>


					<?php
					if ($_SESSION['ADMIN_UROLE'] == 'Administrator') {
						
						$sql = "SELECT * FROM `tblrating` , `tbluseraccount`,tblguest WHERE StoreID=`USERID` AND Customer_Username=G_UNAME";
					} else {
						$sql = "SELECT * FROM `tblrating` , `tbluseraccount`,tblguest WHERE StoreID=`USERID` AND Customer_Username=G_UNAME AND `StoreID`=" . $_SESSION['ADMIN_ID'];
					}


					
					$mydb->setQuery($sql);
					$maxrow = $mydb->num_rows($mydb->executeQuery());
					if ($maxrow > 0) {
						
						$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
					?>


							<div class="container ">
								<div class="row d-flex justify-content-center">
									<div class="col-md-12  ">
										<div class="card">
											<div class="card-body">

												<div class="d-flex flex-start align-items-center">
													<img class="rounded-circle shadow-1-strong me-3" src="https://www.shareicon.net/data/128x128/2016/06/10/586098_guest_512x512.png" alt="avatar" width="60" height="60" />
													<div>
														<h6 class="fw-bold text-primary mb-1"><?php echo $result->G_UNAME ?></h6>
														<p class="text-muted small mb-0">
															Shared publicly - <?php echo date_format(date_create($result->RateDate), 'M. d, Y') ?> | <?php for ($i = 0; $i < $result->RatingNo; $i++) { ?>
																<i class="glyphicon glyphicon-star gold"></i>
															<?php } ?>


															<a href="index.php?rateID=<?php echo $result->RatingID; ?>" class=" ">
																<i class="glyphicon glyphicon-trash ">Remove</i>
															</a>
														</p>
													</div>
												</div>

												<p class="mt-3 mb-4 pb-2">
													<?php echo $result->FeedBack ?>
												</p>
												<?php if ($_SESSION['ADMIN_UROLE'] == 'Administrator') { ?>
													<div class="small d-flex justify-content-start">
														<?php echo $result->UNAME; ?>
														<a href="index.php?rateID=<?php echo $result->RatingID; ?>" class="d-flex align-items-center me-3">
															<i class="glyphicon glyphicon-trash me-2"></i>
															<p class="mb-0">Remove</p>
														</a>
														<a href="#!" class="d-flex align-items-center me-3">
															<i class="far fa-comment-dots me-2"></i>
															<p class="mb-0"><?php echo $result->UNAME; ?></p>
														</a>
														<a href="#!" class="d-flex align-items-center me-3">
															<i class="fas fa-share me-2"></i>
															<p class="mb-0">Share</p>
														</a>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--  <div class="contacts-list-msg ">
								                  <div class="direct-chat-msg">
								                    <div class="direct-chat-success clearfix">
								                      <span class="direct-chat-name"><?php echo $result->G_UNAME ?></span>
								                      <span class="direct-chat-timestamp pull-right"><?php for ($i = 0; $i < $result->RatingNo; $i++) { ?>
								                                     <i   class="glyphicon glyphicon-star gold"></i>
								                          <?php } ?><a href="index.php?rateID=<?php echo $result->RatingID; ?>" title="Remove"><i class=" direct-chat-danger glyphicon glyphicon-trash"></i></a></span>
								                    </div> 
								                    <img class="direct-chat-img" src="https://www.shareicon.net/data/128x128/2016/06/10/586098_guest_512x512.png" alt="Message User Image"> <div class="direct-chat-text">
								                         <?php echo $result->FeedBack ?>
								                    </div> 
								                  </div> 
												</div> -->
					<?php  }
					} else {
						echo 'No Data Available';
					} ?>

				</div>
			</div>
		</div>



	</div>

	<div class="row  col-md-12" style="display: flex; flex-direction: row; gap: 8px">
		<?php 
		$sql2 = "SELECT
		ROUND(AVG(food), 1) AS average_food,
  		ROUND(AVG(rooms), 1) AS average_rooms,
  		ROUND(AVG(amenity), 1) AS average_amenity
	  	FROM tblresortrating WHERE resort_id = " . $_SESSION['ADMIN_ID'];
		$mydb->setQuery($sql2);
		$cur2 = $mydb->executeQuery();
		$cur2 = $mydb->loadSingleResult();
		?>
		<div class="card radius-10 bg-primary bg-gradient" style="flex-grow: 1; width: auto !important">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-white">Foods </p>
						<h4 class="my-1 text-white font-35">
							<?php
								echo $cur2->average_food;
							?>
						</h4>
					</div>
					<div class="text-white ms-auto font-35"><i class="glyphicon glyphicon-star gold"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="card radius-10 bg-primary bg-gradient" style="flex-grow: 1; width: auto !important">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-white">Rooms/Cottages </p>
						<h4 class="my-1 text-white font-35">
							<?php
								echo $cur2->average_rooms;
							?>
						</h4>
					</div>
					<div class="text-white ms-auto font-35"><i class="glyphicon glyphicon-star gold"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="card radius-10 bg-primary bg-gradient" style="flex-grow: 1; width: auto !important">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-white">Amenities </p>
						<h4 class="my-1 text-white font-35">
							<?php
								echo $cur2->average_amenity;
							?>
						</h4>
					</div>
					<div class="text-white ms-auto font-35"><i class="glyphicon glyphicon-star gold"></i>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="col-md-12">
		<div class="panel panel-primary radius-10">
			<div class="panel-heading text-right">
				<span class="pull-left">Statistic
				</span>

				Total Sales:
				<select class="input-sm" name="dateFilter" id="dateFilter">
					<option value="">12 months</option>
					<?php for ($i = 1; $i <= 12; $i++) {
						$month_name = date('F', mktime(0, 0, 0, $i, 28, date('Y')));
						echo '<option value=' . $i . '>' . $month_name . '</option>';
					} ?>
				</select>
				Most Booked Rooms:
				<select class="input-sm" name="monthFilter" id="monthFilter">
					<option value="">12 months</option>
					<?php for ($i = 1; $i <= 12; $i++) {
						$month_name = date('F', mktime(0, 0, 0, $i, 28, date('Y')));
						echo '<option value=' . $i . '>' . $month_name . '</option>';
					} ?>
				</select>
			</div>
			<div class="panel-body stretch">
				<div class="chart" id="chartContainer"></div>
			</div>
		</div>
	</div>

	<div class="col-md-12" style="display: none">
		<div class="panel panel-primary radius-10">
			<div class="panel-heading text-right">
				<span class="pull-left">Statistic
				</span>

			</div>
			<div class="panel-body stretch1">
				<div class="chart1" id="chartContainer1"></div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-primary radius-10">
			<div class="panel-heading text-center" style="font-size: 18px;">
				<b>Food Ordered</b>
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Food Name</th>
							<th>Total Quantity</th>
							<th>Total Income</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$id = $_SESSION['ADMIN_ID'];
						$sql2 = "SELECT
									tblfood.food_name,
									SUM(quantity) AS total_quantity,
									SUM(total_price) AS total_price_sum,
									tblroom.ResortID,
									code,
									status,
									order_date
								FROM tblfoodorders
								INNER JOIN tblfood ON tblfood.id = tblfoodorders.food_id
								INNER JOIN tblroom ON tblroom.ROOMID = tblfoodorders.room_id
								WHERE status = 'Approved' AND ResortID = $id
								GROUP BY food_id;";
						$mydb->setQuery($sql2);
						$cur = $mydb->executeQuery();
						$row_count = $mydb->num_rows($cur);
						if ($row_count >= 1) {
							$food = $mydb->loadResultList();
							foreach ($food as $foodOrdered) {
						?>
								<tr>
									<td><?php echo $foodOrdered->food_name ?></td>
									<td><?php echo $foodOrdered->total_quantity ?></td>
									<td><?php echo $foodOrdered->total_price_sum ?></td>
								</tr>
						<?php
							}
						}
						?>

					</tbody>
				</table>
			</div>
		</div>
	</div>


</div>