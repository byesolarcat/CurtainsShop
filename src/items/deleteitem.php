<?php
require dirname(__DIR__) . '/db.php';
if ($_COOKIE['isadmin'] == 0)
    header("Location: /");
$itemid=$_GET['item'];
$category=$_GET['category'];
mysqli_query($link,"DELETE FROM `items` WHERE `id`='$itemid'");
echo '<script>window.location.href = "/items.php?category='.$category.'";</script>';
?>