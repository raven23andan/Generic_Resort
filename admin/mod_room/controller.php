<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add':
		doInsert();
		break;

	case 'edit':
		doEdit();
		break;

	case 'editimage':
		editImg();
		break;

	case 'delete':
		doDelete();
		break;

	case 'insertgallery':
		doInsertImage();
		break;

	case 'deleteimages':
		doDeleteImage();
		break;

	case 'discount':
		doDiscount();
		break;
	
	case 'showRoom':
		showRoom();
		break;
	
	case 'hideRoom':
		hideRoom();
		break;
}
function doInsert()
{
	global $mydb;

	if (!isset($_FILES['image']['tmp_name'])) {
		message("No Image Selected!", "error");
		redirect("index.php?view=add");
	} else {

		$file = $_FILES['image']['tmp_name'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);

		if ($image_size == FALSE) {
			message("That's not an image!", "error");
			redirect("index.php?view=add");
		} else {

			$randnum = date('Ymdis') . rand(5, 30);

			$location = "rooms/" . $randnum . $_FILES["image"]["name"];

			if (file_exists($location)) {

				message("There is such an image. Please select another one!", "error");
				redirect("index.php?view=add");
			} else {
				move_uploaded_file($_FILES["image"]["tmp_name"], "rooms/" . $randnum . $_FILES["image"]["name"]);

				if ($_POST['ROOM'] == "" or $_POST['ROOMNUM'] == "" or $_POST['PRICE'] == "") {
					$messageStats = false;
					message("All fields required!", "error");
					redirect("index.php?view=add");
				} else {

					$room = new Room();

					$ROOMNUM = (isset($_POST['ROOMNUM']) && $_POST['ROOMNUM'] != '') ? $_POST['ROOMNUM'] : '';
					$PRICE = (isset($_POST['PRICE']) && $_POST['PRICE'] != '') ? $_POST['PRICE'] : 0;
					$type = (isset($_POST['Type']) && $_POST['Type'] != '') ? $_POST['Type'] : '';

					$room->ROOMNUM 		=	$_POST['ROOMNUM'];
					$room->ROOM 		=	$_POST['ROOM'];
					$room->ROOMDESC 	=	$_POST['ROOMDESC'];
					$room->NUMPERSON 	=	$_POST['NUMPERSON'];
					$room->ResortID     = $_SESSION['ADMIN_ID'];
					$room->AccomodationType 		=	$type;
					$room->ROOMIMAGE    =	 $location;
					$room->OROOMNUM 	=	$ROOMNUM;
					$room->type         = $_POST["type"];

					$istrue = $room->create();


					$roomID = $mydb->insert_id($istrue);
					echo $roomID;
					switch ($type) {
						case 'Room':

							$Price3hrs 		=	$_POST['Price3hrs'];
							$Price6hrs 		=	$_POST['Price6hrs'];
							$Price12hrs 		=	$_POST['Price12hrs'];
							$ExtendPerHour 		=	$_POST['ExtendPerHour'];

							$ratesType = 'Single';
							$weekRates = 'NotApplicable';


							$sql = "INSERT INTO tblpricing (`RoomID`, `Description`, `Prices`,`ConsumeHour`, `RatesType`, `AccomodationType`, `WeekRates`) VALUES ('$roomID','3 hours','{$Price3hrs}',3,'{$ratesType}','{$type}','{$weekRates}')";
							$mydb->setQuery($sql);
							$mydb->executeQuery();


							$sql = "INSERT INTO tblpricing (`RoomID`, `Description`, `Prices`,`ConsumeHour`,  `RatesType`, `AccomodationType`, `WeekRates`) VALUES ('$roomID','6 hours','{$Price6hrs}',6,'{$ratesType}','{$type}','{$weekRates}')";
							$mydb->setQuery($sql);
							$mydb->executeQuery();


							$sql = "INSERT INTO tblpricing (`RoomID`, `Description`, `Prices`,`ConsumeHour`,  `RatesType`, `AccomodationType`, `WeekRates`) VALUES ('$roomID','12 hours','{$Price12hrs}',12,'{$ratesType}','{$type}','{$weekRates}')";
							$mydb->setQuery($sql);
							$mydb->executeQuery();


							$sql = "INSERT INTO tblpricing (`RoomID`, `Description`, `Prices`,`ConsumeHour`,  `RatesType`, `AccomodationType`, `WeekRates`) VALUES ('$roomID','24 hours','{$PRICE}',24,'{$ratesType}','{$type}','{$weekRates}')";
							$mydb->setQuery($sql);
							$mydb->executeQuery();


							break;

						case 'Amenity':
						case 'Cottage':

							$ratesType = 'Single';
							$weekRates = 'NotApplicable';

							$sql = "INSERT INTO `tblpricing`(`RoomID`, `Description`, `Prices`, `RatesType`, `AccomodationType`, `WeekRates`,ConsumeHour) VALUES ('{$roomID}',' ','{$PRICE}','{$ratesType}','{$type}','{$weekRates}',0)";
							$mydb->setQuery($sql);
							$mydb->executeQuery();


							break;
					}




					if ($istrue == 1) {
						message("New [" . $_POST['ROOM'] . "] created successfully!", "success");
						redirect('index.php');
					} else {
						echo "yes";
					}
				}
			}
		}
	}
}

// }

function doDiscount()
{
	global $mydb;
	$id = $_POST["RoomID"];
	$discount_val = $_POST["discount_val"] / 100;

	$sql = "UPDATE tblroom SET Discount = $discount_val WHERE ROOMID = $id";
	$mydb->setQuery($sql);
	$mydb->executeQuery();
	redirect('index.php');
}


function doEdit()
{
	global $mydb;


	$type = (isset($_POST['Type']) && $_POST['Type'] != '') ? $_POST['Type'] : '';

	$room = new Room();

	if ($type != 'Private Pool' && $type != 'Function Hall') {
		$room->ROOM 		=	$_POST['ROOM'];
	}

	$room->ROOMDESC 	=	$_POST['ROOMDESC'];
	$room->NUMPERSON 	=	$_POST['NUMPERSON'];
	$room->type 	=	$_POST['type'];

	$room->update($_POST['ROOMID']);



	$PricingID =  $_POST['PricingID'];
	$prices = $_POST['Prices'];

	$key = count($PricingID);

	for ($i = 0; $i < $key; $i++) {

		$sql = "UPDATE `tblpricing` SET `Prices`='" . $prices[$i] . "' WHERE `PricingID`='" . $PricingID[$i] . "'";
		$mydb->setQuery($sql);
		$mydb->executeQuery();
	}






	message("Accomodation modified successfully!", "success");
	redirect('index.php');
}

function doDelete()
{
	global $mydb;

	@$id = $_POST['selector'];
	$key = count($id);


	for ($i = 0; $i < $key; $i++) {

		$rm = new Room();
		$rm->delete($id[$i]);

		$sql = "DELETE FROM `tblpricing` WHERE `RoomID`=" . $id[$i];
		$mydb->setQuery($sql);
		$mydb->executeQuery();
	}

	message("Room already Deleted!", "info");
	redirect('index.php');
}



function editImg()
{
	if (!isset($_FILES['image']['tmp_name'])) {
		message("No Image Selected!", "error");
		redirect("index.php?view=list");
	} else {
		$file = $_FILES['image']['tmp_name'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);

		if ($image_size == FALSE) {
			message("That's not an image!");
			redirect("index.php?view=list");
		} else {

			$randnum = date('Ymdis') . rand(5, 30);

			$location = "rooms/" . $randnum . $_FILES["image"]["name"];


			$rm = new Room();
			$rm_id		= $_POST['id'];

			move_uploaded_file($_FILES["image"]["tmp_name"], "rooms/" . $randnum . $_FILES["image"]["name"]);

			$rm->ROOMIMAGE = $location;
			$rm->update($rm_id);

			message("Room Image Upadated successfully!", "success");
			unset($_SESSION['id']);
			redirect("index.php");
		}
	}
}

function _deleteImage($catId)
{

	$deleted = false;


	$sql = "SELECT * 
            FROM room
            WHERE roomNo ";

	if (is_array($catId)) {
		$sql .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql .= " = {$catId}";
	}

	$result = dbQuery($sql);

	if (dbNumRows($result)) {
		while ($row = dbFetchAssoc($result)) {
			extract($row);

			$deleted = @unlink($roomImage);
		}
	}

	return $deleted;
}




function doInsertImage(){
	global $mydb;

		$id = $_POST['RoomID'];
		$caption = $_POST['caption'];

		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=list");
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE) {
				message("That's not an image!");
				redirect("index.php?view=list");
		   }else{
				
		
				$randnum = date('Ymdis').rand(5, 30);
				$location="rooms/".$randnum. $_FILES["image"]["name"]; 
			    move_uploaded_file($_FILES["image"]["tmp_name"],$location);
				 
				$sql = "INSERT INTO `tblgallery`( `RoomID`, `RoomImages`, `Caption`,`Category`) VALUES ('{$id}','{$location}','{$caption}','Rooms')";
				$mydb->setQuery($sql);
				$mydb->executeQuery();

				message("New Image saved successfully!", "success"); 
				redirect("index.php?view=gallery&id=".$id);
 			}
 		}
}

function doDeleteImage(){
	global $mydb;
	$id=$_GET['id']; 
	$roomid=$_GET['roomid']; 
		 $sql ="DELETE FROM `tblgallery` WHERE `GalleryID`='{$id}'";
		$mydb->setQuery($sql);
	    $mydb->executeQuery();

		message("Image already Deleted!","info");
		redirect('index.php?view=gallery&id='.$roomid);
}

function showRoom()
{
	@$id = $_POST['selector'];
	$key = count($id);


	for ($i = 0; $i < $key; $i++) {

		$rm = new Room();
		$rm->roomVisiblity($id[$i], 1);
	}

	message("Room already hidden!", "info");
	redirect('index.php');
}

function hideRoom()
{
	@$id = $_POST['selector'];
	$key = count($id);


	for ($i = 0; $i < $key; $i++) {

		$rm = new Room();
		$rm->roomVisiblity($id[$i], 0);
	}

	message("Room already hidden!", "info");
	redirect('index.php');
}
?>
