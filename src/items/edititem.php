<?php
require dirname(__DIR__) . '/db.php';
if ($_COOKIE['isadmin'] == 0)
    header("Location: /");

if ($_GET['action'] == "edit") {
    $itemid = $_GET['item'];
    $item = mysqli_query($link, "SELECT * FROM `items` WHERE `id`='$itemid'");
    $item = mysqli_fetch_assoc($item);
    $name = $item['name'];
    $price = $item['price'];
    $itemcategory = $item['category'];
}
$categories = mysqli_query($link, "SELECT * FROM `categories`");
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/additem.css">
    <title>Добавление товара</title>
</head>

<body>
    <?php require dirname(__DIR__) . '/header.php'; ?>
    <div class="lal">
        <div class="frog">
            <?php echo '<form name="form1" class="admin" enctype="multipart/form-data" action="updateitem.php?item='.$itemid.'&action='.$_GET['action'].'" method="POST">';?>
                <div class="group">
                    <label for="name">Название</label>
                    <?php echo '<input type="text" name="name" value="' . $name . '" required>'; ?>
                </div>

                <div class="group">
                    <label for="category">Категория</label>
                    <?php
                    echo '<select name="category" selected=>';
                    for ($i = 0; $i < mysqli_num_rows($categories); $i++) {
                        $category = mysqli_fetch_assoc($categories);
                        if ($category['id'] == $itemcategory)
                            echo '<option value=' . $category['id'] . ' selected>' . $category['title'] . ' </option>';
                        else
                            echo '<option value=' . $category['id'] . '>' . $category['title'] . ' </option>';
                    }
                    echo '</select>';
                    ?>
                </div>

                <div class="group">
                    <label for="price">Цена</label>
                    <?php echo '<input type="number" name="price" value="' . $price . '">'; ?>
                </div>

                <div class="group">
                    <label for="image">Выберите изображение</label>
                    <input class="orex" type="file" name="image">
                </div>

                <div class="group">
                    <?php
                    if($_GET['action'] == "add"){
                        echo '
                        <input type = "hidden" name = "action" value = "add">
                        <center><button>Добавить</button></center>';
                    } else {
                        echo '
                        <input type = "hidden" name = "action" value = "edit">
                        <center><button>Изменить</button></center>';
                    }
                    ?> 
                </div>
            </form>
        </div>
    </div>
</body>

</html>