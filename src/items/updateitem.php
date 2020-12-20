<?php
require dirname(__DIR__) . '/db.php';
if ($_COOKIE['isadmin'] == 0)
    header("Location: /");
$itemid = $_GET['item'];
if (isset($_POST['name'])) {
    $name = trim($_POST['name']);
    $category = intval($_POST['category']);
    $price = floatval($_POST['price']);
    
    if ($_FILES['image']['error'] == 0) {
		$image  = $_FILES['image']['tmp_name'];
		if (isset($image)) {
			if (!move_uploaded_file($image, '../../img/items/' . $_FILES['image']['name'])) {
				die('При записи изображения на диск произошла ошибка.');
			}
		}
        $image = $_FILES['image']['name'];
        if ($_GET['action'] == "edit")
		    mysqli_query($link, "UPDATE `items`
		    		SET name = '$name', price = '$price', Category = $category , image = '$image'
                    WHERE id = $itemid");
        else if ($_GET['action'] == "add")
            mysqli_query($link, "INSERT INTO `items`(name, price, category, image)
                                    VALUES('$name', $price, $category ,'$image')");
	} else {
        if ($_GET['action'] == "edit")
		mysqli_query($link, "UPDATE `items`
				SET name = '$name', price = $price, Category = $category
                WHERE id = $itemid");
        else if ($_GET['action'] == "add")
            mysqli_query($link, "INSERT INTO `items`(name, price, category, image)
                                    VALUES('$name', $price, $category)");
    }
    echo '<script>window.location.href = "/items.php?category='.$category.'";</script>';
}
?>