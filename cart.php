<?php require 'src/db.php';
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/cart.css">
    <title>Корзина</title>
    <script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
    <?php require 'src/header.php'; ?>
    <?php
    if (isset($_SESSION['cart'])) {
        $totalprice = 0;
        foreach ($_SESSION['cart'] as $item) {
            $itemprice = $item['quantity'] * $item['price'];
            $totalprice += $itemprice;
            echo '<div class="basket_item">
            <p align="center">' . $item['name'] . '</p>
            Количество:' . $item['quantity'] . ' рублей
            Цена:' . $itemprice . ' рублей
            <input type="button" name="del" value="Удалить из корзины" onclick="removefromcart(' . $item['id'] . ')">
            </div>';
        }
        $_SESSION['order'] = array('price' => $totalprice);
        echo '<p align="center">Итого:' . $totalprice . ' рублей</p>';
    }
    ?>

    <form class="vhod" action="src/cart/completeorder.php">
        <input class = "finish"  type = "submit" name = "end" value = "Завершить заказ">
    </form>

    <div class="wrapper">
        <div class="content"></div>
        <div class="footer"></div>
    </div>
</body>

</html>