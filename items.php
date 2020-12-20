<?php require 'src/db.php';
$category = $_GET['category'];
$items = mysqli_query($link, "SELECT * FROM `items` WHERE `category`=$category");
$categoryName = mysqli_fetch_assoc(mysqli_query($link, "SELECT `title` FROM `categories` WHERE `id`=$category"))['name'];
$count = mysqli_fetch_assoc(mysqli_query($link, "SELECT MAX(id) FROM `items` WHERE `category`=$category"))['id'];
$mincount = mysqli_fetch_assoc(mysqli_query($link, "SELECT MIN(id) FROM `items` WHERE `category`=$category"))['id'];
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/items.css">
    <?php echo '<title>' . $categoryName . '</title>'; ?>
</head>

<body>
    <?php require 'src/header.php'; ?>
    <div class="new">
        <div class="product-main">
            <?php
            for ($i = 0; $i < mysqli_num_rows($items); $i++) {
                $item = mysqli_fetch_assoc($items);
                $price = $item['price'];
                echo '
                <div class="product-item">
                    <img src="/img/items/' . $item['image'] . '">
                    <div class="product-list">
                        <h3>' . $item['name'] . '</h3>
                        <span class="price">' . $price . ' р</span>
                        <a href="/src/cart/addtocart.php?item=' . $item['id'] . '&location=items.php?category=' . $category . '" class="button">В корзину</a>';
                if ($_COOKIE['isadmin'] == 1) {
                    echo '<a href="/src/items/deleteitem.php?item=' . $item['id'] . '&category=' . $category . '" class="delete">Удалить</a>
                                 <a href="/src/items/edititem.php?item=' . $item['id'] . '&action=edit" class="delete">Изменить</a>';
                }
                echo '
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>
    </div>

    <div class="wrapper">

        <div class="content"></div>

        <div class="footer"></div>

    </div>
</body>

</html>