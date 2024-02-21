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
}

function doInsert()
{
    global $mydb;

    $food_name = $_POST["name"];
    $food_desc = $_POST["description"];
    $food_price = $_POST["price"];

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

            $location = "./food/" . $_FILES["image"]["name"];
            if (file_exists($location)) {
                message("Image name already exist!. Please select another one!", "error");
                redirect("index.php?view=add");
            } else {
                move_uploaded_file($_FILES["image"]["tmp_name"], $location);

                if ($_POST['name'] == "" or $_POST['description'] == "") {
                    message("All fields required!", "error");
                    redirect("index.php?view=add");
                } else {
                    $sql = "SELECT* FROM tblfood WHERE food_name='{$food_name}' AND resort_id='{$_SESSION['ADMIN_ID']}'";
                    $mydb->setQuery($sql);
                    $res = $mydb->num_rows($mydb->executeQuery());

                    if ($res >= 1) {
                        message("Food already exist!", "error");
                        redirect("index.php?view=add");
                    } else {
                        $resort_id = $_SESSION['ADMIN_ID'];
                        $sql = "INSERT INTO tblfood(food_name, price, description, img, resort_id) VALUES('$food_name', $food_price, '$food_desc', '$location', $resort_id)";
                        $mydb->setQuery($sql);
                        $mydb->executeQuery();

                        message("New [" . $food_name . "] created successfully!", "success");
                        redirect('index.php');
                    }
                }
            }
        }
    }
}


function doEdit()
{
    global $mydb;

    $food_name = $_POST["name"];
    $food_desc = $_POST["description"];
    $food_price = $_POST["price"];
    $food_id = $_POST["id"];

    $sql = "UPDATE tblfood SET food_name = '$food_name', price = $food_price, description = '$food_desc' WHERE id = $food_id";
    $mydb->setQuery($sql);
    $mydb->executeQuery();



    message("New [" . $food_name . "] Upadated successfully!", "success");
    redirect('index.php');
}

function doDelete()
{
    global $mydb;

    @$id = $_POST['selector'];
    $key = count($id);
    

    for ($i = 0; $i < $key; $i++) {
        $sql = "DELETE FROM tblfood WHERE id = '$id[$i]'";
        $mydb->setQuery($sql);
        $mydb->executeQuery();
    }

    message("Food selected are deleted!", "info");
    redirect('index.php');
}


function editImg()
{
    global $mydb;
    $id = $_POST['id'];
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
            $location = "food/" . $_FILES["image"]["name"];
            $sql = "UPDATE tblfood SET img = '$location' WHERE id = $id";
            $mydb->setQuery($sql);
            $mydb->executeQuery();

            move_uploaded_file($_FILES["image"]["tmp_name"], "food/" . $_FILES["image"]["name"]);


            message("Food Image Updated successfully!", "success");
            redirect("index.php");
        }
    }
}
